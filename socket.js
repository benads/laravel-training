const server = require('http').Server();

const io = require('socket.io')(server);

const Redis = require('ioredis');

const redis = new Redis();

redis.subscribe('test-channel')

redis.on('message', function (channel, message) {
    message = JSON.parse(message);
    
    io.emit(channel + ':' + message.event); //test-channel:UserSignedUp

})

server.listen(3000, console.log('Server is listening'));