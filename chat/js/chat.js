
function createChatWindow(){
    $('#form1').append(" " +
    '<div id="chat_window">' +
        '<p>' +
            '<div id="online" class="online"><p>hej eric</p></div>' +
            '<label>Send message: </label></br><textarea rows="4" cols="50" id="message"></textarea>' +
            '<input id="send_message" type="button" value="Send" class="button"/>' +
            '<input id="close" type="button" value="Close" class="button"/>' +


        '</p>' +


            '<div id="output" class="output"></div>' +
            '<div id="video" class="video"></div>' +


    '</div>' );

}
