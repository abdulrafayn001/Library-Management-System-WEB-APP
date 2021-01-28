<?php
    $con = mysqli_connect('localhost', 'root', '', 'Library Management System');
    if ($con) 
    {
        $name = $_POST['bname'];
        $desc = $_POST['bdesc'];
        $qty = $_POST['qty'];
        $cat = $_POST['category'];
        if(!empty($name) && !empty($desc) && !empty($qty) && !empty($cat))
        {
            $sqlQuery = "INSERT INTO books(name,description,category,quantity) VALUES ('" . $name . "','" . $desc . "','" . $cat . "'," . $qty . ")";
            $result = mysqli_query($con, $sqlQuery);
            header("location:bookmanager.php");
        }
        else
        {
            echo "<h1>Empty Input Fields Found!</h1>";
        }
        mysqli_close($con);
    }
    else
    {
        echo "<h1>Check Your Connection!</h1>";
    }
?>