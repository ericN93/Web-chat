$('#close').on('click', function() {
  var toServer = {temp2:user + ' left the chat!!', type:'message', sender:user}
  websocket.send(JSON.stringify(toServer));
  var toServer2 = {temp2:user, type:'close'}
  websocket.send(JSON.stringify(toServer2));
  websocket.close();

  location.reload();

});
