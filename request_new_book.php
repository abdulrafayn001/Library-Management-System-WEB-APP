<?php
    session_start();
    $con = mysqli_connect('localhost','root','','Library Management System');

    if($con)
    {
        $sql3="SELECT username from student_registration where email='".$_SESSION['email']."'";
        $check=mysqli_query($con,$sql3); 
        $n=mysqli_fetch_assoc($check);

        $sql2="SELECT *from new_book_request where user_email='".$_SESSION['email']."'";
        $check=mysqli_query($con,$sql2);

        echo "
            <div class='all'>
                <div class='update_password'>
                <hr>
                <label for='req_new_book'>Book Name </label>
                <input type='text' name='book' id='req_book_name'>
                <br>
                <label for='book_url'>url</label>
                <input id='new_book_url' type='text' name='book_url' placeholder='Book URL if any' id='req_book_url'>
                <br>
                <label for='note'>Note:</label>

                <textarea id='req_note' name='note' rows='4' cols='50' maxlength='100'></textarea>
                <hr>
                <button id='req'> Submit </button>
            </div>

            <div id='info_table'>
                <table class='info'>
                    <tr>
                        <th>Book Name</th>
                        <th>URL</th>
                        <th>Book Desc</th>
                        <th>Person Name</th>
                        <th>Added On</th>
                    </tr>'";

                    while ($data = mysqli_fetch_assoc($check))
                    {
                        echo '<tr>
                            <td>' . $data['book_name'] . "</td>
                            <td> <a href='".$data['url']."'>visit</a></td>
                            <td>" . $data['note'] . '</td>
                            <td>' . $n['username'] . '</td>
                            <td>' . $data['date'] . '</td>
                            </tr>';
                    }
                    echo '</table>';
        echo"        
            </div>
        </div>
        ";
    }
    
?>