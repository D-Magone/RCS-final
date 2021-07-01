<?php

require_once __DIR__ . "/../models/taskModify.php";

if(isset($_POST['action'])) {
    if($_POST['action'] && $_POST['id']) {
        if($_POST['action'] == 'Delete') {
    
            $delete = new TaskModify();
            $delete->DeleteTask($_POST['id']);
        }
    }
}

?>