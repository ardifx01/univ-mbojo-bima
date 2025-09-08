<?php
session_start();
unset($_SESSION['user_admin_prodi']);
unset($_SESSION['login']);
session_destroy();
header("Location:login_admin_prodi.php");
?>