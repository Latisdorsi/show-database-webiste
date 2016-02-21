<?php
//Determines whether you're logged in or not
class admin_session
{
    public function __construct(){
        session_start();
    }
    public function isLoggedIn(){
        $sessionState = isset($_SESSION['admin_logged_in']);
        if($sessionState){
            $status = $_SESSION['admin_logged_in'];
        }
        else {
            $status = false;
        }
        return $status;
    }
    public function login(){
        $_SESSION['admin_logged_in'] = true;
    }
    public function logout(){
        $_SESSION['admin_logged_in']= false;
    }
}