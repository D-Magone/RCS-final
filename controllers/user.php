<?php
require_once 'models/database.php';

class User {

    function GetAllUsers() {
        $sql = "SELECT * FROM user";

        $this->result = new Database();
        $this->result = $this->result->__connect();

        $result = $this->result->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}

?>