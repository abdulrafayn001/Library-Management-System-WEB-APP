<?php

session_start();
unset($_SESSION["email"]);
unset($_SESSION["name"]);
unset($_SESSION["send"]);
session_destroy();
header("Location:register_login.php");

?>