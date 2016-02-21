<?php

/**
 * Created by PhpStorm.
 * User: Christopher
 * Date: 10/29/2015
 * Time: 5:51 PM
 */
include_once "models/table.class.php";

class user_data_list extends Table
{
    public function getAllEntries(){
        $sql = "SELECT user_id, user_name, user_email FROM users";
        $entryStatement = $this->makeStatement($sql);
        return $entryStatement;
    }
    public function deleteEntry($id)
    {
        $sql = "DELETE FROM users WHERE user_id = ?";
        $data = array($id);
        $statement = $this->makeStatement($sql, $data);
    }
}