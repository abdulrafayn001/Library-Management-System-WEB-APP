<?php
$con = mysqli_connect('localhost', 'root', '', 'Library Management System');
if ($con) {

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