<?php
include_once "models/admin/admin_data.class.php";
$loginForm = "";
$adminData = new admin_data( $db );
//Login Control
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    try {
        $adminData->checkCredentials($email, $password);
        $adminStatus->login();
    }
    catch (Exception $e) {
        //error
        echo 'You failed dude' . $e;
    }
}
if(isset($_POST['signup'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $adminData->create($email, $password);
}
//Navigation Control

if(!($adminStatus->isLoggedIn())) {
    $loginForm = include_once "views/admin/admin_login_template.php";
}
return $loginForm;