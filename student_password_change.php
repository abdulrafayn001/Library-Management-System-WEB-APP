<?php
    session_start();
    if($_POST["isCheck"]=="yes")
    {
        function phpAlert($msg) {
            echo '<script type="text/javascript">alert("' . $msg . '")</script>';
        }
    
        if(strlen($_POST['new_one'])>8)
        {
            if($_POST['new_one'] == $_POST['confirm_new_one'])
            {
                $coonectionString=mysqli_connect('localhost','root','','Library Management System');
                $new_one=mysqli_real_escape_string($coonectionString,$_POST['new_one']);
                $new_one_confirm=mysqli_real_escape_string($coonectionString,$_POST['confirm_new_one']);
                if($coonectionString)
                {
                    $email=$_SESSION['email'];
                    $sql = "UPDATE student_registration SET password='$new_one' where email='$email'";
                    $result = mysqli_query($coonectionString,$sql);
                    phpAlert("successfully Changed");
                }
            }
            else
            {
                phpAlert("password is not same");
            }
        }
        else
        {
            phpAlert("password must be graeter then 8 digits");
        }
    }
    echo "
    <div class='title' style='margin: 5%;'>
            <h1>Change password</h1>
            <h2>Hints on getting your new password right:</h2>
            <h2>Your new password must be more than 8 characters in length.</h2>

            <div class='update_password'>
                <hr>
                <label for='new_password'>New Password</label>
                <input type='password' name='new_one' placeholder='New Password' id='new_one'>
                <br>
                <label for='new_password'>Confirm New Password</label>
                <input type='password' name='confirm_new_one' placeholder='Conform Password' id='confirm_new_one'>
                <br>
                <hr>
                <button id='changePassword'> Change Password </button>
            </div>
    </div>
    "
?>