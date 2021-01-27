<?php
    session_start();
<<<<<<< HEAD
    if(isset($_SESSION['username']))
    {
        header("Location: user_panel.php" );
    }
?>
<!DOCTYPE html>
<html lang="en">
=======
    if (isset($_SESSION['username'])) {
        header("location:user_panel.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

>>>>>>> 0ddd8731d668376313389997b7867475ebdef2f6
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/formstyle.css">
    <title>Register</title>
</head>
<<<<<<< HEAD
=======

>>>>>>> 0ddd8731d668376313389997b7867475ebdef2f6
<body>
    <div class="main">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" id="login_btn" class="toggle-btn" onclick="login()">Login</button>
                <button type="button" id="register_btn" class="toggle-btn" onclick="register()">Register</button>
            </div>
<<<<<<< HEAD
            
=======

>>>>>>> 0ddd8731d668376313389997b7867475ebdef2f6
            <form class="input-group" id="login" action="student_login.php" method="post">
                <input type="email" name="email" class="input-field" placeholder="Email" required>
                <input type="password" name="password" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <button type="submit" name="sub" class="submit-btn">Log in</button>
            </form>
<<<<<<< HEAD
            
            <form class="input-group" id="register" action="student_registration.php" method="post">
                <input type="text" name="user"class="input-field" placeholder="User Id" required>
=======

            <form class="input-group" id="register" action="student_registration.php" method="post">
                <input type="text" name="user" class="input-field" placeholder="User Id" required>
>>>>>>> 0ddd8731d668376313389997b7867475ebdef2f6
                <input type="email" name="email" class="input-field" placeholder="Email" required>
                <input type="password" name="password" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" name="agree" class="check-box"><span>I agree to to the terms and conditions.</span>
                <button type="submit" name="sub" class="submit-btn">Register</button>
            </form>

        </div>
        <script src="JS/register_login.js"></script>
    </div>
<<<<<<< HEAD
    
</body>
=======

</body>

>>>>>>> 0ddd8731d668376313389997b7867475ebdef2f6
</html>