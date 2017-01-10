<?php $title='ChatBate'; include(__DIR__ . '/incl/header.php'); ?>
<div id='container'>
    <h1>ChatBate</h1>
    <p>ChatBate is a JavaScript/JQuery chat webbapplication which is using NodeJS and MySQL. The purpose of the chat is interact with new people about  web programming and get to know individualls that you maybe never have had interact with otherwise without ChateBate. There is an "General" chat where everyone can see all messages, the user can also use "Whisper" to send messages to one or more specific online users. When a user is reciving a whisper he/she can see which users got the message by pressing the "whisper"-button above the reciving whisper. </p>

    <h1>Requirements</h1>
    <p>This application is a chat room for users to revisit again and again to continue interacting with new people, therefore there is an login/register system. You need NodeJS installed with a websocket module and a MySQL database the following columns: id, user_name, password_hash.</p>

    <h1>Installation</h1>
    <p>You can get the chat here which is stored in the "ChateBate" folder ?here?</p>

    <p>when you have downloaded ChateBate you have to enter chat/js/main.js and find
        "var url = 'ws://nodejs1.student.bth.se:8022'"
        and fill in your domain for NodeJS </p>

    <p>You have to change port number of your choice in chat/websocket_chatserver.js which is on the top of the file "var port = 8022;", you also have to change var WebSocketServer = require('Path').server to the path of the websocket module for NodeJS </p>

    <p>You will need <a href=http://www.student.bth.se/~erna13/dbwebb-kurser/javascript/me/kmom10/chat/mysql.txt>this</a> MySQL code the set up the database, after that you need to navigate to chat/ajax/login.php and change the function connectToDb() and change "host", "dbname", "user_name" and "password" to your settings.
    </p>

    <h1>Why my product?</h1>
    <p>This is an chat webapplication with focus on interaction with both new people or already known friends about the topic "Web Programming", the purpose of the webapplication is to communicate and both general talk about programming and talk more specific about it with more specific questions. Two relative new programmers maybe is having problem with same function ie and with ChateBate they get the oppertunity of getting to interact with eachother and maybe work toghether and discuss ideas. Or a more experience programmer can help them, so in the general chat is people asking for help or general discussing a topic and when two or more people got a topic incommon the point is that they start whispering eachother and start a private conversation and then reach thier incommon goal. There are many chatrooms on the web so "Why my product?"
    <br>
    ChatBate is at this moment relative small comparing to the other chat application out there, and that´s for it advantage. It´s small simple chat but with it´s specific topic "Web Programming", it´s ideal for new programmers who is looking for new friends with the same hobby "Web programming" or asking for help or maybe discus web programming in general. There is alot of Q and A appliction for programming but not so many chat application where you can just login and chat in real-time with the specific topic "Web programmering".
    <br>
    <br>
    <h1>In the future version it´s planned to and following feature:</h1>
    <ul>
        <li>Profil picture</li>
        <li>Start groups which is saved</li>
        <li>Diffrent channels for diffrent topics in web programmering</li>
        <li>Friend list</li>
    <ul>

    </p>

</div>
<?php $path=__DIR__; include(__DIR__ . '/incl/footer.php'); ?>
