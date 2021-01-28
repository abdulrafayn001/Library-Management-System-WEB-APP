<?php
    session_start();
    $con = mysqli_connect('localhost','root','','Library Management System');
    if($con)
    {
            $sql="SELECT *FROM books";
            $check=mysqli_query($con,$sql);
            if(empty($check))
            {
                echo "<h3>No Recoed Found</h3><br>";
            }
            else
            {
                
                echo "
                    <div class='all'>
                                <div class='search'>
                                    <input type='text' name='name' id='book_name' placeholder='Book Name'>
                                    <input type= 'text' name='cat' id='cat' placeholder='Category'>
                                    <button id='searching'> Search </button>
                                </div>
                                <div id='info_table'>
                                    <table class='info'>
                                        <tr>
                                            <th>ID #</th>
                                            <th>Book Name</th>
                                            <th>Book Desc</th>
                                            <th>Category</th>
                                            <th>Qty</th>
                                            <th>Borrowed</th>
                                        </tr>'";

                                        while ($data = mysqli_fetch_assoc($check))
                                        {
                                            echo '<tr>
                                                <td>' . $data['id'] . '</td>
                                                <td>' . $data['name'] . '</td>
                                                <td>' . $data['description'] . '</td>
                                                <td>' . $data['category'] . '</td>
                                                <td>' . $data['quantity'] . '</td>
                                                <td>' . $data['borrowed'] . '</td>
                                                <td>
                                                <input type="text" class="book_id" value=' . $data['id'] . ' hidden>
                                                <input type="text" class="user_email" value=' . $_SESSION['email'] . ' hidden>
                                                <button class="request" name=' . $data['id'] . ' value=' . $_SESSION['email'] . '>Request</button>
                                                </form></td>
                                                </tr>';
                                        }
                                        echo '</table>';
                            echo"        
                                </div>
                            </div>
                    ";
                
            }
    }
    
?>
