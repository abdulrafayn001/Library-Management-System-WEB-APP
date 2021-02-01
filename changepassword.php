<?php
    session_start();
        if(!empty($_POST['newpswd']) && !empty($_POST['cnewpswd']) && !empty($_POST['oldpswd']))
        {

            if (strlen( $_POST['newpswd']) > 8) {
                if ($_POST['newpswd'] == $_POST['cnewpswd']) {
                    $coonectionString = mysqli_connect('localhost', 'root', '', 'Library Management System');
                    $new_one = mysqli_real_escape_string($coonectionString, $_POST['newpswd']);
                    $new_one_confirm = mysqli_real_escape_string($coonectionString, $_POST['cnewpswd']);
                    if ($coonectionString) {
                        echo "<h2>Change Password.</h2>";
                        $email = $_SESSION['email'];
                        $fetcholdpswd = "select * from admins where email='$email'";
                        $old_pass = mysqli_query($coonectionString, $fetcholdpswd);
                        $old_pass = mysqli_fetch_array($old_pass);
                        if ($old_pass['password'] == $_POST['oldpswd']) {
                            $sql = "UPDATE admins SET password='$new_one' where email='$email'";
                            $result = mysqli_query($coonectionString, $sql);

                            echo "<h1>Password Updated Sucessfully!</h1>";
                        } 
                        else 
                        {
                            echo "<h1>Old password does not match!</h1>";
                        }
                    }
                } 
                else {
                    echo "<h1>Not Same Password!</h1>";
                }
            } 
            else 
            {
                echo "<h1>Password must be greater than 8 digits!</h1>";
            }
        }
        else
        {
            echo "<h1>Input Fields are empty!</h1>";
        }
?>
