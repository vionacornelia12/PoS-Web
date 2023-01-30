const express = require('express');
const sphp = require('sphp');

const app = express();
const port = 1616 || process.env.PORT;

// Message format
const formatMessage = require('./utils/messages');

// Capture room
const { userJoin, getCurrentUser, userLeave, getRoomUsers } = require('./utils/users');

// Set static folder
const path = require('path');
app.use(sphp.express(path.join(__dirname, 'public')));
app.use(express.static(path.join(__dirname, 'public')));

// Set bot name
const botName = 'ChatCord Bot';

// Configure socket.io
const http = require('http');
const server = http.createServer(app);
const socket_io = require('socket.io');
const io = socket_io(server);

// Run when client connects to server
io.on('connection', socket => {
    socket.on('joinRoom', ({ username, room }) => {
        const user = userJoin(socket.id, username, room);

        socket.join(user.room);

        // Welcome current user
        socket.emit('message', formatMessage(botName, 'Welcome to ChatCord :)'));

        // Broadcast when a user connects
        socket.broadcast.to(user.chat).emit('message', formatMessage(botName, `${user.username} has joined the chat`));

        // Send users and room info
        io.to(user.room).emit('roomUsers', {
            room: user.room,
            users: getRoomUsers(user.room)
        });
    });

    // Listen for chat message
    socket.on('chatMessage', (msg) => {
        const user = getCurrentUser(socket.id);

        io.to(user.room).emit('message', formatMessage(user.username, msg));
    });

    // Runs when client disconnect
    socket.on('disconnect', () => {
        const user = userLeave(socket.id);

        if (user) {
            io.to(user.room).emit('message', formatMessage(botName, `${user.username} left the chat`));

            // Send users and room info
            io.to(user.room).emit('roomUsers', {
                room: user.room,
                users: getRoomUsers(user.room)
            });
        }
    });
});

server.listen(port, () => console.log(`Server running on port: ${port}`));


