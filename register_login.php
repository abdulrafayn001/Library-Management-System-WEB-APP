<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <link rel="stylesheet" href="CSS/formstyle.css">
    <title>Admin Login</title>
</head>

<body>
    <div class="main">
        <div class="form-box">
            <div style="
                width: 220px;
                font-size: 25px;
                text-align: center;
                margin: 35px auto;
                height: 70px;">
                <i class="fas fa-user-lock"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin Login
            </div>

            <form class="input-group" id="login" action="login.php" method="post">
                <input type="email" name="email" class="input-field" placeholder="Email" required>
                <input type="password" name="password" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <button type="submit" class="submit-btn">Log in</button>
            </form>

        </div>
    </div>

</body>

</html>