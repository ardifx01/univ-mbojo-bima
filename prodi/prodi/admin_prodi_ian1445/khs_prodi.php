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
            <div class="caerd">
                
            </div>
            <!--panggil mahasiswa sesuai jurusan-->

            <!--panggil mahasiswa sesuai jurusan-->


            <!--view data-->
            <div class="py-2 px-2">
                <div class="card shadow mb-2">
                    <div class="card-header py-2">KHS</div>
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm datatable" style="font-size: 12px;">
                            <thead class="" style="background-color: #d3bf0a;">                 
                                <th>No</th>
                                <th>Nama Mahasiswa</th>
                                <th>NIM</th>
                                <th>Semester</th>
                                <th>Katerangan</th>
                                <th>Aksi</th>
                            </thead>
                            <?php
                            $no=1;
                            $sql = "SELECT * FROM mahasiswa WHERE jurusan = 'P001'";
                            $hasil = $con->query($sql);
                            if ($hasil == FALSE){
                                trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
                            }else{
                                while ($h = $hasil->fetch_array()) {?>
                                    <tr>                                        
                                        <td class="" width="20"><?php echo $no++?></td>
                                        <td><?php echo $h['nama_mahasiswa']?></td>
                                        <td class=""><?php echo $h['nim']?></td>                              
                                        <td class=""><?php echo $h['semester']?></td>                              
                                        <td class=""><?php
                                        if ($h['ket_bayar'] == "Y") {
                                            echo "Aktif";
                                        }else{
                                            echo "Belum Aktif";

                                        }?></td>                                  
                                        <td width="100">
                                            <div class="btn-group">
                                                <a href="kumpulan_nilai.php?kode=<?php echo $h['id_mahasiswa']?>" style="font-size:10px;" class="btn btn-warning btn-sm mr-2">edit nilai</a>
                                            </div>                        
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </table>
                    </div>
                </div>
                </div>
                
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