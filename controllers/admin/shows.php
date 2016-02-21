<?php
include_once "models/admin/show_database.class.php";
$showTable = new show_database( $db );
$addEntry = isset($_POST['add']);
$deleteEntry = isset($_POST['delete']);
if($addEntry){
    $name = $_POST['name'];
    $year = $_POST['year'];
    $studio = $_POST['studio'];
    $showTable->saveEntry($name, $year, $studio);
  //  header('Location:admin.php');
}
if($deleteEntry) {
    //Gets Array Indexes and Receives Entry ID
    $idArray = array_keys($_POST);
    $showTable->deleteEntry($idArray[1]);
//    header('Location:admin.php');
}
$allEntries = $showTable->getAllEntries();
$showDisplay = include_once "views/admin/admin_add_shows_template.php";
$showDisplay .= include_once "views/admin/admin_show_list_template.php";

return $showDisplay;