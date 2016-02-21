<?php

error_reporting(E_ALL);
ini_set("display_error",1);
include_once "models/admin/admin_session.class.php";

//Populates to Page_Data.class where the information will be passed to page_template
include_once 'models/page_data.class.php';
$pageData = new page_data();
$pageData->title= "Access Admin Page";
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
$adminStatus = new admin_session();
$pageData->content = include_once "controllers/admin/login.php";
$normalizeLink = 'assets/normalize.css';
$pageData->addStyle($normalizeLink);
$pageData->addStyle($normalizeLink);
$styleLink = 'assets/admin/admin_style.css';
$pageData->addStyle($styleLink);
//$pageData->content .= include_once 'views/admin/admin_signup_template.php';
$urlLinkState = isset($_GET['page']);
$loggedInState = $adminStatus->isLoggedIn();
if($loggedInState){
    $pageData->content = include_once "views/admin/admin_nav_template.php";
    if($urlLinkState){
        $urlLink = $_GET['page'];
        $pageData->content .= include_once "controllers/admin/$urlLink.php";
    }
}
$page = include_once "views/page_template.php";
echo $page;