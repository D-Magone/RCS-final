<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Final/models/database.php';
require_once __DIR__ . "/../components/taskForm.php";

// CLASS FOR INSERTING NEW TASK, DELETING TASK

class TaskModify {

// NEW TASK
    public function NewTask($description) {

        if(isset($_POST['submit']) && !empty($_POST["description"])) {
            $user_id = $_SESSION['session_id'];

            $sql = "INSERT INTO task (description, user_id) VALUES ('$description', '$user_id')";

            $this->conn = new Database();
            $this->conn = $this->conn->__construct();

            $result = $this->conn->query($sql);
        }
        return $result;
    }

// DELETE TASK
    public function DeleteTask($task_id) {

        $this->conn = new Database();
        $this->conn = $this->conn->__construct();
    
        $delete = mysqli_query($this->conn,"DELETE from `task` WHERE id = '$task_id'");
        return $delete;
    }

// GET TASK
    public function GetTask($task_id) {
        $sql = "SELECT * FROM task WHERE id = '$task_id'";

        $this->conn = new Database();
        $this->conn = $this->conn->__construct();

        $result = $this->conn->query($sql);
        $numRows = $result->num_rows;

        
        if($result !== false && $numRows > 0) {

            while ($row = $result->fetch_assoc()) {
                $output[] = array ("description" => $row["description"], "id" => $row["id"], "user_id" => $row["user_id"]);
                
                foreach($output as $data) {
                    $form = new TaskForm($data["description"], $data["id"]);
                }
                
                $form->InputField();
                return;
            }
            
        } else {
            return [];
            
        }
    }


// EDIT TASK

    public function EditTask($task_id, $description) {
        
        $this->conn = new Database();
        $this->conn = $this->conn->__construct();

        $select = mysqli_query($this->conn, "SELECT * FROM task WHERE id = '$task_id'");
        $numrows= mysqli_num_rows($select);
        
            if($numrows) {

                $update = mysqli_query($this->conn, "UPDATE task SET description = '$description' WHERE id = '$task_id'");

                return $update;
            }
    }

}





