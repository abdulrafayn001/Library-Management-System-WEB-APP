<?php
    session_start();
    if($_POST["isCheck"]=="yes")
    {
        function phpAlert($msg) {
            echo '<script type="text/javascript">alert("' . $msg . '")</script>';
        }
    
        if(!empty($_POST['old_pas']) && strlen($_POST['new_one'])>8)
        {
            if($_POST['new_one'] == $_POST['confirm_new_one'])
            {
                $coonectionString=mysqli_connect('localhost','root','','Library Management System');
                
                $new_one=mysqli_real_escape_string($coonectionString,$_POST['new_one']);
                $new_one_confirm=mysqli_real_escape_string($coonectionString,$_POST['confirm_new_one']);
                $old_confirm=mysqli_real_escape_string($coonectionString,$_POST['old_pas']);
                
                if($coonectionString)
                {
                    $email=$_SESSION['email'];
                    $sql="SELECT *from student_registration where email='$email' and password='$old_confirm'";
                    $res=mysqli_query($coonectionString,$sql);
                    
                    if(!empty(mysqli_fetch_assoc($res)))
                    {
                        $sql = "UPDATE student_registration SET password='$new_one' where email='$email'";
                        $result = mysqli_query($coonectionString,$sql);
                        phpAlert("successfully Changed");
                    }
                    else
                    {
                        phpAlert("Invalid Old Password");
                    }
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
            <h1 style='font-size:60px; font-weight: bolder; color:#654062;'>&nbsp; &nbsp;&nbsp; &nbsp;Change Password</h1>
            <h2>&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Hints on getting your new password right:</h2>
            <h2>Your new password must be more than 8 characters in length.</h2>

            <div class='update_password'>
                <label class='pas' for='oldpswd'>Old Password &nbsp; &nbsp; </label> 
                <input  id='op' type='password' name='oldpswd' placeholder='Enter Old Passwoed'><br>
        
                <hr>
                <label class='pas' for='new_password'>New Password &nbsp; &nbsp; </label>
                <input type='password' name='new_one' placeholder='New Password' id='new_one'>
                <br>
                <label class='pas' for='new_password'>Confirm New Password &nbsp; &nbsp; </label>
                <input type='password' name='confirm_new_one' placeholder='Conform Password' id='confirm_new_one'>
                <br>
                <hr>
                <button id='changePassword'> Change Password </button>
            </div>
    </div>
    "
?>