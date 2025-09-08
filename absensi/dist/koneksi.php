<?php 

$con = mysqli_connect("localhost","root","","UMB");

if ($con->connect_error) {
	echo "koneksi gagal ada eror".mysqli_error($con);
}

?>