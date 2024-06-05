// Uelmar Ortega Auth
// Feb. 14, 2018
console.log(new Date().getHours());
// vars
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();
var clients = [];

var Message = require('./node_mysql/message');

redis.subscribe('notification-channel', function(err, count) {
    console.log('ready-redis');
	console.log(err);
    console.log(count);
});

redis.on('error', err => {
  // console.log(err)
});

redis.on('message', function(channel, message) {
    console.log('Message Received: ' + message);
    message = JSON.parse(message);

    for(var index in clients){
        if(clients[index].user_id == message.data.data.user_id){
            console.log('message sent');
            console.log(message);
            clients[index].emit(channel + ':' + message.event, message.data);
        }
    }
});

http.listen(3000, function(){
    console.log('Listening on Port 3000');
});

io.on('connection', function(socket){
    console.log('a user connected');

    handleOnlineStatus(socket);
});

function handleOnlineStatus(socket){
    socket.on('is online ?',function(data,cb){
        var online = false;
        for(var index in clients){
            if(clients[index].user_id == data.reciever){
                online = true;
            }
        }

        cb(online);
    });

    socket.on('client add', function(data){
        socket.user_id = data;
        clients.push(socket);
        console.log('user online : '+data);

        socket.broadcast.emit('user online',{id:socket.user_id});
    });

    socket.on('fetch online', function(data,cb){
        var client_ids = [];

        for(var index in clients){
            client_ids.push(clients[index].user_id);
        }

        cb(client_ids);

    });

    socket.on('disconnect',function(){

        var still_connected = false;

        for(var index in clients){
            console.log(clients[index].id);
            if(clients[index] == socket)
            {
                console.log(clients[index].id + ' ---'+ socket.id);

                console.log('a socket has been removed');
                clients.splice(index, 1);
            }
        }

        // check if user has remaining sockets
        for(var index in clients){
            if(clients[index].user_id == socket.user_id){
                still_connected = true;
            }
        }

        if(!still_connected){
            socket.broadcast.emit('user offline',{id:socket.user_id});
            console.log('user disconnected : '+socket.user_id)

        }

    });
}