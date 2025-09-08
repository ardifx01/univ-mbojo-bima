<?php
include("koneksi.php");
if (isset($_POST['simpan'])) {
    $nama_dosen = $_POST['nama_dosen'];
    $id_dosen = $_POST['id_dosen'];
    $tgl_absensi = $_POST['tgl_absensi'];
    $waktu_absensi = $_POST['waktu_absensi'];
    $bulan_absensi = $_POST['bulan_absensi'];
    $tahun = $_POST['id_tahun'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $kelas = $_POST['kelas'];
    $prodi = $_POST['prodi'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];
    $img = $_POST['image'];
    $folderPath = "upload/";  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = $id_dosen . uniqid() .'.png';
  
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
  
    print_r($fileName);

    $insert ="INSERT INTO absensi_dosen VALUES(NULL,'".$id_dosen."','".$tahun."','".$tgl_absensi."','".$waktu_absensi."','".$bulan_absensi."','".$mata_kuliah."','".$kelas."','".$prodi."','".$status."','".$keterangan."','".$fileName."')";

      if (!$id_dosen|| !$tgl_absensi||!$waktu_absensi||!$mata_kuliah||!$kelas||!$prodi||!$status||!$fileName ) {
        echo "<script language='JavaScript'> 
        alert('silahkan isi semua data') 
        document.location = 'absensi.php'
        </script>";
    }
    elseif(mysqli_query($con, $insert)) {
        echo "<script language='JavaScript'> 
        alert('input data absensi sukses') 
        document.location = 'index.php'
        </script>";
    }else{
        echo "Error:".$insert."<br/>".$con->mysqli_error();
    }
}
    
  
?>