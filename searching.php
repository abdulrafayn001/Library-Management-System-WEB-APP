<?php
    session_start();
    function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
    $con = mysqli_connect('localhost', 'root', '', 'Library Management System');
    if ($con) 
    {
        if($_POST['check']=="no")
        {
            $sql="";
            if(empty($_POST['name']) && empty($_POST['cat']))
            {
                $sql = "SELECT *from books";
            }
            else
            if(!empty($_POST['name']) && empty($_POST['cat']))
            {
                $sql = "SELECT *from books where name LIKE '%".$_POST['name']."%'";
            }
            else
            if(empty($_POST['name']) && !empty($_POST['cat']))
            {
                $sql = "SELECT *from books where category LIKE '%" . $_POST['cat'] . "%'";
            }
            else
            {
                $sql = "SELECT *from books where name LIKE '%" . $_POST['name'] . "%' and category LIKE '%". $_POST['cat']."%'";        
            }
        }
        else
        if($_POST['check']=="yes")
        {
            $sql="SELECT id from student_registration where email ='".$_POST['user_email']."'";
            $res = mysqli_query($con, $sql);
            $data = mysqli_fetch_assoc($res);

            $sqli="SELECT quantity,borrowed from books where id= ".$_POST['book_id']."";
            $re = mysqli_query($con, $sqli);
            $y = mysqli_fetch_assoc($re);
            
            if($y['quantity']!=0)//
            {
                $sql="SELECT *from book_request where user_id= ".$data['id']." and book_id= ".$_POST['book_id']."";
                $res = mysqli_query($con, $sql);
                $x = mysqli_fetch_assoc($res);

                if(empty($x))
                {
                    $currentDate=date('Y-m-d');
                    $sql="INSERT INTO book_request (book_id,user_id,request_date) values (".$_POST['book_id'].",".$data['id'].",'".$currentDate."')";
                    $res = mysqli_query($con, $sql);
                    phpAlert("Request Sent. Take this book from librarian.");
                }
                else
                {
                    phpAlert("Request already sent.");
                }
            }
            else
            {
                phpAlert("Book is not available. Search for other book or come later.");
            }
            $sql="SELECT *FROM BOOKS";
        }
       
        $res = mysqli_query($con, $sql);
        if(!empty($res))
        {
                echo '<table class="info">
                            <tr>
                                <th>Book ID</th>
                                <th>Book Name</th>
                                <th>Book Desc</th>
                                <th>Category</th>
                                <th>Qty</th>
                                <th>Borrowed</th>
                                <th></th>
                            </tr>';
                                while ($data = mysqli_fetch_assoc($res))
                                {
                                    echo'<tr>
                                    <td>' . $data['id'] . '</td>
                                    <td>' . $data['name'] . '</td>
                                    <td>' . $data['description'] . '</td>
                                    <td>' . $data['category'] . '</td>
                                    <td>' . $data['quantity'] . '</td>
                                    <td>' . $data['borrowed'] . '</td>
                                    <td>
                                        <button class="request" name=' . $data['id'] . ' value=' . $_SESSION['email'] . '>Request</button>
                                        </form>
                                    </td>
                                    </tr>';   
                                }
                    echo '</table>';
        }
        else
        {
            echo "</h1>No Such Book Found!</h1>";
        }
        mysqli_close($con);
    }
    else
    {
        echo "<h1>Connection Failed!</h1>";
    }
?>