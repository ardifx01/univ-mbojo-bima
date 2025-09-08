<?php 
require_once("koneksi.php");
ob_start();
session_start();

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
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
        
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
          
          <a class="dropdown-item preview-item">
            <div class="preview-thumbnail">
              <div class="preview-icon bg-warning">
                <i class="ti-settings mx-0"></i>
              </div>
            </div>
            <div class="preview-item-content">
              <h6 class="preview-subject font-weight-normal">Settings</h6>
              <p class="font-weight-light small-text mb-0 text-muted"> Private message </p>
            </div>
          </a>
        </div>
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
          <li class="nav-item"> <a class="nav-link" href="pilih_bulan.php">Pilih Bulan</a></li>
        </ul>
      </div>
    </li>
  </ul>
</nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text text-center">Rekap Absensi Bulann <?php echo $_GET['bulan'] ?></h4>
                    <div class="row">
                      <div class="col-6"><p class="card-description"> Data Absensi Tahun Ajaran <code><?php echo $nama_tahun ?></code></div>
                      <div class="col-6 text-right">
                        <a href="print_absensi.php?bulan=<?php echo $_GET['bulan'] ?>&dosen=<?php echo $_GET['dosen'] ?>" type="button" class="btn btn-danger btn-rounded btn-fw">print PDF</a>
                        <a href="print_absen_exel.php?bulan=<?php echo $_GET['bulan'] ?>&dosen=<?php echo $_GET['dosen'] ?>" type="button" class="btn btn-success btn-rounded btn-fw">print EXEL</a>
                      </div>
                    </div>
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped table-sm ">
                        <thead>
                          <tr>
                            <th> Nama Dosen </th>
                            <th> Mata Kuliah </th>
                            <th> Kelas </th>
                            <th> Prodi </th>
                            <th> Status </th>
                            <th> Keterangan </th>
                            <th> Tanggal </th>
                            <th> Waktu </th>
                            <th> Foto </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $bulan = $_GET['bulan'];
                          $id_dosen = $_GET['dosen'];
                          $sql = "SELECT * FROM absensi_dosen INNER JOIN tabel_dosen ON absensi_dosen.id_dosen = tabel_dosen.id_dosen WHERE absensi_dosen.id_dosen = $id_dosen and absensi_dosen.bulan_absensi = $bulan and absensi_dosen.id_tahun = $tahun ORDER BY absensi_dosen.id_absensi DESC ";
                          $hasil = $con->query($sql);
                          $no=1;
                          if ($hasil == FALSE){
                            trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
                          }else{

                            while ($h = $hasil->fetch_array()) {?> 
                              <tr> 
                                <tr>                                  
                                  <td><?php echo $h['nama_dosen']; ?></td>
                                  <td><?php echo $h['mata_kuliah']; ?></td>
                                  <td><?php echo $h['kelas']; ?></td>
                                  <td><?php echo $h['prodi_absensi']; ?></td>
                                  <td><?php echo $h['status']; ?></td>
                                  <td><?php echo $h['keterangan_absensi']; ?></td>
                                  <td><?php echo $h['tgl_absensi']; ?></td>
                                  <td><?php echo $h['waktu_absensi']; ?></td>                           
                                  <td class="py-1">
                                    <img style="height: 60px; width: 60px;" src="upload/<?php echo $h['foto'] ?>" />
                                  </td>
                                </tr>
                                <?php 
                              }
                            }
                            ?>
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025. UNMBO <a href="#" target="_blank">Bootstrap absen template</a> from Universitas Mbojo Bima. All rights reserved.</span>
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