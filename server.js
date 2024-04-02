const express = require('express');

const app = express();


const server = require('http').createServer(app);


const io = require('socket.io')(server, {
    cors: {
        origin: "*",
        methods: ["GET", "POST", "OPTIONS"]
      }
});


io.on('connection', (socket) => {
    console.log('connection');

    socket.on('sendmessageToServer', (data) => {
        console.log(data);

        socket.broadcast.emit('sendmessageToServer', data);
    });


    socket.on('disconnect', (socket) => {
        console.log('Disconnect');
    });
});

server.listen(3000, () => {
    console.log('Server is running');
});