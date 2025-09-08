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
      <!-- partial -->
      <div class="row">
        <!-- partial:partials/_sidebar.html -->
        <!-- partial -->
        <div class="col-lg-12">
          <div class="">
            <div class="">
                <div class="card">
                  
                  <div class="card-body">
                    <h4 class="card-title text text-center">Rekap Absensi Bulan <?php echo $_GET['bulan'] ?></h4>
                    <div class="row">
                      <div class="col-6"><p class="card-description"> Data Absensi Tahun Ajaran <code><?php echo $nama_tahun ?></code></div>
                    </div>
                    </p>
                    <div class="">
                      <table class="table table-striped table-sm">
                        <thead>
                          <tr>
                            <th> No </th>
                            <th> Nama Dosen </th>
                            <th> NIDN </th>
                            <th> Total Hadir </th>
                            <th> Total Izin </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $bulan = $_GET['bulan'];
                          $sql = "SELECT DISTINCT absensi_dosen.id_dosen FROM  absensi_dosen INNER JOIN tabel_dosen ON absensi_dosen.id_dosen = tabel_dosen.id_dosen WHERE absensi_dosen.bulan_absensi = $bulan and absensi_dosen.id_tahun = $tahun ORDER BY absensi_dosen.id_dosen ASC ";
                          $hasil = $con->query($sql);
                          $no=1;
                          if ($hasil == FALSE){
                            trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
                          }else{

                            while ($h = $hasil->fetch_array()) {
                              $id_dosen = $h['id_dosen'];
                              $data_hadir = mysqli_query($con,"SELECT * FROM absensi_dosen WHERE id_dosen = $id_dosen and status = 'hadir'");
                              $jumlah_hadir = mysqli_num_rows($data_hadir);

                              $data_izin = mysqli_query($con,"SELECT * FROM absensi_dosen WHERE id_dosen = $id_dosen and status = 'izin'");
                              $jumlah_izin = mysqli_num_rows($data_izin);

                              $sql2 = "SELECT * FROM  tabel_dosen WHERE id_dosen = $id_dosen ";
                              $hasil2 = $con->query($sql2);
                              
                                while ($h2 = $hasil2->fetch_array()) {
                                 $nama_dosen = $h2['nama_dosen'];
                                 $nidn = $h2['nidn_nidk_nip'];
                                }
                              ?>


                              <tr> 
                                <tr>                                  
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $nama_dosen; ?></td>
                                  <td><?php echo $nidn; ?></td>
                                  <td class="text-center"><?php echo $jumlah_hadir; ?></td>
                                  <td class="text-center"><?php echo $jumlah_izin; ?></td>                                  
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
<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data-absensi.xls"); 
?>