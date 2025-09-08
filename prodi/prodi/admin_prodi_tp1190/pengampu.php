<?php 
require_once("../../koneksi.php");
ob_start();
session_start();
if(!isset($_SESSION['user_admin_prodi'])) {
  header('location:../../login_admin_prodi.php'); 
} else { 
  $username = $_SESSION['user_admin_prodi']; 
  $sql = "SELECT * FROM tabel_tahun_akademik ORDER BY id_tahun_akademik DESC LIMIT 1";
    $hasil = $con->query($sql);
    if ($hasil == FALSE){
        trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
    }else{
        while ($h = $hasil->fetch_array()) {                                                       
            $tahun = $h['id_tahun_akademik'];
            $nama_tahun = $h['tahun_akademik'];
            $semester_akademik = $h['semester_akademik'];
        }
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
            <!--navbar-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light " >
              <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-outline-success btn-sm me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Input Pengampu
                        </button>
                    </li>
                </ul>
    </div>
</div>
</nav>
<!--navbar-->
            <div class="caerd">
                <!-- Modal input -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">input pengampu</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>                          
                            <form action="input_pengampu.php" method="post" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <select name="id_mata_kuliah" class="form-control mb-3" >
                                        <option >--Mata Kuliah--</option>
                                        <?php
                                        if ($semester_akademik == "ganjil") {
                                            $sql = "SELECT * FROM mata_kuliah WHERE kode_prodi = 'P006' && semester IN('1','3','5','7')  ";
                                            $hasil = $con->query($sql);
                                            if ($hasil == FALSE){
                                                trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
                                            }else{
                                                while ($h = $hasil->fetch_array()) {?>
                                                    <option style="font-size: 12px;" value="<?php echo $h['id_mata_kuliah']?>"><?php echo $h['nama_mata_kuliah']; ?> .. <?php echo $h['semester']; ?></option>
                                                    <?php
                                                }
                                            }
                                        }else{
                                            $sql = "SELECT * FROM mata_kuliah WHERE kode_prodi = 'P006' && semester IN('2','4','6','8')  ";
                                            $hasil = $con->query($sql);
                                            if ($hasil == FALSE){
                                                trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
                                            }else{
                                                while ($h = $hasil->fetch_array()) {?> 
                                                    <option style="font-size: 12px;" value="<?php echo $h['id_mata_kuliah']?>"><?php echo $h['nama_mata_kuliah']; ?> .. <?php echo $h['semester']; ?></option>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                    <select name="id_kelas" class="form-control mb-3">
                                        <option >--kelas--</option>
                                        <?php
                                        $sql = "SELECT * FROM kelas ";
                                        $hasil = $con->query($sql);
                                        if ($hasil == FALSE){
                                            trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
                                        }else{
                                            while ($h = $hasil->fetch_array()) {?> 
                                            ?>
                                            <option value="<?php echo $h['id_kelas']?>"><?php echo $h['nama_kelas']?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </select>
                                    </select>
                                    <select name="id_dosen" class="form-control mb-3">
                                        <option >--dosen--</option>
                                        <?php
                                        $sql = "SELECT * FROM tabel_dosen ";
                                        $hasil = $con->query($sql);
                                        if ($hasil == FALSE){
                                            trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
                                        }else{
                                            while ($h = $hasil->fetch_array()) {?>
                                            <option value="<?php echo $h['id_dosen']?>"><?php echo $h['nama_dosen']?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </select>
                                    <input type="hidden" name="id_tahun_akademik" value="<?php echo$tahun ?>">
                                    <?php
                                        $sql = "SELECT * FROM prodi WHERE kode ='P006'";
                                        $hasil = $con->query($sql);
                                        if ($hasil == FALSE){
                                            trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
                                        }else{
                                            while ($h = $hasil->fetch_array()) {?>
                                        <input type="hidden" name="id_prodi" value="<?php echo $h['kode']?>">
                                            <?php
                                        }
                                    }
                                    ?>
                                    
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="simpan" class="btn btn-primary" value="tambahkan">input</button>
                            </div>                                  
                            </form>
                        </div>
                    </div>
                </div>
                <!-- tutup Modal input-->
            </div>
            <!--panggil mahasiswa sesuai jurusan-->

            <!--panggil mahasiswa sesuai jurusan-->


            <!--view data-->
            <div class="py-3 px-3">
                <table class="table datatable table-sm" style="font-size:14px;">
                <thead class="text-center" style="background-color: #d3bf0a; font-size: 14px;">                 
                    <th>Nama Mata Kuliah</th>
                    <th>Dosen Pengampu</th>
                    <th>Prodi</th>
                    <th>Kelas</th>
                    <th>Semester</th>
                    <th>Tahun Pelajaran</th>
                    <th>Jumlah SKS</th>
                    <th>Aksi</th>
                </thead>
                <?php
                $sql = "SELECT * FROM pengampu INNER JOIN mata_kuliah ON pengampu.id_mata_kuliah = mata_kuliah.id_mata_kuliah INNER JOIN tabel_dosen ON pengampu.id_dosen = tabel_dosen.id_dosen INNER JOIN kelas ON pengampu.id_kelas = kelas.id_kelas INNER JOIN tabel_tahun_akademik ON pengampu.id_tahun_akademik = tabel_tahun_akademik.id_tahun_akademik INNER JOIN prodi ON pengampu.id_prodi = prodi.kode WHERE pengampu.id_prodi = 'P006' and pengampu.id_tahun_akademik = '$tahun'";
                $hasil = $con->query($sql);
                if ($hasil == FALSE){
                    trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
                }else{
                    while ($h = $hasil->fetch_array()) {?> 
                <tr>                                        
                    <td><?php echo $h['nama_mata_kuliah']?></td>
                    <td><?php echo $h['nama_dosen']?></td>                                  
                    <td><?php echo $h['nama_prodi']?></td>                                  
                    <td><?php echo $h['nama_kelas']?></td>                                  
                    <td><?php echo $h['semester']?></td>                                  
                    <td><?php echo $h['tahun_akademik']?> <?php echo $h['semester_akademik']?></td>                                  
                    <td class="text-center"><?php echo $h['sks']?></td>                                
                    <td class="text-center text-bold">
                        <a href="delet_pengampu.php?hapus=<?php echo $h['id_pengampu']?>" onClick="return confirm('yakin ingin hapus ?');"><button class="btn text-danger" value="hapus"><i class="lni lni-trash-can"></i></button></a>
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
<?php 
}
?>