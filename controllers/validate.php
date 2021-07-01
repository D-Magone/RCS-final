<?php

require_once ('loginUser.php');
require_once ('validate.php');
require_once ('newuser.php');

class FormValidate {
    private $data;
    private $errors = [];
    private static $fields = ['email', 'password'];

    public function __construct($post_data){
        $this->data = $post_data;
    }

    public function validateForm(){

        $this->validateEmail();
        $this->validatePassword();

        $scriptname = basename($_SERVER["PHP_SELF"]);

        if($scriptname == "register.php") {
            $this->validateLogin();
        } else if ($scriptname == "login.php") {
            $this->validatePasswordHash();
        }

        return $this->errors;
        echo $this->errors;
    }

    private function validateLogin(){

        $existingUser = new ProcessUser();
        $existingUser = $existingUser->Register();

        if(!empty($this->data['email']) ) {
            $email = $this->data['email'];
            $sql = "SELECT * FROM user WHERE email = '$email'";

            $conn = new Database();
            $conn = $conn->__construct();

            $result = $conn->query($sql);

            $row=$result->fetch_assoc();
            $dbEmail = $row['email'];

            if($email === $dbEmail) {
                $this->addError('email', 'Email already exists.');
            }
        }
        return $this->errors;
    }

    private function validateEmail(){
        $val = trim($this->data['email']);

        if(empty($val)){
            $this->addError('email', 'Email address is required.');
        } else if(!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'Please provide a valid e-mail address.');
        }
    }

    private function validatePassword(){
       
        if(empty($this->data['password'])){
            $this->addError('password', 'Password is required.');
        }
    }

    private function validatePasswordHash() {
        if(!empty($this->data['email']) && !empty($this->data['password'])) {
            $email = $this->data['email'];
            $sql = "SELECT * FROM user WHERE email = '$email'";

            $conn = new Database();
            $conn = $conn->__construct();

            $result = $conn->query($sql);

            $row=$result->fetch_assoc();
            $hash_password = $row['password'];
        
            if (password_verify($this->data['password'], $hash_password) == 0) {
                $this->addError('password', 'Password is incorrect.');
            }
        }
    }
    
    private function addError($key, $val){
        $this->errors[$key]= $val;
    }
}