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
        <div class="main p-3">
            <div class="caerd">
            </div>
            <div data-bs-spy="scroll" data-bs-root-margin="0px 0px 40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-body-tertiary p-3 rounded-2" tabindex="0" >
                <table class="table datatable" style="font-size:11px;">
                <thead class="text-center" >                 
                    <th>Kode</th>
                    <th>Nama Mata Kuliah</th>
                    <th>Jumlah SKS</th>
                    <th>Semester</th>
                </thead>
                <?php
                $sql = "SELECT * FROM mata_kuliah WHERE kode_prodi = 'P001'";
                $hasil = $con->query($sql);
                if ($hasil == FALSE){
                    trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
                }else{
                    while ($h = $hasil->fetch_array()) {?> 
                <tr>                         
                    <td><?php echo $h['kode_mata_kuliah']?></td>
                    <td><?php echo $h['nama_mata_kuliah']?></td>
                    <td><?php echo $h['sks']?></td>                 
                    <td><?php echo $h['semester']?></td>                                     
                </tr>
                <!-- Modal update-->
                <div class="modal fade" id="exampleModalupdate<?php echo $h['id_mata_kuliah'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>                          
                            <form action="update_matkul.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id_mata_kuliah" value="<?php echo $h['id_mata_kuliah'] ?>">
                                <div class="modal-body">
                                    <input class="form-control mb-3" name="kode_mata_kuliah" type="text" aria-label="default input example" value="<?php echo $h['kode_mata_kuliah']?>">
                                    <input class="form-control mb-3" name="nama_mata_kuliah" type="text" aria-label="default input example" value="<?php echo $h['nama_mata_kuliah']?>">
                                    <input class="form-control mb-3" name="sks" type="text" aria-label="default input example" value="<?php echo $h['sks']?>">
                                    <select name="semester" class="form-control mb-3">
                                        <option value="<?php echo $h['semester']?>"><?php echo $h['semester']?></option>
                                        <option value="1">I</option><option value="2">II</option>
                                        <option value="3">III</option><option value="4">IV</option>
                                        <option value="5">V</option><option value="5">VI</option>
                                        <option value="7">VII</option><option value="8">VIII</option>
                                    </select>
                                    <select name="kode_prodi" class="form-control">
                                        <option value="<?php echo $h['kode_prodi']?>"><?php echo $h['kode_prodi']?></option>
                                        <?php
                                        $sql1 = "SELECT * FROM prodi ";
                                        $hasil1 = $con->query($sql1);
                                        if ($hasil1 == FALSE){
                                            trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
                                        }else{
                                            while ($h1 = $hasil1->fetch_array()) {?> 
                                            ?>
                                            <option value="<?php echo $h1['kode']?>"><?php echo $h1['nama_prodi']?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update" class="btn btn-primary" value="tambahkan">update</button>
                            </div>                                  
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <?php
                        }
                      }
                      ?>
            </table>
                
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