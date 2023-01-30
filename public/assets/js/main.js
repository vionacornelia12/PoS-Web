// Client configuration

// Connect to websocket: signaling.tiw.web.id
const socket = io("wss://signaling.tiw.web.id");

// Get username and room from URL (query string required)
const { username, room } = Qs.parse(location.search, {
    ignoreQueryPrefix: true
});

// Join chatroom
socket.emit('joinRoom', { username, room });

// Do something when message object is received
socket.on('message', message => {
    console.log(message);

    // let splittedMsg = message.text.split(',');

    // alert(`${splittedMsg[0]} ${splittedMsg[1]} ${splittedMsg[2]} ${splittedMsg[3]} ${splittedMsg[4]}`);
});

window.onload = function () {
    var i = 1;
    var emitMsg = setInterval(function () {
        var itemIdGen = Math.round(Math.random() * (6 - 3) + 3);
        var totalItemGen = Math.round(Math.random() * (10 - 1) + 1);

        socket.emit('chatMessage', `${i},2,${itemIdGen},${totalItemGen},paid`);

        socket.on('message', message => {
            if (message.username == 'pos-web-jakbar') {
                var splittedMsg = message.text.split(',');
                console.log(`idInvoice: ${splittedMsg[0]}, idStaff: ${splittedMsg[1]}, itemId: ${splittedMsg[2]}, totalItem: ${splittedMsg[3]}, status: ${splittedMsg[4]}`);

                // Then we can push this splitted message to db and update the chart as realtime
            }
        });

        if (i == 10) clearInterval(emitMsg);
        i++;

    }, 1000);

    
}
