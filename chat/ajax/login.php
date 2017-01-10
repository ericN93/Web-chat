<?php

$action = empty($_GET['action']) ? null : $_GET['action'];
$_SESSION['success'] = false;
$_SESSION['user'] = false;
function connectToDb(){

    $db = new PDO("mysql:host=host;dbname=dbname;", 'username', "password");
    return $db;
}

function checkLogin($db = null,$username = null){
    $sth = $db->prepare('SELECT user_name, password_hash FROM JavascriptUsers WHERE user_name = "' . $username .'"');
    $sth->execute();
    return $sth->fetchAll();
}

function addUser($db = null, $username = null, $password = null){
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO JavascriptUsers(user_name,password_hash) VALUES ('$username','$password')";
    $db->query($sql);
}


if($action == null){
    $_SESSION['user'] = array('username' => null);
}else if ($action == 'login'){
     $username = $_POST['username'];
     $password = $_POST['password'];
     $db = connectToDb();
     $result = checkLogin($db,$username);


        if(!empty($result)){
            $result = $result[0];
            if($result['user_name'] == $username){
                if(password_verify($password,$result['password_hash'])){
                    $_SESSION['success'] = true;
                    $_SESSION['user'] = $username;
                }
            }
        }

} else if($action == 'signup'){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $db = connectToDb();
    $result = checkLogin($db,$username);

       if(empty($result)){

           addUser($db, $username, $password);
           $_SESSION['success'] = true;

       }
}




echo json_encode(array('success' => $_SESSION['success'],'user' => $_SESSION['user']));
