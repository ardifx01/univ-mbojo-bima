<?php
ob_start();
session_start();
include("koneksi.php");
if(isset($_POST['login'])){
	$username = $_POST['user_dosen'];
	$pass = $_POST['pass_dosen'];
	$query = mysqli_query($con,"SELECT * FROM tabel_dosen WHERE user_dosen='$username' and pass_dosen='$pass'");
	$cek = mysqli_num_rows($query);
	if($cek > 0){
		$_SESSION['user_dosen'] = $username;
		$_SESSION['status'] = "login";
		header("location:index.php");
	}else{
		echo "<script language='JavaScript'> 
		alert('Login gagal cek username dan password') 
		document.location = 'user_dosen.php'
		</script>";
	}
	
}

?>