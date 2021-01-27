<?php

if(isset($_POST['rmRec']))
{
    $id = $_POST['id'];
    $con = mysqli_connect('localhost', 'root', '', 'Library Management System');
    if ($con) 
    {
        $sqlQuery = "DELETE FROM student_registration where id=$id";        
        mysqli_query($con, $sqlQuery);
        header("location:admin.php");
    }
    else
    {
        echo "<h1>Network Problem!</h1>";    
    }
}
else
{
    echo "<h1>Page Not Found!</h1>";
}
