<?php
ob_start();
session_start();
include("koneksi.php");
if(isset($_POST['login'])){
	$username = $_POST['username_admin'];
	$pass = $_POST['password_admin'];
	$query = mysqli_query($con,"SELECT * FROM admin WHERE username_admin='$username' and password_admin='$pass'");
	$cek = mysqli_num_rows($query);
	if($cek > 0){
		$_SESSION['username_admin'] = $username;
		$_SESSION['status'] = "login";
		header("location:index_admin.php");
	}else{
		echo "<script language='JavaScript'> 
		alert('Login gagal cek username dan password') 
		document.location = 'admin/index.php'
		</script>";
	}
	
}

?>