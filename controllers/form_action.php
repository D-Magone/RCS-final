<?php

require_once ('validate.php');
require_once ('newuser.php');
require_once ('loginUser.php');

class Form {

    public function FormAction() {
        if(isset($_POST['submit'])) {
        
            $this->FormErrors();
            return;
        }
    }

    function FormErrors() {
        $validation = new FormValidate($_POST);
        $errors = $validation->validateForm();

        $existingUser = new ProcessUser();
        $existingUser = $existingUser->Register();

        $scriptname = basename($_SERVER["PHP_SELF"]);
        
        if($errors) {

            $error = implode(" ",$errors);
            echo $error;

        } else if ($scriptname == "register.php") {
            $user = new NewUser();
            $save = $user->__costruct();
            header("Location: login.php");
            exit();
        } else {
            $login = new ProcessUser();
            $login->Login();
        }

        return;
    }
}


?>