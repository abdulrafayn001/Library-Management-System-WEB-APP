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
                $sql_book_id = "SELECT book_id FROM book_request where req_id=".$_POST['id'];
                $data = mysqli_fetch_assoc(mysqli_query($con, $sql_book_id));

                $sql_user = "UPDATE books set quantity=quantity-1 ,borrowed=borrowed+1 where id=".$data['book_id'];
                mysqli_query($con, $sql_user);

                $current=Date('Y/m/d');
                $due = Date('Y/m/d', strtotime("+10 days"));
                $sql_user = "UPDATE book_request set status='approved',due_date='$due', issued_date='$current' where req_id=".$_POST['id'];
                mysqli_query($con, $sql_user);

                $sql_user = "SELECT b.status,b.req_id,s.username,bk.name FROM book_request as b inner join 
                            student_registration as s on S.id=b.user_id inner join books as bk on bk.id=b.book_id";

                $check = mysqli_query($con,$sql_user);
                if(!empty($check))
                {
                    echo "<h2>Issue Books.</h2><hr>";
                    echo "<table class='info'>
                                        <tr>
                                            <th>Requester's Name</th>
                                            <th>Book Requested</th>
                                        </tr>";

                                        while ($data = mysqli_fetch_assoc($check))
                                        {
                                            if($data['status'] == "pending")
                                            {
                                                echo '<tr>
                                                 <td>' . $data['username'] . '</td>
                                                 <td>' . $data['name'] . '</td>
                                                 <td><button id="accept" value=' . $data['req_id'] . '>Accept</button></td>
                                                 <td><button id="reject" value=' . $data['req_id'] . '>Reject</button></td>
                                                 </tr>';
                                            }
                                        }
                                        echo '</table>';
                    }
                    else
                    {
                        echo "<h1>No Record Found!</h1>";
                    }
            }
    }
?>