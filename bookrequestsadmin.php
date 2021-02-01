<?php
$con = mysqli_connect('localhost', 'root', '', 'Library Management System');
if ($con) {
    echo "<h2>Book Requests</h2><hr>";
    $sqlQuery = "SELECT * FROM new_book_request";
    $result = mysqli_query($con, $sqlQuery);
    if (!empty($result)) {
        echo '<table>
                <tr>
                    <th>ID</th>
                    <th>User Email</th>
                    <th>Book Title</th>
                    <th>Date</th>
                    <th>URL</th>
                    <th>Student Name</th>
                    <th>Note</th>
                </tr>';
        while ($info = mysqli_fetch_assoc($result)) {
            echo '<tr>
                        <td>' . $info['id'] . '</td>
                        <td>' . $info['user_email'] . '</td>
                        <td>' . $info['book_name'] . '</td>
                        <td>' . $info['date'] . '</td>
                        <td><a href='.$info['url'].'>link</a></td>
                        <td>' . $info['student_name'] . '</td>
                        <td>' . $info['note'] . '</td>
                    </tr>';
        }
        echo '</table>';
    }
    else 
    {
        echo "<h1>No Books Record Exists!</h1>";
    }
} else {
    "<h1>Database Connection Error</h1>";
}
mysqli_close($con);
?>