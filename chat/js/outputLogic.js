
$('#whispersOutput').click(function(event){

    statusOutput = 'whisper';

    $( ".output p" ).each(function( i ) {

        if ($(this).attr('id') === 'whisper') {
            $(this).css('display', 'block');
        }

        if ($(this).attr('id') === 'general') {
            $(this).css('display', 'none');
        }
    });

    $( ".myButton" ).each(function( i ) {
        $(this).css('display', 'block');

    });
})

$('#generalOutput').click(function(event){

    statusOutput = 'general';

    $( ".output p" ).each(function( i ) {

        if ($(this).attr('id') === 'whisper' || $(this).attr('class') ===  counter) {
            $(this).css('display', 'none');
        }

        if ($(this).attr('id') === 'general') {
            $(this).css('display', 'block');
        } else if($(this).attr('id') === 'whisper'){
            $(this).css('display', 'none');
        } else{
            if($(this).attr('class') === 'show'){
                $(this).removeClass('show')
                $(this).addClass('hidden')
            }
        }
    });

    $( ".myButton" ).each(function( i ) {
        console.log($(this).attr('id'));
        $(this).css('display', 'none');

    });
})

$('#allOutput').click(function(event){

    statusOutput = 'all';

    $( ".output p" ).each(function( i ) {

        if ($(this).attr('id') === 'whisper') {
            $(this).css('display', 'block');
        }

        if ($(this).attr('id') === 'general') {
            $(this).css('display', 'block');
        }
    });

    $( ".myButton" ).each(function( i ) {

        $(this).css('display', 'block');

    });
})


  function outputLog(message, sender) {
    var now = new Date();

    if(sender !=user && !focus){
        notification++;
        changeTitle();
    }
    if(statusOutput === 'general' || statusOutput === 'all')
    {
        $(output).append("<p id='general'>[General]" + now.toLocaleTimeString() + ' ' + message + '</p>').scrollTop(output[0].scrollHeight)
    } else {
        $(output).append("<p id='general' style='display:none'>[General]" + now.toLocaleTimeString() + ' ' + message + '</p>').scrollTop(output[0].scrollHeight)
    }
  }

  function outputLogWhisper(message, whisperTo, sender) {
    var now = new Date();
    var split= "";

    for (var i = 0; i < whisperTo.length; i++) {
        if(user === whisperTo[i]){
            if(sender != user && !focus){
                notification++;
                changeTitle();
            }
        }
    }

    if(statusOutput === 'whisper' || statusOutput === 'all')
    {
        $(output).append("<input type='button' value='Receivers' class='myButton " + counter + "'/><span style='color:#e67a73'><p id='" + counter + "' class='hidden'>" + whisperTo + "</p><span style='color:#e67a73'><p id='whisper'>[Whisper]" + now.toLocaleTimeString() + ' ' + message + '</p></span>').scrollTop(output[0].scrollHeight)

        $(".myButton." + counter).click(function(){
            //$(output).append("<p>" + $(this).attr('id') + "</p>")

                split = $(this).attr('class').split(' ').pop();
                if(split === $('#' + split).attr('id'))
                {

                    console.log('bra');

                        if($('#' + split).attr('class') === 'hidden'){
                            $('#' + split).removeClass('hidden')
                            $('#' + split).addClass('show')
                        } else {
                            $('#' + split).removeClass('show')
                            $('#' + split).addClass('hidden')
                        }

                }


       });

    } else  {
        $(output).append("<input type='button' value='Receivers' class='myButton " + counter + "' style='display: none;' /><span style='color:#e67a73'><p id='" + counter + "' class='hidden'>" + whisperTo + "</p><p id='whisper' style='display:none'>[Whisper]" + now.toLocaleTimeString() + ' ' + message + '</p></span>').scrollTop(output[0].scrollHeight)


        $(".myButton." + counter).click(function(){

                split = $(this).attr('class').split(' ').pop();
                if(split === $('#' + split).attr('id'))
                {

                    console.log('bra');

                        if($('#' + split).attr('class') === 'hidden'){
                            $('#' + split).removeClass('hidden')
                            $('#' + split).addClass('show')
                        } else {
                            $('#' + split).removeClass('show')
                            $('#' + split).addClass('hidden')
                        }
                }
       });
    }

    counter++;
  }


  function outputOnline(users) {
      $(video).empty();
      console.log(users[0][0]);
      console.log(user);
       $(video).append("<h3 style='font-family: TimesNewRoman; width: 100%; text-align: center;'>Other Online Users</h3>");
      if(users.length >1)
      {
          for (var i = 0; i < users.length; i++) {
              if(users[i][0] != user){
                  $(video).append("<div id='" + users[i][0] + "'class='vidWindow'><div class='vidWindowProfil' style='background-color:" + users[i][2] + "'>" + users[i][0].substring(0,1) + "</div><p>" + users[i][0] + "</p></div></div>");
              }
          }
      } else {
           $(video).append("<h2 style='font-family: TimesNewRoman; width: 100%; text-align: center;'>no one is online atm :(</h2> <i class='material-icons'>perm_scan_wifi</i>");
      }
  }
