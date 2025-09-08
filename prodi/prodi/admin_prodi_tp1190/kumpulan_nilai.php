<?php 
require_once("../../koneksi.php");
ob_start();
session_start();
if(!isset($_SESSION['user_admin_prodi'])) {
  header('location:../../login_admin_prodi.php'); 
} else { 
  $username = $_SESSION['user_admin_prodi']; 
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNMBO</title>
    <link href="logo.png" rel="icon">
    <link href="logo.png" rel="apple-touch-icon">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <!--sidebar-->
        <?php include'navbar2.php'; ?>
        <!--tutup sidebar-->
        <div class="main">
            <div class="card-body py-3">
                        <div class="table-responsive">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6">
                                        <?php 
                                        $sql = "SELECT * FROM mahasiswa WHERE id_mahasiswa = '$_GET[kode]'";
                                        $hasil = $con->query($sql);
                                        while ($h = $hasil->fetch_array()) { 
                                            $nama_mata_kuliah = $h['nama_mahasiswa'];
                                            $nama_kelas = $h['kelas'];
                                        }
                                        ?>
                                        <p><?php echo $nama_mata_kuliah ?></p>
                                    </div>
                                </div>
                            </div>
                        <table class="table table-bordered table-sm border-light" style="font-size:12px;">
                            <thead class="text-center">   
                                <th>No</th>
                                <th>Nama Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Kehadiran</th>
                                <th>Nilai Tugas</th>
                                <th>Nilai UTS</th>
                                <th>Nilai Uas</th>
                                <th>Tatol Nilai</th>
                                <th>sksn</th>
                                <th>Grade</th>
                                <th>Aksi</th>
                            </thead>
                            <?php
                            
                                $no=0;
                                $sql = "SELECT * FROM krs INNER JOIN  mata_kuliah ON krs.id_mata_kuliah = mata_kuliah.id_mata_kuliah INNER JOIN mahasiswa ON krs.id_mahasiswa = mahasiswa.id_mahasiswa  WHERE krs.id_mahasiswa = '$_GET[kode]'";
                                $hasil = $con->query($sql);
                                if ($hasil == FALSE){
                                    trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
                                }else{
                                    while ($h = $hasil->fetch_array()) {
                                        $no++;
                                        $nama_mata_kuliah = $h['nama_mata_kuliah'];
                                        $sks = $h['sks'];
                                        $nama_mahasiswa = $h['nama_mahasiswa'];
                                        $id_mahasiswa = $h['id_mahasiswa'];
                                        $nim = $h['nim'];
                                        $semester = $h['semester'];
                                        $nilai_kehadiran = $h['nilai_kehadiran'];
                                        $nilai_tugas = $h['nilai_tugas'];
                                        $nilai_uts = $h['nilai_uts'];
                                        $nilai_uas = $h['nilai_uas'];
                                        $semester = $h['semester'];
                                        $id_krs = $h['id_krs'];?>
                                        <form action="input_nilai.php" method="post">
                                            <input type="hidden" name="id_krs" value="<?php echo $id_krs ?>">
                                            <input type="hidden" name="id_matkul" value="<?php echo $id_mata_kuliah ?>">
                                            <input type="hidden" name="id_mahasiswa" value="<?php echo $id_mahasiswa ?>">
                                            <input type="hidden" name="id_pengampu" value="<?php echo $id_pengampu ?>">
                                            <input type="hidden" name="kelas" value="<?php echo $nama_kelas ?>">
                                            <input type="hidden" name="sks" value="<?php echo $sks ?>">
                                            <tr>
                                                <td class="text-center"><?php echo $no ?></td>
                                                <td><?php echo $nama_mata_kuliah ?></td>
                                                <td class="text-center"><?php echo $sks ?></td>
                                                <td width="100" class="text-center"><input class="form-control form-control-sm" type="number" name="nilai_kehadiran" value="<?php echo $h['nilai_kehadiran'] ?>"></td>
                                                <td width="100" class="text-center"><input class="form-control form-control-sm" type="number" name="nilai_tugas" value="<?php echo $h['nilai_tugas'] ?>"></td>
                                                <td width="100" class="text-center"><input class="form-control form-control-sm" type="number" name="nilai_uts" value="<?php echo $h['nilai_uts'] ?>"></td>
                                                <td width="100" class="text-center"><input class="form-control form-control-sm" type="number" name="nilai_uas" value="<?php echo $h['nilai_uas'] ?>"></td>
                                                <td class="text-center"><?php echo $h['nilai_total'] ?></td>
                                                <td class="text-center"><?php echo $h['nilai_ipk'] ?></td>
                                                <td class="text-center"><?php echo $h['nilai_grade'] ?></td>
                                                <td class="text-center text-bold">
                                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                        <button style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" class="btn btn-success btn-sm" name="simpan" type="submit" value="simpan">input</button>
                                                    </div>

                                                </td>
                                            </tr> 
                                        </form>


                                        <?php
                                    }?>     


                                    <?php
                                }


                                ?>

                                </table><?php 
                            
                            ?>


                        </div>
                    </div>
                    
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <!-- Vendor JS Files -->
    <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/chart.js/chart.umd.js"></script>
    <script src="../assets/vendor/echarts/echarts.min.js"></script>
    <script src="../assets/vendor/quill/quill.js"></script>
    <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
</body>

</html>