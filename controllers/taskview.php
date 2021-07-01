<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/Final/models/database.php';
require_once ('tasklist.php');
require_once ('controllers/deleteTask.php');
require_once ('controllers/editTask.php');

class ViewTasks {

    public function showAllTasks() {

        $this->datas = new Task();
        $this->datas = $this->datas->getAllTasks();

        foreach ($this->datas as $data) {
            if ($data['user_id'] == $_SESSION['session_id']) {
                ?>
                <tr type="hidden">
                    <td>
                        <?php echo $data['description'];?>
                    </td>
                    <td>
                        <form method="POST" action="">
                            <button class="button-style" id="Edit" type="submit" name="action" value="Edit"><span class="material-icons">edit</span></button>
                            <button class="button-style" type="submit" name="action" value="Delete"><span class="material-icons">delete</span></button>
                            
                            <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                            <input type="hidden" name="descrption" value="<?php echo $data['description'] ?>">
                            
                        </form>
                    </td>
                </tr>
            <?php
            }
        }
        return;
    }
        
}


