
var url = 'ws://nodejs1.student.bth.se:8022',
 websocket = null,
 form = $('#form1'),
 output = $('#output'),
 online = $('#online'),
 video = $('#video'),
 user,
 password,
 newUserName,
 newUserPassword,
 whispers = [],
 statusOutput = "all",
 counter=0,
 hiddenElements = $(':hidden'),
 visibleElements = $(':visible'),
 notification = 0,
 newTitle,
 focus=true,
 title = document.title;


 function changeTitle() {
     var newTitle
     if(notification>0){
         newTitle = '(' + notification + ') ' + title;
     } else{
         newTitle = title;
     }

     document.title = newTitle;
 }

$(document).ready(function(){
  'use strict';

 //clear localStorage to garante new updates
 localStorage.clear();

//check if page is open atm
$(window).on("blur focus", function(e) {
    var prevType = $(this).data("prevType");

    if (prevType != e.type) {   //  reduce double fire issues
        switch (e.type) {
            case "blur":
                focus = false;
                break;
            case "focus":
                notification = 0;
                changeTitle()
                focus = true;
                break;
        }
    }

    $(this).data("prevType", e.type);
})



createLogin();
createRegister();



function check(data)
{
    if(data['success'])
    {
        console.log('Connecting to: ' + url);
        if(websocket) {
          websocket.close();
          websocket = null;
        }
        websocket = new WebSocket(url, 'broadcast-protocol');

        $(".online").append("<div id='currentUser'" +
        "</div><p>Välkommen! Du är inloggad som " + user +  "</p>");

        websocket.onopen = function() {

          user = $('#userfield').val();
          var toServer = {temp2:user + " joined the chat!!", type:'message', sender:user}
          websocket.send(JSON.stringify(toServer));
          var toServer = {temp2:user, type:'connection'}
          websocket.send(JSON.stringify(toServer));
        }

        websocket.onmessage = function(event) {

          var obj = JSON.parse(event.data);
          console.log(obj);

          if(obj.type === 'connection' || obj.type === 'close') {
              console
             outputOnline(obj.temp2);
            }else if(obj.type === 'message') {
            outputLog(obj.temp2,  obj.sender);
            }else if(obj.type === 'whispers') {
            outputLogWhisper(obj.temp2, obj.whisperTo, obj.sender);
            }
        }

        websocket.onclose = function() {

          outputLog('Websocket closed.');

        }

            $('#login_window').css('display','none');
            $('#chat_window').css('display','block');

            $('#video').click(function(event){

                $('.vidWindow').click(function(event){

                    $(this).toggleClass("inviteToggle");

                });

            });

    }else{
        $('#userfield').css('border', '3px solid red');
        $('#userfield').effect( "shake" );
        $('#password').css('border', '3px solid red');
        $('#password').effect( "shake" );
        $('#login-message').text('Failed to login! Check your input..');
    }
}

function signupUser(data)
{
    if(data['success'])
    {
        $('#regUserName').css('border', '3px solid green');
        $('#regUserPassword').css('border', '3px solid green');
        $('#reg-message').text('Your account was successfully created ' + $('#regUserName').val()+ '!');
    }else{
        $('#regUserName').css('border', '3px solid red');
        $('#regUserName').effect( "shake" );
        $('#regUserPassword').css('border', '3px solid red');
        $('#regUserPassword').effect( "shake" );
        $('#reg-message').text('Failed to create account! Username may be taken or you might have entered to many characters in Username(Max 10)');
    }
}
$('#userfield').val('Username');
$('#password').val('Password');
$('#regUserName').val('Username');
$('#regUserPassword').val('Password');

$('#loginbutton').on('click', function(event) {


     user = $('#userfield').val();
     var password1 = $('#password').val();

     $.ajax({
        type: 'post',
        url: 'ajax/login.php?action=login',
        dataType: 'json',
        data: {
            username: user,
            password: password1
        },
        success: function(data){
           console.log('Ajax request returned successfully. Shopping cart initiated.');
           check(data);
       },
       error: function(jqXHR, textStatus, errorThrown){
           console.log('Ajax request failed: ' + textStatus + ', ' + errorThrown);
       }
    });

    //function to get ip
    function callback(response){
    }

  });

  $('#registerbutton').click(function(){
        $('#userfield').val('temp');

          $('.login_form').css('display', 'none');
          $('.register_form').css('display', 'block');

          $('#regSignUp').click(function(event){

              event.preventDefault();

              newUserName = $('#regUserName').val();
              newUserPassword = $('#regUserPassword').val();

              $.ajax({
                 type: 'post',
                 url: 'ajax/login.php?action=signup',
                 dataType: 'json',
                 data: {
                     username: newUserName,
                     password: newUserPassword
                 },
                 success: function(data){
                    console.log('Ajax request returned successfully. Shopping cart initiated.');
                    signupUser(data);
                },
                error: function(jqXHR, textStatus, errorThrown){
                    console.log('Ajax request failed: ' + textStatus + ', ' + errorThrown);
                }
             });



            });

          $('#regBack').click(function(event){
              event.preventDefault();
              $('.login_form').css('display', 'block');
              $('.register_form').css('display', 'none');
          });

      });


      $(window).unload(function(){
          var toServer = {temp2:user + ' left the chat!!', type:'message', sender:user}
          websocket.send(JSON.stringify(toServer));
          var toServer2 = {temp2:user, type:'close'}
          websocket.send(JSON.stringify(toServer2));
          websocket.close();
    });

  console.log('Everything is ready.');
});
