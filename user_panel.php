<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: student_login_form.php" );
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard | User</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="CSS/dashboard.css">
    <script src="JS/dashboard.js" defer></script>
</head>

<body>
    <div class="headSection">
        <h1><?php echo $_SESSION['username']?>'s Dashboard</h1>
        <a href="logout.php" class="myButton"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;logout</a>
    </div>
    <div class="itemContainer">
        <div id="menuItem" class="menuItem">
            <h3>Options</h3>
            <button class="menuItems"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dashboard</button>
            <button class="menuItems"><i class="fas fa-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manage Books</button><br>
            <button class="menuItems"><i class="fas fa-bookmark"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issue Books</button><br>
            <button class="menuItems"><i class="fas fa-book-reader"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Issued Books</button><br>
            <button class="menuItems"><i class="fas fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;Manage Users</button><br>
            <button class="menuItems"><i class="fas fa-user-cog"></i>&nbsp;&nbsp;&nbsp;&nbsp; About</button><br>
        </div>
        <div class="collapser">
            <button name="hide" id="conatinerHider"><i class="fas fa-caret-right"></i></button>
        </div>
        <div class="pannel">

        </div>
    </div>
</body>

</html>