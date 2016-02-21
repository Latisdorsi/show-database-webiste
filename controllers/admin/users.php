<?php
include_once "models/admin/user_data_list.class.php";
$user_data = new user_data_list ( $db );
$userItems = $user_data->getAllEntries();

$deleteEntry = isset($_POST['delete']);

if($deleteEntry) {
    //Gets Array Indexes and Receives Entry ID
    $idArray = array_keys($_POST);
    $user_data->deleteEntry($idArray[1]);
    //header('Location:admin.php?page=editor');
}

$userHTML = include_once "views/admin/admin_user_template.php";
return $userHTML;