<?php
ob_start();
session_start();
include("../koneksi.php");
if(isset($_POST['login'])){
	$username = $_POST['user_humas'];
	$pass = $_POST['pass_humas'];
	$query = mysqli_query($con,"SELECT * FROM humas WHERE username_humas='$username' and password_humas='$pass'");
	$cek = mysqli_num_rows($query);
	if($cek > 0){
		$_SESSION['user_humas'] = $username;
		$_SESSION['status'] = "login";
		header("location:home.php");
	}else{
		echo "<script language='JavaScript'> 
		alert('Login gagal cek username dan password') 
		document.location = 'user_dosen.php'
		</script>";
	}
	
}

?>