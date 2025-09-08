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
    <title>UMB</title>
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
            <div class="caerd">
                
            </div>
            <!--view data-->
            <div class="py-3 px-3">
                <table class="table datatable table-sm" style="font-size:12px;">
                <thead class="text-center" style="background-color: #d3bf0a; font-size: 14px;">
                    <th>Nama Mahasiswa</th>
                    <th>NIM</th>
                    <th>Semester</th>
                    <th>Kelas</th>
                    <th>Administrasi</th>
                    <th>Aktif Prodi</th>
                    <th>Aksi</th>
                </thead>
                <?php
                $sql = "SELECT * FROM mahasiswa WHERE jurusan='P005' ORDER BY id_mahasiswa ASC";
                $hasil = $con->query($sql);
                if ($hasil == FALSE){
                    trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
                }else{
                    while ($h = $hasil->fetch_array()) {?>
                <tr>                                        
                    <td><?php echo $h['nama_mahasiswa']?></td>
                    <td class="text-center"><?php echo $h['nim']?></td>
                    <td class="text-center" width="40"><?php echo $h['semester']?></td>
                    <td class="text-center" width="40"><?php echo $h['kelas']?></td>
                    <td class="text-center">
                        <?php
                        if ($h['ket_bayar'] == "Y") {
                            echo "Lunas";
                        }else{
                            echo "Belum Lunas";
                         
                        }?>
                    </td>                                  
                    <td class="text-center"><?php
                        if ($h['ket_aktif'] == "Y") {
                            echo "Aktif";
                        }else{
                            echo "Belum Aktif";
                         
                        }?></td>                                  
                    <td width="40">
                        <form action="proses_aktif.php" method="post" class="text-center">
                            <input type="hidden" name="id_mahasiswa" value="<?php echo $h['id_mahasiswa']?>">
                            <input type="hidden" class="form-control mb-3" name="keterangan" value="Y" aria-label="default input example">
                            <button type="submit" name="aktif" class="btn btn-warning btn-sm" type="checkbox" role="switch" id="flexSwitchCheckDefault" value="tambahkan" onClick="return confirm('Aktifkan Mahasiswa ?');">aktifkan</button>                                
                    </form>
                    </td>
                </tr>
                <?php
                        }
                      }
                      ?>
            </table>
            </div>
            
            <!--tutp view data-->
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