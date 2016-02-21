<?php
include_once "models/table.class.php";
class user_data extends table{

    public function create($email, $username, $password){

        $this->checkEmail($email);
        $sql = "INSERT INTO users (user_name, user_email, user_pass ) VALUES ( ? , ?, md5(?) )";
        $data = array($username, $email,$password);
        $this->makeStatement($sql,$data);

    }

    private function checkEmail($email){

        $sql = "SELECT user_email FROM users WHERE user_email = ?";
        $data = array($email);
        $statement = $this->makeStatement( $sql, $data );
        if($statement->rowCount() === 1){
            $e = new Exception("Error: $email already in use!");
            throw $e;

        }
    }
    public function checkCredentials( $email, $password){
        $sql = "SELECT user_email FROM users WHERE user_email = ? AND user_pass = md5(?)";
        $data = array($email, $password);
        $statement = $this->makeStatement( $sql, $data);
        if($statement->rowCount() === 1){
            $out = true;
        }
        else{
            $loginProblem = new Exception('Login Failed!');
            throw $loginProblem;
        }
        return $out;
    }
    public function grabUserData($email, $password){
        $sql = "SELECT user_id FROM users WHERE user_email = ? AND user_pass = md5(?)";
        $data = array($email, $password);
        $statement = $this->makeStatement( $sql, $data);
        return $statement;
    }

    public function getSpecificEntry($user_id){
        $sql = "SELECT user_id, user_name, user_email FROM users WHERE user_id = ?";
        $data = array($user_id);
        $entryStatement = $this->makeStatement($sql, $data);
        return $entryStatement;
    }


    public function getAllEntries(){
        $sql = "SELECT user_id, user_name, user_email FROM users";
        $entryStatement = $this->makeStatement($sql);
        return $entryStatement;
    }



}