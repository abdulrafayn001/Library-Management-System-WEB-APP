<?php
    $con = mysqli_connect('localhost', 'root', '', 'Library Management System');
    if ($con) {
        $sqlQuery = "SELECT * FROM student_registration";
        $result = mysqli_query($con, $sqlQuery);
        if (!empty($result)) {
            echo "<h2>User Manager.</h2><hr>";
            echo '<table>
                <tr>
                    <th>Student ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th></th>
                </tr>';
            while ($info = mysqli_fetch_assoc($result)) {
                echo '<tr>
                    <td>' . $info['id'] . '</td>
                    <td>' . $info['username'] . '</td>
                    <td>' . $info['email'] . '</td>
                    <td style="text-align:text-align"><form action="deletestd.php" method="POST">
                    <input type="hidden" name="id" value=' . $info['id'] . ' >
                    <button class="del" type="submit" name="rmRec">DELETE</button>
                    </form></td>
                    </tr>';
                }
            echo '</table>';

            echo "<button class='btnAdd' id='addstd' style='margin-top:2rem;'><i class='fas fa-plus-circle'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Students</button>";
        } 
        else{
            echo "<h1>No Books Record Exists!</h1>";
        }
    } 
    else{
        "<h1>Database Connection Error</h1>";
    }
    mysqli_close($con);
?>
