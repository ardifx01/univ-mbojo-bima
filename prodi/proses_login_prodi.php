<?php
ob_start();
session_start();
include("koneksi.php");
if(isset($_POST['login'])){
	$username = $_POST['user_admin_prodi'];
	$pass = $_POST['pass_admin_prodi'];
	$sebagai = $_POST['sebagai'];
	if ($sebagai == "P001") {
		$query = mysqli_query($con,"SELECT * FROM admin_prodi WHERE user_a_prodi='$username' and pass_a_prodi='$pass' and kode_prodi = '$sebagai'");
		$cek = mysqli_num_rows($query);

		if($cek > 0){
			$_SESSION['user_admin_prodi'] = $username;
			$_SESSION['status'] = "login";
			header("location:prodi/admin_prodi_ian1445/index.php");
		}else{
			echo "<script language='JavaScript'> 
			alert('Login gagal cek username dan password') 
			document.location = 'index.php'
			</script>";
		}
	}elseif ($sebagai == "P002") {
		$query = mysqli_query($con,"SELECT * FROM admin_prodi WHERE user_a_prodi='$username' and pass_a_prodi='$pass' and kode_prodi = '$sebagai'");
		$cek = mysqli_num_rows($query);

		if($cek > 0){
			$_SESSION['user_admin_prodi'] = $username;
			$_SESSION['status'] = "login";
			header("location:prodi/admin_prodi_ilkom4431/index.php");
		}else{
			echo "<script language='JavaScript'> 
			alert('Login gagal cek username dan password') 
			document.location = 'index.php'
			</script>";
		}
	}elseif ($sebagai == "P003") {
		$query = mysqli_query($con,"SELECT * FROM admin_prodi WHERE user_a_prodi='$username' and pass_a_prodi='$pass' and kode_prodi = '$sebagai'");
		$cek = mysqli_num_rows($query);

		if($cek > 0){
			$_SESSION['user_admin_prodi'] = $username;
			$_SESSION['status'] = "login";
			header("location:prodi/admin_prodi_pi8123/index.php");
		}else{
			echo "<script language='JavaScript'> 
			alert('Login gagal cek username dan password') 
			document.location = 'index.php'
			</script>";
		}
	}elseif ($sebagai == "P004") {
		$query = mysqli_query($con,"SELECT * FROM admin_prodi WHERE user_a_prodi='$username' and pass_a_prodi='$pass' and kode_prodi = '$sebagai'");
		$cek = mysqli_num_rows($query);

		if($cek > 0){
			$_SESSION['user_admin_prodi'] = $username;
			$_SESSION['status'] = "login";
			header("location:prodi/admin_prodi_ak1324/index.php");
		}else{
			echo "<script language='JavaScript'> 
			alert('Login gagal cek username dan password') 
			document.location = 'index.php'
			</script>";
		}
	}elseif ($sebagai == "P005") {
		$query = mysqli_query($con,"SELECT * FROM admin_prodi WHERE user_a_prodi='$username' and pass_a_prodi='$pass' and kode_prodi = '$sebagai'");
		$cek = mysqli_num_rows($query);

		if($cek > 0){
			$_SESSION['user_admin_prodi'] = $username;
			$_SESSION['status'] = "login";
			header("location:prodi/admin_prodi_sti9946/index.php");
		}else{
			echo "<script language='JavaScript'> 
			alert('Login gagal cek username dan password') 
			document.location = 'index.php'
			</script>";
		}
	}elseif ($sebagai == "P006") {
		$query = mysqli_query($con,"SELECT * FROM admin_prodi WHERE user_a_prodi='$username' and pass_a_prodi='$pass' and kode_prodi = '$sebagai'");
		$cek = mysqli_num_rows($query);

		if($cek > 0){
			$_SESSION['user_admin_prodi'] = $username;
			$_SESSION['status'] = "login";
			header("location:prodi/admin_prodi_tp1190/index.php");
		}else{
			echo "<script language='JavaScript'> 
			alert('Login gagal cek username dan password') 
			document.location = 'index.php'
			</script>";
		}
	}
	else{
			echo "<script language='JavaScript'> 
			alert('Login gagal pilih prodi') 
			document.location = 'index.php'
			</script>";
	}
	
}
?>