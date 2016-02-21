<?php
//Determines whether you're logged in or not
class user_session
{
    public function __construct(){
        session_start();
    }
    public function isLoggedIn(){
        $sessionState = isset($_SESSION['user_logged_in']);
        if($sessionState){
            $status = $_SESSION['user_logged_in'];
        }
        else {
            $status = false;
        }
            return $status;
    }
    public function login(){
        $_SESSION['user_logged_in'] = true;
    }
    public function logout(){
        $_SESSION['user_logged_in']= false;
    }
    public function logData($data){
        $userInfo = $data->fetchObject();
        $user_id = $userInfo->user_id;
        $_SESSION['user_id'] = $user_id;
    }
}