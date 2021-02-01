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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="JS/bookrequests.js"></script>
    <script src="JS/dashboard.js" defer></script>
    <script src="JS/usermanager.js"></script>
    <script src="JS/addstudent.js"></script>
    <script src="JS/searchbook.js"></script>

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

            <button class="menuItems" id="isbook"><i class="fas fa-bookmark"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Issue Books</button><br>
            <button class="menuItems" id="showallissued"><i class="fas fa-book-reader"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All Issued Books</button><br>
            <button class="menuItems" id="users"><i class="fas fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;Manage Users</button><br>
            <button class="menuItems" id="bookreq"><i class="fas fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;Book Requests</button><br>

            <form action="profile.php">
                <button class="menuItems"><i class="fas fa-user-cog"></i>&nbsp;&nbsp;&nbsp;&nbsp;About</button><br>
            </form>
        </div>
        <div class="collapser">
            <button name="hide" id="conatinerHider"><i class="fas fa-caret-right"></i></button>
        </div>
        <div class="pannel">
            <div style="width:inherit; display: flex; margin-top:2rem; justify-content:flex-end; ">
                <input type="text" id="name" placeholder="Enter Book Title">&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" id="cat" placeholder="Enter Category">&nbsp;&nbsp;&nbsp;&nbsp;
                <button class="btnAdd" id="search">Search</button>
            </div>
            <div id="searchpannel" style="width: inherit;">
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'Library Management System');
                if ($con) {
                    $sqlQuery = "SELECT * FROM books";
                    $result = mysqli_query($con, $sqlQuery);
                    if (!empty($result)) {
                        echo "<br><br><h2>Manage Books.</h2><hr><br>";
                        echo '<table>
                            <tr>
                                <th>Book ID</th>
                                <th>Book Title</th>
                                <th>Book Description</th>
                                <th>Book Qty Available</th>
                                <th>Book Category</th>
                                <th>Books Borrowed</th>
                                <th></th>
                            </tr>';
                            $i=0;
                        while ($info = mysqli_fetch_assoc($result)) 
                        {
                            if($i%2==0)
                            {
                                echo '<tr class="body">';
                            }
                            else
                            {
                                echo '<tr class="active-row">';
                            }
                            echo '
                                <td>' . $info['id'] . '</td>
                                <td>' . $info['name'] . '</td>
                                <td>' . $info['description'] . '</td>
                                <td>' . $info['quantity'] . '</td>
                                <td>' . $info['category'] . '</td>
                                <td>' . $info['borrowed'] . '</td>
                                <td><form action="deletebookrec.php" method="POST">
                                <input type="hidden" name="id" value=' . $info['id'] . '>
                                <button class="del" type="submit" name="rmRec">DELETE</button>
                                </form></td>
                                </tr>';
                                $i=$i+1;
                        }
                        echo '</table>';
                    } else {
                        echo "<h1>No Books Record Exists!</h1>";
                    }
                } else {
                    "<h1>Database Connection Error</h1>";
                }
                mysqli_close($con);
                ?>
            </div>
            <div class="operationContainer">
                <form action="addbooks.php" method="post">
                    <button type="submit" name="addbooksubmit" class="btnAdd">Add Book</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>