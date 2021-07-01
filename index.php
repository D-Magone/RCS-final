<?php

require_once ('controllers/taskview.php');
require_once ('models/taskModify.php');
require_once ('components/taskForm.php');
require_once ('controllers/editTask.php');
require_once ('helpers/header.php');

// LOGOUT
    if (isset($_POST["logOut"])) {
        session_destroy();
        Header("Location: views/login.php");
        exit();
      }

    if ($_SESSION['session_id']) {
        ?>
        <body>
        <!-- WHOLE WEBPAGE -->
            <div class="container">
        <!-- LEFT CONTAINER -->
                <div class="container-left">
                    <form class="logout" action="" method="POST">
                        <input type="hidden" name="logOut">
                        <button class="logout btn button-style" type="submit"><span class="material-icons">logout</span></button>
                    </form>
                    <h1 class="bookmark bookmark-up">Welcome</h1><h1 class="bookmark bookmark-left"> <?php echo $_SESSION['session_email'] ?></h1>
          <?php
            $form = new TaskForm();
            if (isset($_POST["id"])) {
                
                if(($_POST['action'])=='Edit') {
                    $task = new TaskModify();
                    $taskInfo = $task->GetTask($_POST["id"]);  
                } else {
                    $form->InputField();
                }
            } else {
                $form->InputField();
            }
          ?>
            <div class="middle-line"></div>
            </div>
        <!-- END LEFT CONTAINER -->
        <!-- RIGHT CONTAINER -->
            <div class="container-right">
        
            <div class="table-container">
            <table class="table-style table-hover">
                <!-- <thead class="thead-style">
                    <tr>
                        <td>
                            <h1>Task name</h1>
                        </td>
                    </tr> -->
                </thead>
                <tbody class="table-body">   
                    <?php 
                        $users = new ViewTasks();
                        $users->showAllTasks();
                    ?>
                </tbody>
            </table>
            </div>
            <h1 class="bookmark bookmark-right"><?php echo $_SESSION['session_email'] ?>'s</h1><h1 class="bookmark bookmark-down">To-do list</h1>
            </div>
        <!-- END RIGHT CONTAINER -->
            </div>
    <!-- END WHOLE WEBPAGE -->
        </body>
        </html>
        <?php
    } else {
        header("Location: views/login.php");
        exit();
    }
?>