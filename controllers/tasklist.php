<?php

require_once ('models/database.php');

class Task {

    function getAllTasks() {
        $sql = "SELECT * FROM task";

        $this->conn = new Database();
        $this->conn = $this->conn->__construct();

        $result = $this->conn->query($sql);
        $numRows = $result->num_rows;

        if($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}