<?php
include_once "models/admin/show_database.class.php";
$showTable = new show_database( $db );
$deleteEntry = isset($_POST['delete']);
$allEntries = $showTable->getUserItems();
if($deleteEntry) {
    //Gets Array Indexes and Receives Entry ID
    $idArray = array_keys($_POST);
    $showTable->deleteUserShowEntry($idArray[1]);
//    header('Location:admin.php');
}
$showDisplay = include_once "views/usershows_template.php";
return $showDisplay;