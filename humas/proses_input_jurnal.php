<?php
include '../koneksi.php';
if (isset($_POST['upload'])){
    $judul_jurnal =mysqli_real_escape_string($con, $_POST['judul']);
    $penulis =mysqli_real_escape_string($con, $_POST['penulis']);
    $kategori =mysqli_real_escape_string($con, $_POST['kategori']);
    $abstrak =mysqli_real_escape_string($con, $_POST['abstrak']);
    $folder = './jurnal/';
    $nama_b = $_FILES['jurnal']['name'];
    $rename = date('hs').$nama_b;
    $a = $rename;
    $sumber = $_FILES['jurnal']['tmp_name'];
    move_uploaded_file($sumber, $folder.$a);
    $insert ="INSERT INTO jurnal VALUES(NULL,'".$penulis."','".$judul_jurnal."','".$kategori."','".$a."','".$abstrak."','".$_POST['tgl_upload']."') ";
        if (!$judul_jurnal || !$_POST['abstrak'] || !$_POST['tgl_upload'] ) {
            echo "<script language='JavaScript'> 
            alert('paragraf 1 tidak boleh kosong') 
            document.location = 'input_jurnal.php'
            </script>";
        }
        elseif(mysqli_query($con, $insert)) {
            echo "<script language='JavaScript'> 
            alert('berhasil diunggah') 
            document.location = 'home.php'
            </script>";
        }else{
            echo "Error:".$insert."<br/>".$con->mysqli_error();
        }
    } 
?>