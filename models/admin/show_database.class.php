<?php
include_once "models/table.class.php";
class show_database extends table
{
    public function saveEntry($name, $year, $studio)
    {
        $entrySQL = "INSERT INTO shows ( show_name, show_year, show_studio ) VALUES (?, ?, ?)";
        $formData = array($name, $year, $studio);
        $entryStatement = $this->makeStatement($entrySQL, $formData);
    }

//GETS ENTRIES FROM DATABASE
    public function getAllEntries()
    {
        $sql = "SELECT show_id, show_name, show_year, show_studio FROM shows";
        $statement = $this->makeStatement($sql);
        return $statement;
    }

//DELETE ALL ITEMS
    public function deleteEntry($id)
    {
        $sql = "DELETE FROM shows WHERE show_id = ?";
        $data = array($id);
        $statement = $this->makeStatement($sql, $data);
    }
    public function addUserItem($show_id, $user_id)
    {
            $entrySQL = "INSERT INTO user_shows ( user_id, show_id ) VALUES (?, ?)";
            $formData = array($show_id, $user_id);
            $entryStatement = $this->makeStatement($entrySQL, $formData);

    }
    public function getUserItems(){
        $userID = $_SESSION['user_id'];
        $entrySQL = "SELECT shows.show_id, show_name, show_year, show_studio
        FROM shows
        INNER JOIN user_shows
        ON shows.show_id=user_shows.show_id
        WHERE user_shows.user_id = $userID;";
        $entryStatement = $this->makeStatement($entrySQL);
        return $entryStatement;
    }
    public function deleteUserShowEntry($id){
        $sql = "DELETE FROM user_shows WHERE show_id = ?";
        $data = array($id);
        $statement = $this->makeStatement($sql, $data);
    }

}