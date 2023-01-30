const moment = require('moment');

// Set local time to Indonesia
// More on:
// https://momentjs.com/ and scroll down
// Then select Indonesia
moment.locale('id');

function formatMessage(username, text) {
    return {
        username,
        text,
        time: moment().format('LT')
    }
}

module.exports = formatMessage;
