<?php 
require_once("koneksi.php");
ob_start();
session_start();
if(!isset($_SESSION['user_dosen'])) {
  header('location:login.php'); 
} else { 
  $username = $_SESSION['user_dosen']; 
}
$sql = "SELECT * FROM tabel_dosen INNER JOIN prodi ON tabel_dosen.prodi = prodi.kode WHERE tabel_dosen.nidn_nidk_nip = $username ";
$hasil = $con->query($sql);
if ($hasil == FALSE){
  trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
}else{
  while ($h = $hasil->fetch_array()) {
    $nama_dosen = $h['nama_dosen'];
    $id_dosen = $h['id_dosen'];
    $password = $h['pass_dosen'];
    $nama_prodi = $h['nama_prodi'];
    $nidn = $h['nidn_nidk_nip'];
    $jafung = $h['jafung'];
    $inpasing = $h['inpasing'];
    $bidang_ilmu = $h['bidang_ilmu'];
    $no_hp = $h['no_hp'];

  }
}
$sql1 = "SELECT * FROM tabel_tahun_akademik ORDER BY id_tahun_akademik DESC LIMIT 1";
$hasil1 = $con->query($sql1);
if ($hasil1 == FALSE){
  trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
}else{
  while ($h1 = $hasil1->fetch_array()) {                                                       
    $tahun = $h1['id_tahun_akademik'];
    $nama_tahun = $h1['tahun_akademik'];
    $semester_akademik = $h1['semester_akademik'];
  }
}
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Absensi Dosen Unmbo</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="assets/images/logo.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
    <a class="navbar-brand brand-logo me-5" href="index.php"><img src="assets/images/logo_besar.png" class="me-2" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini" href="index.php"><img src="assets/images/logo.png" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
          <img src="assets/images/faces/user.png" alt="profile" />
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item">
            <i class="ti-settings text-primary"></i> Settings </a>
          <a class="dropdown-item" href="logout_admin.php">
            <i class="ti-power-off text-primary"></i> Logout </a>
        </div>
      </li>
      <li class="nav-item nav-settings d-none d-lg-flex">
        <a class="nav-link" href="#">
          <i class="icon-ellipsis"></i>
        </a>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="index.php">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Absensi</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="absensi.php">Absensi</a></li>
          <li class="nav-item"> <a class="nav-link" href="pilih_bulan_dosen.php">Rekap Absensi</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="row">
                  <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Welcome <?php echo $nama_dosen; ?></h3>
                  </div>
                  <div class="col-12 col-xl-4">
                    <div class="justify-content-end d-flex">
                      <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                        <button class="btn btn-sm btn-light bg-white" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          <i class="mdi mdi-calendar"></i> <?php echo date('l, d-m-Y'); ?> </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <a href="absensi.php" type="button" class="btn btn-danger btn-rounded btn-fw text-light fw-bold">ABSENSI</a>
            <div class="table-responsive pt-1">
              <table class="table table-bordered text text-center">
                <thead>          
                  <th>Nama Mata Kuliah</th>
                  <th>Prodi</th>
                  <th>Kelas</th>
                  <th>Jumlah SKS</th>
                </thead>
                <?php
                $sql = "SELECT * FROM pengampu INNER JOIN mata_kuliah ON pengampu.id_mata_kuliah = mata_kuliah.id_mata_kuliah INNER JOIN tabel_dosen ON pengampu.id_dosen = tabel_dosen.id_dosen INNER JOIN kelas ON pengampu.id_kelas = kelas.id_kelas INNER JOIN tabel_tahun_akademik ON pengampu.id_tahun_akademik = tabel_tahun_akademik.id_tahun_akademik INNER JOIN prodi ON pengampu.id_prodi = prodi.kode WHERE pengampu.id_dosen = $id_dosen and tabel_tahun_akademik.id_tahun_akademik = $tahun";
                $hasil = $con->query($sql);
                if ($hasil == FALSE){
                  trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
                }else{
                  while ($h = $hasil->fetch_array()) {?> 
                    <tbody>
                      <tr>                                        
                        <td><?php echo $h['nama_mata_kuliah']?></td>                           
                        <td><?php echo $h['nama_prodi']?></td>                                  
                        <td><?php echo $h['nama_kelas']?></td>
                        <td class="text-center"><?php echo $h['sks']?></td>


                      </tr>
                    </tbody>
                    <?php
                  }
                }
                ?>
              </table>
            </div>
            
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025. UNMBO <a href="#" target="_blank">Sistem dan Teknologi Informasi</a> from Universitas Mbojo Bima. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">IT UNMBO<i class="ti-heart text-danger ms-1"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
    <!-- <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
    <script src="assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js"></script>
    <script src="assets/js/dataTables.select.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/template.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets/js/dashboard.js"></script>
    <!-- <script src="assets/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
  </body>
</html>