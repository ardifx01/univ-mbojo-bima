<?php
session_start();
unset($_SESSION['username_admin']);
unset($_SESSION['login']);
session_destroy();
header("Location:admin/index.php");
?>