<?php 
require_once("koneksi.php");
ob_start();
session_start();
if(!isset($_SESSION['username_admin'])) {
  header('location:admin/index.php'); 
} else { 
  $username = $_SESSION['username_admin']; 
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
    <a class="navbar-brand brand-logo me-5" href="index_admin.php"><img src="assets/images/logo_besar.png" class="me-2" alt="logo" /></a>
    <a class="navbar-brand brand-logo-mini" href="index_admin.php"><img src="assets/images/logo.png" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="icon-menu"></span>
    </button>
    <ul class="navbar-nav mr-lg-2">
      <li class="nav-item nav-search d-none d-lg-block">
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-right">
      <li class="nav-item dropdown">
      </li>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
          <img src="assets/images/faces/user.png" alt="profile" />
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <a class="dropdown-item">
            <i class="ti-settings text-primary"></i> Settings </a>
          <a class="dropdown-item" href="logout.php">
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
      <a class="nav-link" href="index_admin.php">
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
          <li class="nav-item"> <a class="nav-link" href="pilih_bulan.php">Rekap Absensi</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card tale-bg">
                  <div class="card-people mt-auto">
                    <img src="assets/images/dashboard/people.svg" alt="people">
                    <div class="weather-info">
                      <div class="d-flex">
                        <div>
                          <h2 class="mb-0 font-weight-normal"><i class="icon-calender me-2"></i>34<sup></sup></h2>
                        </div>
                        <div class="ms-2">
                          <h4 class="location font-weight-normal">Minggu Efektif</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php 
              $data_absensi = mysqli_query($con,"SELECT * FROM absensi_dosen");
              $jumlah_absensi = mysqli_num_rows($data_absensi);
              ?>
              <div class="col-md-6 grid-margin transparent">
                <div class="row">
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                      <div class="card-body">
                        <?php 
                        $data_hadir = mysqli_query($con,"SELECT * FROM absensi_dosen WHERE status = 'hadir'");
                        $jumlah_hadir = mysqli_num_rows($data_hadir);
                         ?>
                        <p class="mb-4">Total Hadir Dosen</p>
                        <p class="fs-30 mb-2"><?php echo $jumlah_hadir; ?></p>
                        <p><?php echo $jumlah_hadir/$jumlah_absensi*100?>%</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                      <div class="card-body">
                        <?php 
                        $data_izin = mysqli_query($con,"SELECT * FROM absensi_dosen WHERE status = 'izin'");
                        $jumlah_izin = mysqli_num_rows($data_izin);
                         ?>
                        <p class="mb-4">Total Ijin Dosen</p>
                        <p class="fs-30 mb-2"><?php echo $jumlah_izin; ?></p>
                        <p><?php echo $jumlah_izin/$jumlah_absensi*100?>%</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                      <div class="card-body">
                        <?php 
                        $data_sakit = mysqli_query($con,"SELECT * FROM absensi_dosen WHERE status = 'sakit'");
                        $jumlah_sakit = mysqli_num_rows($data_sakit);
                         ?>
                        <p class="mb-4">Total Sakit Dosen</p>
                        <p class="fs-30 mb-2"><?php echo $jumlah_sakit; ?></p>
                        <p><?php echo $jumlah_sakit/$jumlah_absensi*100?>%</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                      <div class="card-body">
                        <?php 
                        $data_ket = mysqli_query($con,"SELECT * FROM absensi_dosen WHERE status = '0'");
                        $jumlah_ket = mysqli_num_rows($data_ket);
                         ?>
                        <p class="mb-4">Tanpa Keterangan</p>
                        <p class="fs-30 mb-2"><?php echo $jumlah_sakit; ?></p>
                        <p><?php echo $jumlah_ket/$jumlah_absensi*100?>%</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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