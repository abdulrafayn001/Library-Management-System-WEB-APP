<?php
        $con = mysqli_connect('localhost','root','','Library Management System');
        if($con)
        {
            $username=mysqli_real_escape_string($con,$_POST['user']);
            $email=mysqli_real_escape_string($con,$_POST['email']);
            $password= mysqli_real_escape_string($con,$_POST['password']);

            $sql = "SELECT email FROM student_registration where email='$email'";
            $result = mysqli_query($con,$sql);
            $result = mysqli_fetch_assoc($result);

            
            if(empty($result))
            {
                $reg="insert into student_registration (username,email,password) values ('$username','$email','$password')";
                if (mysqli_query($con,$reg)) 
                {
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
                                <input type="hidden" name="id" value=' . $info['id'] . ' hidden>
                                <button type="submit" name="rmRec">DELETE</button>
                                </form></th>
                        </tr>'  ;
                    }

                    echo '</table>';

                    echo "<button class='btnAdd' id='addstd' style='margin-top:2rem;'><i class='fas fa-plus-circle'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Students</button>";
                } 
                else 
                {
                    phpAlert("Registration Unsuccessful");
                }
            }
            else
            {
                echo "<h1>Email Already Registered</h1>";
            }
        mysqli_close($con);
    }
}
?>