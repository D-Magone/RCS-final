<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Final/models/database.php';

class NewUser {
    public function __costruct() {
        $email = $_POST['email'];

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (email, password) VALUES ('$email', '$password')";

        $this->conn = new Database();
        $this->conn = $this->conn->__construct();

        $result = $this->conn->query($sql);
        
        return $result;
    }
}