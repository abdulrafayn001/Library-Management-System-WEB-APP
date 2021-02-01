<?php
    session_start();
    if(isset($_SESSION['username']))
    {
        header("Location: user_panel.php" );
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="CSS/formstyle.css">
    <title>Register</title>
</head>
<body>
    <div class="main">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" id="login_btn" class="toggle-btn" onclick="login()">Login</button>
                <button type="button" id="register_btn" class="toggle-btn" onclick="register()">Register</button>
            </div>
            
            <form class="input-group" id="login" action="student_login.php" method="post">
                <input type="email" name="email" class="input-field" placeholder="Email" required>
                <input type="password" name="password" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <button type="submit" name="sub" class="submit-btn">Log in</button>
            </form>
            
            <form class="input-group" id="register" action="student_registration.php" method="post">
                <input type="text" name="user"class="input-field" placeholder="User Id" required>
                <input type="email" name="email" class="input-field" placeholder="Email" required>
                <input type="password" name="password" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" name="agree" class="check-box"><span>I agree to to the terms and conditions.</span>
                <button type="submit" name="sub" class="submit-btn">Register</button>
            </form>

        </div>
        <script src="JS/register_login.js"></script>
    </div>
    
</body>
</html>