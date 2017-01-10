function htmlEntities(str) {
  return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}


$('#send_message').on('click', function(event) {
  var msg = $('#message').val();
  whispers = [];
  var counter = 0;
//check if user whispers or talk to all
  $( ".vidWindow" ).each(function( i ) {

      if ($(this).hasClass('inviteToggle')) {
          whispers[counter]=$(this).attr('id');
          counter++;
      }
  });
  if(whispers[0] === undefined)
  {
      if(!websocket || websocket.readyState === 3) {

      } else {

        var toServer = {temp2:user + ': ' + htmlEntities(msg), type:'message', sender:user}
        websocket.send(JSON.stringify(toServer));
      }
  } else{
      if(!websocket || websocket.readyState === 3) {

      } else {
          whispers[whispers.length] = user;
        var toServer = {whisperTo:whispers ,temp2:user + ': ' + htmlEntities(msg), type:'whispers', sender:user}
        websocket.send(JSON.stringify(toServer));
      }
  }
});
