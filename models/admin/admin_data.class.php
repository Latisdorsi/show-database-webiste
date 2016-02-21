<?php
include_once "models/table.class.php";
class admin_data extends table{

    public function create($email, $password){

        $this->checkEmail($email);
        $sql = "INSERT INTO admin (admin_email, admin_password ) VALUES (?, md5(?) )";
        $data = array($email,$password);
        $this->makeStatement($sql,$data);

    }

    private function checkEmail($email){

        $sql = "SELECT admin_email FROM admin WHERE admin_email = ?";
        $data = array($email);
        $statement = $this->makeStatement( $sql, $data );
        if($statement->rowCount() === 1){
            $e = new Exception("Error: $email already in use!");
            throw $e;

        }
    }
    public function checkCredentials( $email, $password){
        $sql = "SELECT admin_email from admin WHERE admin_email = ? AND admin_password = md5(?)";
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



}