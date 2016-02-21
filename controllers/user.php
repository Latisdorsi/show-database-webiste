<?php
include_once "models/user_data.class.php";
$userData = new user_data ( $db );
$sessionUserID = $_SESSION['user_id'];
$userTable = $userData->getSpecificEntry($sessionUserID);
$userInformation = $userTable->fetchObject();
if(isset($_POST['logout'])) {
    $sessionStatus->logout();
    header('location: index.php');
}
$userPage = include_once "views/user_template.php";
return $userPage;