<?php

session_start();
unset($_SESSION["email"]);
unset($_SESSION["name"]);
unset($_SESSION["send"]);
header("Location:register_login.php");

?>