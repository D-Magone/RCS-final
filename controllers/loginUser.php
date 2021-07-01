<?php

class ProcessUser {

    public function Register() {
        if(!isset($_SESSION['session_id']) && isset($_POST["submit"])) {

            if (!empty($_POST["email"]) && !empty($_POST["password"])) {
                $email = $_POST["email"];
                $password = $_POST["password"];
    
                $conn = new Database();
                $connect = $conn->__construct();
    
                $result = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
                $numrows= mysqli_num_rows($result);
                return $numrows;
            }
        }
    }

    public function Login() {

        $email = $_POST["email"];
        $password = $_POST["password"];
        $conn = new Database();
        $connect = $conn->__construct();

        $result = mysqli_query($connect, "SELECT * FROM user WHERE email = '$email'");
        $numrows= mysqli_num_rows($result);

        if($numrows) {
    
            while($row=mysqli_fetch_assoc($result)) {
                $existingEmail=$row["email"];
                $existingPassword=$row["password"];
                $id=$row["id"];

                session_start();
                $_SESSION['session_email']=$existingEmail;
                $_SESSION['session_id']=$id;
                
                header("Location: ../index.php");
                exit();
            }
            return;
        }
    }
}

?>