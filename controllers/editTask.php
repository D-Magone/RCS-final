<?php
require_once __DIR__ . "/../models/taskModify.php";

if(isset($_POST['submit'])) {
    $modify = new TaskModify();
    if(empty($_POST["task_id"])) {
        // INSERT
        $modify->NewTask(
            $_POST["description"],
          
        );
        
    } else {
        //EDIT
        $modify->EditTask(
            $_POST["task_id"],
            $_POST["description"]
        );
    }
}

?>