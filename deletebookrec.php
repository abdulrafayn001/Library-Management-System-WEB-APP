<?php

if(isset($_POST['rmRec']))
{
    $id = $_POST['id'];
    $con = mysqli_connect('localhost', 'root', '', 'Library Management System');
    if ($con) 
    {
        $sqlQuery = "DELETE FROM books where id=$id";        
        mysqli_query($con, $sqlQuery);
        header("location:bookmanager.php");
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

?>
