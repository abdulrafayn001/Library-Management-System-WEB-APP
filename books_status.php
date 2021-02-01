<?php
    session_start();
    function fetchDate($txt,$delm)
    {
        $date = explode($delm,$txt);
        $data = (int)$date[2];

        return $data;
    }
    function phpAlert($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
    $con = mysqli_connect('localhost','root','','Library Management System');
    
    if($con)
    {
        if($_POST['check']=='yes')
        {
            $sql="DELETE FROM book_request WHERE book_id="."'".$_POST['book']."' and user_id='".$_POST['user']."'";
            $check=mysqli_query($con,$sql);
            if($check)
            {
                phpAlert("Request Cancelled");
            }
        }
        $sql= "SELECT id FROM student_registration where email="."'".$_SESSION['email']."'";        
        $check=mysqli_query($con,$sql);
        $data = mysqli_fetch_assoc($check);
        
        
        if($check)
        {
            $sql="SELECT *FROM book_request where user_id='".$data['id']."'";
            $check=mysqli_query($con,$sql);
            if($check)
            {
                echo "
                <div class='all'>
                <h1 style='margin-top: 25px;'>Book Status</h1>
                            <div id='info_table'>
                                <table class='info'>
                                    <tr>
                                        <th>Book ID</th>
                                        <th>Book Name</th>
                                        <th>Issued Date</th>
                                        <th>Due Date</th>
                                        <th>Days to Go</th>
                                        <th>Fine</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>'";

                                    while ($data = mysqli_fetch_assoc($check))
                                    {
                                        $sqli= "SELECT *FROM books where id='$data[book_id]'";    
                                            
                                        $chek=mysqli_query($con,$sqli);
                                        $dta_bk = mysqli_fetch_assoc($chek);
                                        echo '<tr>
                                            <td>' . $data['book_id'] . '</td>
                                            <td>' . $dta_bk['name'] . '</td>';
                                            if($data['status']=="pending")
                                            {
                                                echo '<td> - </td>';
                                                echo '<td> - </td>';
                                                echo '<td> - </td>';
                                                echo '<td> - </td>'; 
                                            }
                                            else
                                            {
                                                echo '<td>' . $data['issued_date'] . '</td>';
                                                echo '<td>' . $data['due_date'] . '</td>';
                                                
                                                if(!empty($data['issued_date']) && !empty($data['due_date']))
                                                {
                                                    $due=fetchDate($data['due_date'],'/');
                                                    $curr=fetchDate(Date('Y/m/d'),'/');
                                                    // $curr=12;
                                                    // echo $due."   ".$curr."<br>";
                                                    if((($curr%30)-$due)*-1>0)
                                                    {
                                                        echo '<td>' . (($curr%30)-$due)*-1 . '</td>';
                                                    }
                                                    else
                                                    {
                                                        echo '<td>Exceeded</td>';
                                                    }
                                                    if((($curr%30)-$due)*-1<0)
                                                    {
                                                        $fine=((($curr%30)-$due)*-1)*-50;
                                                        echo '<td>' . $fine . '</td>';
                                                    }
                                                    else
                                                    {
                                                        echo '<td> - </td>';
                                                    }
                                                }
                                                else
                                                {
                                                    echo'<td> - </td>';
                                                    echo'<td> - </td>';
                                                }
                                                
                                            }

                                            echo '<td>' . $data['status'] . '</td>';
                                            if($data['status']!="approved")
                                            {
                                                echo'<td>
                                                <button class="ok" name=' . $data['user_id'] . ' value=' . $data['book_id'] . '>x</button></td>
                                                </tr>';
                                            }
                                            else
                                            {
                                                echo'<td> - </td>
                                                </tr>';
                                            }
                                            
                                    }
                                    echo '</table>';
                        echo"        
                            </div>
                        </div>
                ";
            }
            
        }
    }
?>

