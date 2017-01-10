# Web-chat
Project javaScript(web chat)
#Installation

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
