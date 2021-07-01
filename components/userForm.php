<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Final/helpers/header.php';
require_once '../controllers/form_action.php';

class UserForm {
    private $btnText;

    public function Form() {
        $action = new Form();
        ?>
        <body>
                <div class="container-form">
                    <div class="form-absolute">
                        <form class="form-style" action="" method="POST">
                            <input class="email-input form-input" name="email" type="text" placeholder="Email">
                            <input class="pass-input form-input" name="password" type="password" placeholder="Password">
                            <p id="errorMsg"><?php $action->FormAction(); ?></p>

                            <?php 
                            $scriptname = basename($_SERVER["PHP_SELF"]);
                            if($scriptname == "register.php") {
                                echo "
                                <button class='form-btn' name='submit' type='submit' value='submit'>Register</button>
                                <h3 class='change-form'>Already have an account? <a href='login.php'>Login</a></h3>";
                            } else {
                                echo "
                                <button class='form-btn' name='submit' type='submit' value='submit'>Login</button>
                                <h3 class='change-form'>Don't have an account? <a href='register.php'>Register</a></h3>";
                            }
                            ?>
                        </form>
                    </div>
                </div>    
        </body>
        </html>
        <?php
    }
}
