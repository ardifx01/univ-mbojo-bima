<?php
session_start();
unset($_SESSION['user_humas']);
unset($_SESSION['login']);
session_destroy();
header("Location:index.php");
?>