<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Universitas Mbojo Bima</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo-1.png" rel="icon">
  <link href="assets/img/logo-1.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.php" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo-1.png" alt="">
        <div class="sitename" >
          <h1>UNMBO</h1>
          <p class=" text-sm-start" style="font-size: 11px;">universitas mbojo bima</p>
        </div>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" >Home</a></li>
          <li><a href="tentang_kami.php">Tentang Kami</a></li>
          <li><a href="civitas.php">Civitas</a></li>
          <li><a href="kemahasiswaan.php">Kemhasiswaan</a></li>
          <li><a href="prodi.php">Program Studi</a></li>
          <li><a href="kontak.php">Kontak</a></li>
          <li><a href="jurnal.php" class="active">Jurnal</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="courses.html">SIAKAD</a>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>Jurnal</h1>
              <p class="mb-0">Semua Karya ilmiah dosen dan mahasiswa kami kumpulkan agar bisa dimanfaatkan oleh masyarakat luas.</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Jurnal</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <!-- Courses Section -->
    <section id="courses" class="courses section">

      <div class="container">

        <div class="row">
          <?php 
          include 'koneksi.php';
          $sql = "SELECT * FROM jurnal";
          $hasil = $con->query($sql);
          if ($hasil == FALSE){
            trigger_error("Syntax mysql salah : ".$sql."Error: ".$con->error, E_USER_ERROR);
          }else{
            while ($h = $hasil->fetch_array()) {
           ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="course-item">
              <img src="humas/jurnal/icon jurnal.png" class="img-fluid" alt="..." style="width: 360px; height: 240px;">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="category"><?php echo $h['kategori']; ?></p>
                  <p class="price"><?php echo $h['tanggal_jurnal']; ?></p>
                </div>
                <h3><a href="view_berita.php?kode=<?php echo $h['id_jurnal']; ?>"><?php echo substr($h['judul_jurnal'], 0, 80)?></a></h3>
                <p class="description"><?php echo substr($h['abstrak'], 0, 80)?></p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/logo-1.png" class="img-fluid" alt="">
                    <a href="" class="trainer-link"><?php echo $h['nama_penulis'] ?></a>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bi bi-person user-icon"></i>&nbsp;35
                    &nbsp;&nbsp;
                    <i class="bi bi-heart heart-icon"></i>&nbsp;42
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->
        <?php }
        } ?>
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="course-item">
              <img src="assets/img/course-2.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="category">Marketing</p>
                  <p class="price">$250</p>
                </div>

                <h3><a href="course-details.html">Search Engine Optimization</a></h3>
                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-2-2.jpg" class="img-fluid" alt="">
                    <a href="" class="trainer-link">Lana</a>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bi bi-person user-icon"></i>&nbsp;35
                    &nbsp;&nbsp;
                    <i class="bi bi-heart heart-icon"></i>&nbsp;42
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="course-item">
              <img src="assets/img/course-3.jpg" class="img-fluid" alt="...">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <p class="category">Content</p>
                  <p class="price">$180</p>
                </div>

                <h3><a href="course-details.html">Copywriting</a></h3>
                <p class="description">Et architecto provident deleniti facere repellat nobis iste. Id facere quia quae dolores dolorem tempore.</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-3-2.jpg" class="img-fluid" alt="">
                    <a href="" class="trainer-link">Brandon</a>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bi bi-person user-icon"></i>&nbsp;20
                    &nbsp;&nbsp;
                    <i class="bi bi-heart heart-icon"></i>&nbsp;85
                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->
          <div class="item">
                  <div class="row">
                    <div class="col-lg-4 col-sm-5">
                      <div class="image">
                        <img src="assets/images/sampul.png" alt="">
                      </div>
                    </div>
                    <div class="col-lg-8 col-sm-7">
                      <div class="right-content">
                        <h4>SIMULASI</h4>
                        <span>Kota Bima</span>
                        <div class="main-button">
                          <a href="https://forms.gle/PwyfJfRpdDmUKBkc9">Kerjakan Simulasi</a>
                        </div>
                        <p>Asesmen Madrasah (AM) meliputi seluruh mata pelajaran yang diajarkan pada kelas akhir pada satuan pendidikan, baik kelompok mata pelajaran wajib maupun muatan lokal.</p>
                        <ul class="info">
                          <li><i class="fa fa-user"></i> MTs Putri Baitul Ilmi</li>
                          <li><i class="fa-solid fa-calendar-days"></i> 21 April 2024</li>
                          <li><i class="fa-regular fa-clock"></i> 90 Menit  </li>
                        </ul>
                        <div class="text-button">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

        </div>

      </div>

    </section><!-- /Courses Section -->

  </main>

  <footer id="footer" class="footer position-relative">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.php" class="logo d-flex align-items-center">
            <img src="assets/img/logo-1.png" class="img-fluid" alt="">
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
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>