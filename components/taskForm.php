<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Final/models/taskModify.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Final/controllers/editTask.php';

  class TaskForm {
    private $description;
    private $task_id;
    private $user_id;

    public function __construct($description = null, $task_id = null, $user_id = null){

      $this->description = $description;
      $this->task_id = $task_id;
      $this->user_id = $user_id;
    }

    public function InputField() {
      ?>
        <form class="form-group" action="" method="POST">
            <input id="description" name="description" class="form-control inputTask" placeholder="Write a task..." value="<?php echo htmlspecialchars($this->description) ?>">
            <input id="task_id" type="hidden" name="task_id" value="<?php echo htmlspecialchars($this->task_id) ?>">
        
            <button id="saveBtn" class="btn save-btn btn-info" type="submit" name="submit">Save</button>
        </form>
      <?php
      return;
    }
  }
?>