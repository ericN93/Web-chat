# Web-chat
Project javaScript(web chat)
#Installation
**ChatBate**
 ChatBate is a JavaScript/JQuery chat webbapplication which is using NodeJS and MySQL. The purpose of the chat is interact with new people about  web programming and get to know individualls that you maybe never have had interact with otherwise without ChateBate. There is an "General" chat where everyone can see all messages, the user can also use "Whisper" to send messages to one or more specific online users. When a user is reciving a whisper he/she can see which users got the message by pressing the "whisper"-button above the reciving whisper. 

**Requirements**
This application is a chat room for users to revisit again and again to continue interacting with new people, therefore there is an login/register system. You need NodeJS installed with a websocket module and a MySQL database the following columns: id, user_name, password_hash.

**Change url**
When you have downloaded ChateBate you have to enter chat/js/main.js and find
`var url = 'ws://nodejs1.student.bth.se:8022'``
and fill in your domain for NodeJS

**Change port**
You have to change port number of your choice in chat/websocket_chatserver.js which is on the top of the file `var port = 8022;`, you also have to change var `WebSocketServer = require('Path').server` to the path of the websocket module for NodeJS

**Change originIsAllowed**
You also have to made a change in function originIsAllowed(origin) change the value of origin to your url which is in "websocket_chatserver.js"

**MySQL database**
You will need MySQL code the set up the database, after that you need to navigate to chat/ajax/login.php and change the function connectToDb() and change "host", "dbname", "user_name" and "password" to your settings.

Mysql table:
CREATE TABLE IF NOT EXISTS `JavascriptUsers` (
`id` int(11) NOT NULL,
  `user_name` varchar(10) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL
)

ALTER TABLE `JavascriptUsers`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_name` (`user_name`);
