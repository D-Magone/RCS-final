<?php

class Database {
    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function __construct() {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "to_do_list";

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        return $conn;
    }
}

