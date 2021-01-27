<?php
                $con = mysqli_connect('localhost', 'root', '', 'Library Management System');
                if ($con) {
                    $sqlQuery = "SELECT * FROM student_registration";
                    $result = mysqli_query($con, $sqlQuery);
                    if (!empty($result)) {
                        echo '<table>
                            <tr>
                                <th>Student ID</th>
                                <th>Username</th>
                                <th>Email</th>
                            </tr>';
                        while ($info = mysqli_fetch_assoc($result)) {
                            echo '<tr>
                                <td>' . $info['id'] . '</td>
                                <td>' . $info['username'] . '</td>
                                <td>' . $info['email'] . '</td>
                                <th><form action="deletestd.php" method="POST">
                                <input type="hidden" name="id" value=' . $info['id'] . ' >
                                <button type="submit" name="rmRec">DELETE</button>
                                </form></th>
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
