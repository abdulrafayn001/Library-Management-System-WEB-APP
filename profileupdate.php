<?php

session_start();
if(!empty($_POST['email']) && !empty($_POST['name']))
{
    if(($_POST['email'] == $_SESSION['email']) || ($_POST['name'] == $_SESSION['name']))
    {
        $con = mysqli_connect('localhost', 'root', '', 'Library Management System');
        if ($con) 
        {
            $sqlQuery = "UPDATE admins set email='".$_POST['email']."',"."username='".$_POST['name']."' where id=".$_SESSION['id'];
            mysqli_query($con,$sqlQuery);

            // updating session
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['email'] = $_POST['email'];

            echo "<h1>Information Updated Sucessfully</h1>";
        }
        else
        {
            echo "<h1>No Database Exists!</h1>";
        }
    }
}
else
{
    echo "<h1>Empty Fields are empty Can't update Data!</h1>";
}

?>