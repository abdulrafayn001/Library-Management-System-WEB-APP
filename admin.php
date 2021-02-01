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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Styling -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="CSS/dashboard.css">
    <link rel="stylesheet" href="CSS/bookmanager_pannel.css">
    <link rel="stylesheet" href="CSS/pannel.css">



    <!-- JS -->
    <script src="JS/bookrequests.js"></script>
    <script src="JS/usermanager.js"></script>
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
            <div class="carding">
                <div class="cardcontainer">
                    <div>
                        <?php
                        function PrintCount($assos, $pt)
                        {
                            if (empty($assos)) {
                                echo "<h2>0</h2>";
                            } else
                                echo '<h2>' . $pt . '</h2>';
                        }
                        $con = mysqli_connect('localhost', 'root', '', 'Library Management System');
                        if ($con) {
                            $sqlQuery = "SELECT COUNT(id) as tstd FROM student_registration";
                            $Tstd = mysqli_query($con, $sqlQuery);
                            $Tstd = mysqli_fetch_array($Tstd);
                            PrintCount($Tstd, $Tstd['tstd']);
                        } else {
                            echo "<h1>Network Problem!</h1>";
                        }
                        ?>
                    </div>
                    <p>Total Students</p>
                </div>

                <div style="margin-left: 2rem;" class="cardcontainer">
                    <div>
                        <?php
                        $sqlQuery = "SELECT COUNT(id) as tstd FROM books";
                        $Tstd = mysqli_query($con, $sqlQuery);
                        $Tstd = mysqli_fetch_array($Tstd);
                        PrintCount($Tstd, $Tstd['tstd']);
                        ?>
                    </div>
                    <p>Total Books</p>
                </div>

                <div style="margin-left: 2rem;" class="cardcontainer">
                    <div>
                        <?php
                        $sqlQuery = "SELECT * FROM book_request";
                        $Tstd = mysqli_query($con, $sqlQuery);
                        $count = 0;
                        while ($data = mysqli_fetch_array($Tstd)) {
                            if ($data['status'] == 'pending') {
                                $count++;
                            }
                        }
                        echo '<h2>' . $count . '</h2>';
                        ?>
                    </div>
                    <p>New Book Requests</p>
                </div>

                <div style="margin-left: 2rem;" class="cardcontainer">
                    <div>
                        <?php
                        $sqlQuery = "SELECT * FROM book_request";
                        $Tstd = mysqli_query($con, $sqlQuery);
                        $count = 0;
                        while ($data = mysqli_fetch_array($Tstd)) {
                            if ($data['status'] == 'approved') {
                                $count++;
                            }
                        }
                        echo '<h2>' . $count . '</h2>';
                        ?>
                    </div>
                    <p>Issued Books</p>
                </div>
            </div><br><br>
            <hr>
            <div>
                <?php
                $con = mysqli_connect('localhost', 'root', '', 'Library Management System');
                if ($con) {
                    $sqlQuery = "SELECT * FROM admins";
                    $result = mysqli_query($con, $sqlQuery);
                    if (!empty($result)) {
                        echo "<br><br><h2>Other Admins.</h2><hr>";
                        echo '<table style="width: 100%;">
                            <tr>
                                <th>Admin ID</th>
                                <th>Admin Name</th>
                                <th>Admin Email</th>
                            </tr>';
                        while ($info = mysqli_fetch_assoc($result)) {
                            if ($_SESSION['email'] != $info['email']) {
                                echo '<tr>
                                <td>' . $info['id'] . '</td>
                                <td>' . $info['username'] . '</td>
                                <td>' . $info['email'] . '</td>
                                </tr>';
                            }
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
        </div>
    </div>
</body>

</html>