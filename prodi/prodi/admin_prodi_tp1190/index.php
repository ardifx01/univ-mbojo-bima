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
    <title>unmbo-sistem dan teknologi informasi</title>
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
            <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
            </div><!-- End Customers Card -->
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Jumlah <span>| Dosen</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-check-fill"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $data_dosen = mysqli_query($con,"SELECT * FROM tabel_dosen WHERE prodi = 'P005'");
                      $jml_dosen = mysqli_num_rows($data_dosen);                      
                      ?>
                      <h6><?php echo $jml_dosen ?></h6>
                      <span class="text-success small pt-1 fw-bold ps-1">Dosen</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Jumlah <span>| Mahasiswa</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-rolodex"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $data_mahasiswa = mysqli_query($con,"SELECT * FROM mahasiswa WHERE jurusan = 'P005'");
                      $jml_mahasiswa = mysqli_num_rows($data_mahasiswa);
                      
                      ?>
                      <h6><?php echo $jml_mahasiswa ?></h6>
                      <span class="text-success small pt-1 fw-bold ps-1">Mahasiswa</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Tahun Aktif <span>| Akademik</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-calendar2-week"></i>
                    </div>
                    <div class="ps-3">
                      <?php 
                      $sql = "SELECT * FROM tabel_tahun_akademik ORDER BY id_tahun_akademik DESC LIMIT 1";
                      $hasil = $con->query($sql);
                      if ($hasil == FALSE){
                        trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
                      }else{
                        while ($h = $hasil->fetch_array()) {
                          $nama_tahun = $h['tahun_akademik'];
                          $semester_akademik = $h['semester_akademik'];
                        }
                      }

                      ?>
                      <h6><?php echo $nama_tahun; ?></h6>
                      <span class="text-muted small text-success small fw-bold pt-5 ps-3"><?php echo $semester_akademik ?></span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
            <!-- Reports -->
          </div>
          <div class="row">
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
            </div><!-- End Customers Card -->
            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Mata <span>| Kuliah</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-check-fill"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $data_matkul = mysqli_query($con,"SELECT * FROM mata_kuliah WHERE kode_prodi = 'P005'");
                      $jml_matkul = mysqli_num_rows($data_matkul);                      
                      ?>
                      <h6><?php echo $jml_matkul ?></h6>
                      <span class="text-success small pt-1 fw-bold ps-1">Mata Kuliah</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Mahasiswa <span>| Aktif</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-rolodex"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $data_mahasiswa = mysqli_query($con,"SELECT * FROM mahasiswa WHERE jurusan = 'P005' and ket_aktif = 'Y'");
                      $jml_mahasiswa = mysqli_num_rows($data_mahasiswa);
                      
                      ?>
                      <h6><?php echo $jml_mahasiswa ?></h6>
                      <span class="text-success small pt-1 fw-bold ps-1">Mahasiswa</span>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-4">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Mahasiswa <span>| Tidak Aktif</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-rolodex"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $data_mahasiswa = mysqli_query($con,"SELECT * FROM mahasiswa WHERE jurusan = 'P005' and ket_aktif = 'T'");
                      $jml_mahasiswa = mysqli_num_rows($data_mahasiswa);
                      
                      ?>
                      <h6><?php echo $jml_mahasiswa ?></h6>
                      <span class="text-success small pt-1 fw-bold ps-1">Mahasiswa</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
            <!-- Reports -->
          </div>

        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Recent Activity -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tugas Prodi <span>| Setiap Kenaikan Semester</span></h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">langkah 1</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Tambahkan Pengampu Mata Kuliah 
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">langkah 2</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    Aktifkan Mahasiswa
                  </div>
                </div><!-- End activity item-->

              </div>

            </div>
          </div><!-- End Recent Activity -->

      </div>

    </section>
    <footer class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Universitas Mbojo Bima</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      
      Edited By <a href="#">IT UNMBO</a>
    </div>
  </footer><!-- End Footer -->
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
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