
var port = 8022;
var broadcastTo = [];
var users = [];
var counter = 0;

colorArray=[
    '#00BCD4',
    '#03A9F4',
    '#4CAF50',
    '#FFC107',
    '#F44336',
    '#E91E63',
    '#9C27B0',
    '#2196F3',
    '#009688',
    '#FF9800'
];


var WebSocketServer = require('/home/saxon/students/20132/erna13/node_modules/websocket').server;
var http = require('http');

//Create a http server with a callback for each request
var httpServer = http.createServer(function(request, response) {
  console.log((new Date()) + ' Received request for ' + request.url);
  response.writeHead(200, {'Content-type': 'text/plain'});
  response.end('Hello world\n');
}).listen(port, function() {
  console.log((new Date()) + ' HTTP server is listening on port ' + port);
});

wsServer = new WebSocketServer({
  httpServer: httpServer,
  autoAcceptConnections: false
});



 function originIsAllowed(origin) {
     if(origin === 'http://localhost:8080' || origin === 'http://www.student.bth.se') {
         return true;
     }
     return false;
 }


function acceptConnectionAsEcho(request, subprotocol) {
  if(subprotocol === undefined) {
    subprotocol = 'echo-protocol';
  }
  var connection = request.accept(subprotocol, request.origin);


  connection.on('message', function(message) {
    if (message.type === 'utf8') {

      connection.sendUTF(message.utf8Data);
    }
    else if (message.type === 'binary') {
      connection.sendBytes(message.binaryData);
    }
  });


  connection.on('close', function(reasonCode, description) {

  });

  return true;
}

function acceptConnectionAsBroadcast(request) {
  var connection = request.accept('broadcast-protocol', request.origin);
  connection.broadcastId = broadcastTo.push(connection) - 1;

  connection.on('message', function(message) {
    var clients = 0;
    var json = JSON.parse(message.utf8Data);


    if(json.type === 'connection')
    {
        users.push([json.temp2, connection.broadcastId,randomColor()]);

            for(var j=0; j<broadcastTo.length; j++) {
              if(broadcastTo[j]) {
                clients++;
                broadcastTo[j].sendUTF(JSON.stringify({temp2:users, type:'connection'}));
              }
            }
    } else if (json.type === 'message'){
        for(var i=0; i<broadcastTo.length; i++) {
          if(broadcastTo[i]) {
            clients++;
            broadcastTo[i].sendUTF(JSON.stringify(json));
          }
        }
    } else if (json.type === 'whispers'){

        for(var i=0; i<users.length; i++) {
            for (var j = 0; j < json.whisperTo.length; j++) {
                if(users[i][0] === json.whisperTo[j])
                {
                    broadcastTo[users[i][1]].sendUTF(JSON.stringify(json));
                }
            }
        }

    }else if (json.type === 'close'){

        for (var i = users.length-1; i >= 0; i--) {
            if(users[i][0] === json.temp2)
            {

                users.splice(i, 1);
                counter--;
            }
        }

        for(var j=0; j<broadcastTo.length; j++) {
          if(broadcastTo[j]) {
            clients++;
            broadcastTo[j].sendUTF(JSON.stringify({temp2:users, type:'close'}));
          }
        }
    }
    console.log("message: " + message.utf8Data);

  });


  connection.on('close', function(reasonCode, description) {
     console.log('close');
    broadcastTo[connection.broadcastId] = null;
  });

  return true;
}




wsServer.on('request', function(request) {
  var status = null;

  if (!originIsAllowed(request.origin)) {

    request.reject();
    return;
  }


  for (var i=0; i < request.requestedProtocols.length; i++) {
    if(request.requestedProtocols[i] === 'broadcast-protocol') {
      status = acceptConnectionAsBroadcast(request);
      console.log("in broad protocol")
    } else if(request.requestedProtocols[i] === 'echo-protocol') {
      status = acceptConnectionAsEcho(request);
      console.log("in echo protocol")
    }
  };


  if(!status) {
    acceptConnectionAsEcho(request, null);

  }

});


function randomColor(){
  return colorArray[Math.floor(Math.random()* 9)];
}
