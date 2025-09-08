<?php
require_once("../../koneksi.php");

if (isset($_POST['simpan'])){
        $id_krs = $_POST['id_krs'];
        $id_mahasiswa = $_POST['id_mahasiswa'];
        $kelas = $_POST['kelas'];
        $sks = $_POST['sks'];
        $nilai_absen = $_POST['nilai_kehadiran'];
        $nilai_tugas = $_POST['nilai_tugas'];
        $nilai_uts = $_POST['nilai_uts'];
        $nilai_uas = $_POST['nilai_uas'];
        $p_kehadiran = $nilai_absen/100*40;
        $p_tugas = $nilai_tugas/100*10;
        $p_uts = $nilai_uts/100*20;
        $p_uas = $nilai_uas/100*30;
        $total_nilai = $p_kehadiran+$p_tugas+$p_uts+$p_uas;
        $kontribusi = 0;
        if ($total_nilai > 95) {
            $grade = "A";
            $sksn = 4 ;
        } elseif($total_nilai > 91){
            $grade = "A-";
            $sksn = 3.75 ;
        } elseif($total_nilai > 85){
            $grade = "B+";
            $sksn = 3.50 ;
        } elseif($total_nilai > 80){
            $grade = "B";
            $sksn = 3 ;
        } elseif($total_nilai > 75){
            $grade = "B-";
            $sksn = 2.75 ;
        } elseif($total_nilai > 70){
            $grade = "C+";
            $sksn = 2.5 ;
        } elseif($total_nilai > 65){
            $grade = "C";
            $sksn = 2 ;
        } elseif($total_nilai > 60){
            $grade = "C-";
            $sksn = 1.75 ;
        } elseif($total_nilai > 55){
            $grade = "D+";
            $sksn = 1.5 ;
        }elseif($total_nilai > 50){
            $grade = "D";
            $sksn = 1 ;
        }elseif($total_nilai > 45){
            $grade = "D-";
            $sksn = 0.75 ;
        }elseif($total_nilai > 40){
            $grade = "E+";
            $sksn = 0 ;
        }else {
            $grade = "E";
            $sksn = 0 ;
        }
        $kontribusi = $sksn * $sks;

        $insert ="UPDATE krs set nilai_kehadiran = '$nilai_absen',
        nilai_tugas = '$nilai_tugas',
        nilai_uts = '$nilai_uts',
        nilai_uas = '$nilai_uas',
        nilai_total = '$total_nilai',
        nilai_grade = '$grade',
        sksn = '$sksn',
        nilai_ipk = '$kontribusi' WHERE id_krs = '$id_krs'";

        if($nilai_uas > 100){
           echo "<script language='JavaScript'> 
           alert('nilai uas tidak boleh lebih dari seratus') 
           history.back()
           </script>";
       }elseif($nilai_tugas > 100){
           echo "<script language='JavaScript'> 
           alert('nilai tugas tidak boleh lebih dari seratus') 
           history.back()
           </script>";
       }elseif($nilai_uts > 100){
           echo "<script language='JavaScript'> 
           alert('nilai uts tidak boleh lebih dari seratus') 
           history.back()
           </script>";
       }elseif($total_nilai > 100){
           echo "<script language='JavaScript'> 
           alert('nilai tidak boleh lebih dari seratus') 
           history.back()
           </script>";
       }elseif(mysqli_query($con, $insert)) {
        echo "<script language='JavaScript'> 
        alert('input data success') 
        document.location = 'kumpulan_nilai.php?kode=$id_mahasiswa'
        </script>";
    }else{
        echo "Error:".$insert."<br/>".$con->mysqli_error();
    }
}
?>