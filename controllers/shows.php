<?php
include_once "models/admin/show_database.class.php";
$showTable = new show_database( $db );
$addEntry = isset($_POST['add']);
if($addEntry){

    $showID = array_keys($_POST);
    $userID = $_SESSION['user_id'];
    $showTable->addUserItem($userID, $showID[1]);
    //  header('Location:admin.php');

}
$allEntries = $showTable->getAllEntries();
$showDisplay = include_once "views/siteshows_template.php";
return $showDisplay;