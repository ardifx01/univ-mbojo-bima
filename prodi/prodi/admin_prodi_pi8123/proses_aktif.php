<?php 
include("../../koneksi.php"); 
if (isset($_POST['aktif'])){
  $sql = "UPDATE mahasiswa set
  ket_aktif = '$_POST[keterangan]' WHERE id_mahasiswa='$_POST[id_mahasiswa]'";
  if (mysqli_query($con, $sql)) {
    echo "<script language='JavaScript'> 
    alert('Mahasiswa berhasil di aktifkan') 
    document.location = 'aktivasi_mahasiswa.php'
    </script>";
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
} 
?>