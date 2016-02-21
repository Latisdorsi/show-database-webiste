<?php
include_once "models/user_data.class.php";
$loginForm = include_once "views/nav_login_template.php";
$userData = new user_data( $db );
//Sign Up Control
if(isset($_POST['signup'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $userData->create($email, $username, $password);
    }
    catch (Exception $e) {
        //Error
    }
}
//Login Control
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    try {
        $data = $userData->grabUserData($email, $password);
        $sessionStatus->logData($data);
        $userData->checkCredentials($email, $password);
        $sessionStatus->login();
    }
    catch (Exception $e) {
        //error
        echo 'you failed dude' . $e;
    }
}
//Navigation Control

$urlLinkState = isset($_GET['page']);
if($urlLinkState){
    $urlLink = $_GET['page'];
    $loginForm .= include_once "views/$urlLink.php";
}
else {
    $loginForm .= include_once "views/login_template.php";
}

return $loginForm;