<?php
    session_start();
    $con = mysqli_connect('localhost','root','','Library Management System');
    if($con)
    {
            $sql="SELECT *FROM book_request";
            $check=mysqli_query($con,$sql);
            if(empty($check))
            {
                echo "<h3>No Recoed Found</h3><br>";
            }
            else
            {
                $sql_user = "SELECT b.due_date,b.status,b.req_id,s.username,bk.name FROM book_request as b inner join 
                            student_registration as s on S.id=b.user_id inner join books as bk on bk.id=b.book_id";

                $check = mysqli_query($con,$sql_user);
                echo "<h2>All Issued Books.</h2><hr>";
                echo "<table class='info'>
                                        <tr>
                                            <th>User's Name</th>
                                            <th>Book Requested</th>
                                            <th>Due Date</th>

                                        </tr>";

                                        while ($data = mysqli_fetch_assoc($check))
                                        {
                                            if($data['status'] == "approved")
                                            {
                                                echo '<tr>
                                                 <td>' . $data['username'] . '</td>
                                                 <td>' . $data['name'] . '</td>
                                                 <td>' . $data['due_date'] . '</td>
                                                 </tr>';
                                            }
                                        }
                                        echo '</table>';
            }
    }
?>