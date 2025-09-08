<?php 
$con = mysqli_connect("localhost","u142094358_siunmbo","@Kurniawan98","u142094358_siunmbo");

if ($con->connect_error) {
	echo "koneksi gagal ada eror".mysqli_error($con);
}

?>