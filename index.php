<?php

error_reporting(E_ALL);
ini_set("display_error",1);
include_once "models/user_session.class.php";

//Populates to Page_Data.class where the information will be passed to page_template
include_once 'models/page_data.class.php';
$pageData = new page_data();
$pageData->title= "Anime Database Project";
$dbInfo = "mysql:host=localhost;dbname=showdb";
$dbUser = "root";
$dbPass = "pass";
try{
    $db = new PDO($dbInfo, $dbUser, $dbPass);
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch (PDOException $e){
    $e->getMessage();
}

$styleLink = 'assets/normalize.css';
$pageData->addStyle($styleLink);
$normalizeLink = 'assets/style.css';
$pageData->addStyle($normalizeLink);

//Includes page_template with populated information
$sessionStatus = new user_session();
$urlLinkState = isset($_GET['page']);
$loginStatus = $sessionStatus->isLoggedIn();
if($loginStatus){
    $pageData->content = include_once "views/nav_main_template.php";
    if($urlLinkState) {
        $urlLink = $_GET['page'];
        $pageData->content .= include_once "controllers/$urlLink.php";
    }
    else{
    print_r($_SESSION);
    }
}
else {
    $pageData->content = include_once "controllers/login.php";
}
$page = include_once "views/page_template.php";
echo $page;