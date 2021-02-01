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
                                            <th></th>
                                        </tr>'";
                                        $i=0;
                                        while ($data = mysqli_fetch_assoc($check))
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
                                                <td>' . $data['id'] . '</td>
                                                <td>' . $data['name'] . '</td>
                                                <td>' . $data['description'] . '</td>
                                                <td>' . $data['category'] . '</td>
                                                <td>' . $data['quantity'] . '</td>
                                                <td>' . $data['borrowed'] . '</td>
                                                <td>
                                                <button class="request" name=' . $data['id'] . ' value=' . $_SESSION['email'] . '>Request</button>
                                                </form></td>
                                                </tr>';
                                                $i=$i+1;
                                        }
                                        echo '</table>';
                            echo"        
                                </div>
                            </div>
                    ";
                
            }
    }
    
?>
