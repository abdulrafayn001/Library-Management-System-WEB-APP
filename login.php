<?php
    // ------------------------Functions--------------------------------------
    
    function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }

// --------------------------------------------------------------------
    session_start();
    $con = mysqli_connect('localhost','root','','Library Management System');
    if($con)
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        

        $sql = 'SELECT * FROM admins where email="'.$email .'" && password="'.$password.'"';
        $result = mysqli_query($con,$sql);
        $result=mysqli_fetch_array($result);

        
        if(is_array($result))
        {
            $_SESSION['name'] = $result['username'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['id'] = $result['id'];
            header('location:admin.php');
        }
        else
        {
            header('location:register_login.php');
        }
    }
    else{
        phpAlert("Database Connection Error");
    }
    mysqli_close($con);
    
    
?>