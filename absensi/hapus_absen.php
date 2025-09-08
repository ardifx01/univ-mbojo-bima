<?php 
include 'koneksi.php';
if (isset($_GET['hapus'])){
  $bulan = $_GET['bulan'];
  $sql = "DELETE FROM absensi_dosen WHERE id_absensi='$_GET[hapus]'";

if (mysqli_query($con, $sql)) {
  echo "<script language='JavaScript'> 
    alert('berhasil dihapus') 
    document.location = 'rekap_absen_dosen.php?bulan=$bulan'
    </script>";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
} 
?>