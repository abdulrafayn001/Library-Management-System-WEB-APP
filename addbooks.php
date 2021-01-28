<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('location:register_login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard | Admin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="CSS/dashboard.css">
    <link rel="stylesheet" href="CSS/bookmanager_pannel.css">
    <script src="JS/addstudent.js"></script>
    <script src="JS/dashboard.js" defer></script>
</head>

<body>
    <div class="headSection">
        <?php
        echo "<h1><i class='fas fa-user-lock'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin : " . $_SESSION['name'] . "</h1>"
        ?>
        <form action="logout_admin.php">
            <button class="myButton"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;logout</button>
        </form>
    </div>
    <div class="itemContainer">
        <div id="menuItem" class="menuItem">
            <h3>Options</h3>
            <form action="admin.php">
                <button class="menuItems"><i class="fas fa-tachometer-alt"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</button>
            </form>
            <form action="bookmanager.php">
                <button class="menuItems"><i class="fas fa-book"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Manage Books</button><br>
            </form>

            <button class="menuItems"><i class="fas fa-bookmark"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issue Books</button><br>
            <button class="menuItems"><i class="fas fa-book-reader"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Issued Books</button><br>
            <button class="menuItems"><i class="fas fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;Manage Users</button><br>
            <button class="menuItems"><i class="fas fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;Book Requests</button><br>
            <form action="profile.php">
                <button class="menuItems"><i class="fas fa-user-cog"></i>&nbsp;&nbsp;&nbsp;&nbsp;About</button><br>
            </form>
        </div>
        <div class="collapser">
            <button name="hide" id="conatinerHider"><i class="fas fa-caret-right"></i></button>
        </div>
        <div class="pannel">
            <form action="addbooksop.php" method="POST">
                <label for="bname">Book Title</label><br>
                <input type="text" name="bname" placeholder="Enter Book Title"><br>

                <label for="bdesc">Book Description</label><br>
                <input type="text" name="bdesc" placeholder="Enter Book Description"><br>

                <label for="qty">Total Books Qty</label><br>
                <input type="text" name="qty" placeholder="Enter Book Quantity"><br>

                <label for="category">Category</label><br>
                <input type="text" name="category" placeholder="Enter Category"><br>
                <button class="btnAdd" type="submit" name="addbook">Add Book</button>
            </form>
        </div>
    </div>
</body>

</html>