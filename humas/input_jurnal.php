<?php 
require_once("../koneksi.php");
ob_start();
session_start();
if(!isset($_SESSION['user_humas'])) {
  header('location:index.php'); 
} else { 
  $username = $_SESSION['user_humas']; 
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Universitas Mbojo Bima</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo-1.png" rel="icon">
  <link href="../assets/img/logo-1.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="../assets/img/logo-1.png" alt="">
        <div class="sitename" >
          <h1>UNMBO</h1>
          <p class=" text-sm-start" style="font-size: 11px;">universitas mbojo bima</p>
        </div>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="home.php">Home</a></li>
          <li><a href="../input_berita.php">Input Berita</a></li>
          <li><a href="#" class="active">Input Jurnal</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="logout_humas.php">logout</a>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Jurnal Page</h1>
              <p class="mb-0">Tempat untuk admin unggah jurnal</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Jurnal Page</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Starter Section</h2>
        <p class="">INPUT JURNAL<br></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up">
        <section id="contact" class="contact section">

          <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
              <div class="col-lg">
                <form action="proses_input_jurnal.php" method="post" data-aos="fade-up" data-aos-delay="200" enctype="multipart/form-data">
                  <div class="row gy-4">

                    <div class="col-md-3">
                      <input type="text" name="judul" class="form-control" placeholder="judul jurnal" required="">
                    </div>

                    <div class="col-md-3 ">
                      <input type="text" class="form-control" name="kategori" placeholder="kategori" required="">
                    </div>
                    <div class="col-md-3 ">
                      <input type="text" class="form-control" name="penulis" placeholder="author" required="">
                    </div>
                    <div class="col-md-3 ">
                      <input type="file" class="form-control" name="jurnal" placeholder="jurnal" required="">
                    </div>

                    <div class="col-md-12">
                      <textarea class="form-control" name="abstrak" rows="6" placeholder="abstrak" required=""></textarea>
                    </div>

                    <input type="hidden" name="tgl_upload" value="<?php echo date("Y-m-d"); ?>">

                    <div class="col-md-12 text-center">

                      <button class="btn btn-outline-success" type="submit" value="upload" name="upload">Upload Jurnal</button>
                    </div>

                  </div>
                </form>
              </div><!-- End Contact Form -->

            </div>

          </div>

        </section><!-- /Contact Section -->
      </div>

    </section><!-- /Starter Section Section -->

  </main>

  <footer id="footer" class="footer position-relative">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.php" class="logo d-flex align-items-center">
            <img src="../assets/img/logo-1.png" class="img-fluid" alt="">
            <span class="sitename">UNMBO</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Jl. Pierre Tandean, Kel. Mande, Kec. Mpunda </p>
            <p>Kota Bima, Nusa Tenggara Barat</p>
            <p class="mt-3"><strong>Phone:</strong> <span>(0374) 123456</span></p>
            <p><strong>Email:</strong> <span>info@universitasmbojobima.ac.id</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Pintasan</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Waktu Pelayana</h4>
          <ul>
            <li><a href="#">Senin - Sabtu</a></li>
            <li><a href="#">07.30 - 15.30</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Komentar</h4>
          <p>Tinggalkan Komentar</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Comment"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Komentar sudah terkirim. Terimkasih!</div>
          </form>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">UNMBO</strong> <span>Kota Bima, 2024</span></p>
      <div class="credits">
        Edited by <a href="#">IT UNMBO</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>