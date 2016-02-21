<?php
include_once "models/admin/admin_data.class.php";
$logoutForm = include_once "views/admin/admin_logout_template.php";
//Login Control
if(isset($_POST['logout'])) {
        $adminStatus->logout();
        header('location: admin.php');
}
return $logoutForm;