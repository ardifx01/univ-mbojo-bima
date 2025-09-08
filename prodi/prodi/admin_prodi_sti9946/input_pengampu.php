<?php
include '../../koneksi.php';
if (isset($_POST['simpan'])){
  $id_prodi = $_POST['id_prodi'];
  $insert ="INSERT INTO pengampu VALUES(NULL,'".$_POST['id_mata_kuliah']."','".$_POST['id_prodi']."','".$_POST['id_kelas']."','".$_POST['id_tahun_akademik']."','".$_POST['id_dosen']."')";
  
  if(!$_POST['id_kelas']) {
    echo "<script language='JavaScript'> 
    alert('Data Tidak boleh kosong') 
    document.location = 'pengampu_matkul.php?kode=$id_prodi'
    </script>";
  }elseif(mysqli_query($con, $insert)) {
    echo "<script language='JavaScript'> 
    alert('input data success') 
    document.location = 'pengampu.php'
    </script>";
  }else{
    echo "Error:".$insert."<br/>".$con->mysqli_error();
  }
} 
?>