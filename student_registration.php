<?php
    // ------------------------Functions--------------------------------------
    
    function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }

    // --------------------------------------------------------------------
    if(isset($_POST['sub']))
    {
        $con = mysqli_connect('localhost','root','','Library Management System');
        if($con)
        {
            $username=mysqli_real_escape_string($con,$_POST['user']);
            $email=mysqli_real_escape_string($con,$_POST['email']);
            $password= mysqli_real_escape_string($con,$_POST['password']);

            $sql = "SELECT email FROM student_registration where email='$email'";
            $result = mysqli_query($con,$sql);
            $result=mysqli_fetch_assoc($result);

            
            if(empty($result))
            {
                $reg="insert into student_registration (username,email,password) values ('$username','$email','$password')";
                if (mysqli_query($con,$reg)) {
                    phpAlert("Registration Successful");
                    header("location:student_login_form.php");
                } else {
                    phpAlert("Registration Unsuccessful");
                }
            }
            else
            {
                phpAlert("Email Already Registered");
            }
        }
        else{
            phpAlert("Database Connection Error");
        }
        mysqli_close($con);
    }
?>