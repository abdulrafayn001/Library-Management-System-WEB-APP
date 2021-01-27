<?php
    // ------------------------Functions--------------------------------------
    session_start();
    function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }

    // --------------------------------------------------------------------
    if(isset($_POST['sub']))
    {
        $con = mysqli_connect('localhost','root','','Library Management System');
        if($con)
        {
            $email=mysqli_real_escape_string($con,$_POST['email']);
            $password= mysqli_real_escape_string($con,$_POST['password']);

            $sql = "SELECT * FROM student_registration where email='$email' && password='$password'";
            $result = mysqli_query($con,$sql);
            $result=mysqli_fetch_assoc($result);

            
            if(empty($result))
            {
<<<<<<< HEAD
                header('location:student_login.php');
            }
            else
            {
                $sql = "SELECT username, email FROM student_registration where email='$email' && password='$password'";
                $result = mysqli_query($con,$sql);
                $result=mysqli_fetch_assoc($result);
                
                

                $_SESSION['username']=$result['username'];
                $_SESSION['email']=$result['email'];

                $_SESSION['login']="yes";
                
=======
                header('location:register_login.php');
            }
            else
            {
                $sql = "SELECT username FROM student_registration where email='$email' && password='$password'";
                $result = mysqli_query($con,$sql);
                $result=mysqli_fetch_assoc($result);
                $_SESSION['username']=$result['username'];
>>>>>>> 0ddd8731d668376313389997b7867475ebdef2f6
                header('location:user_panel.php');
            }
        }
        else{
            phpAlert("Database Connection Error");
        }
        mysqli_close($con);
    }
?>