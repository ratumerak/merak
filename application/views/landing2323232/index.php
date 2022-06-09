<!DOCTYPE html>
<html lang="en">

<?php 
  
  if ($kode_member == null) {
    $kode_member = 0;

  }else{

    $kode_member = $kode_member;
  }

 ?>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PT.Sinar Aneka Niaga</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets_landing/') ?>vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('assets_landing/') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets_landing/') ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('assets_landing/') ?>/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?= base_url('assets_landing/') ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url('assets_landing/') ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets_landing/') ?>/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars - v4.7.0
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
       <!--  <h1 class="text-light"><a href="index.html"><span>Sinar Aneka Niaga</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="#"><img src="<?= base_url('assets_landing/') ?>/img/pt.png" alt="" class="img-fluid"></a>
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About Us</a></li>
          <li><a class="nav-link scrollto" href="#services">Advantage</a></li>
          <li><a class="nav-link scrollto" href="#portfolio"> Videos</a></li>
          
          
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="<?= base_url('') ?>login">Login member</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>About this business</h1>
          <h2>Bisnis Beras Modern ini merupakan sistem baru dan bisnis beras satu-satunya yang sudah menggunakan teknologi Modern ini</h2>
          
          <div>
            <a href="<?= base_url('login/') ?>register/<?= $kode_member ?>" class="btn-get-started scrollto">Register member</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="<?= base_url('assets_landing/') ?>/img/beras2.png" class="img-fluid animated" alt="" style="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="<?= base_url('assets_landing/') ?>/img/depan.jpg" class="img-fluid" alt="" data-aos="zoom-in">
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0">
            <h3 data-aos="fade-up">About PT.Sinar Aneka Niaga</h3>
            <p data-aos="fade-up" data-aos-delay="100">
              PT. SINAR ANEKA NIAGA berdiri pada tahun 2005 hingga sampai saat ini, beralamat di Jl.Setia Ujung / Bintang Terang No. 38 Km 13,8, Puji Mulyo, Binjai, Kabupaten Deli Serdang, Sumatera Utara 20351.

   Berdiri diatas lahan seluas 3 hektar dengan jumlah karyawan mencapai 120 orang dan menggunakan mesin pengolahan berteknologi modern dari jepang, sehingga menghasilkan butiran beras yang berkualitas tinggi. Jalur distribusi kami sampai saat ini sudah mencakup seluruh wilayah pulau sumatera.
            </p>
            <div class="row">
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <i class="bx bx-receipt"></i>
                <h4>Sistem Traditional</h4>
                <p>Dari Pabrik Ke Toko</p>
              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <i class="bx bx-cube-alt"></i>
                <h4>Sistem Modern Bisnis</h4>
                <p>Dari Pabrik Langsung Ke Konsumen</p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Advantage</h2>
          <p>
The advantages of joining the PT. Sinar Aneka Niaga business platform</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Bonus Member</a></h4>
              <p class="description">Setiap member mendapatkan bonus member</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Undian Transaksi</a></h4>
              <p class="description">Setiap bulan akan dilakukan undian transaksi</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Withdraw</a></h4>
              <p class="description">Setiap member dapat menarik bonus</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Terpercaya</a></h4>
              <p class="description">Perusahaan kami merupakan perusahaan beras terbesar dengan penjualan puluhan ribu ton</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Modern Business Educational Videos</h2>
          <p>Please see </p>
        </div>

       <center>
        <iframe width="800" height="400" src="https://www.youtube.com/embed/ZKoKKoxqXb0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </center>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>F.A.Q</h2>
          <p>What you want to ask ??</p>
        </div>

        <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">

          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Apakah Bisnis Ini Aman? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                Bisnis ini di jamin aman, karena bisnis perusahaan ini merupakan perusahaan beras terbesar di sumatera utara
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Apakah Bisnis Ini menguntungkan? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
               Bisnis Ini pasti menguntungkan untuk semua member, karena banyak bonus dan undian yang di lakukan oleh perusahaan ini
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Apakah Syarat bergabung menjadi member? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
               Untuk menjadi member yang utama itu ya kemauan untuk sukses
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Ketika mendapatkan bonus, apakah syarat mengambil bonus saya? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
              <p>
               Syaratnya cukup gampang yaitu anda harus member dan anda harus tetap memili stock beras maka bonus anda akan bisa anda tarik semua.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">Apa perbedaan bisnis ini dengan bisnis traditional? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>
            Bisnis traditional anda harus menyediakan modal yang besar untuk toko, pegawai, dan akomodasi pengantaran sedangkan bisnis modern ini anda tidak perlu menyiapkan itu semua.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">Apakah semua stock beras bisa di ambil? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq6" class="collapse" data-bs-parent=".faq-list">
              <p>
               Tentu bisa
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- End F.A.Q Section -->

  
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact Us</h2>
          <p>Contact us the get started</p>
        </div>

        <div class="row">

          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Jl. Setia Ujung /Bintang Terang No.38 Km.13,8 Puji Mulyo Binjai, kabupaten Deli Sedang Sumatera Utara 20351</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>berasgenthong19@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+628116566883</p>
              </div>

            
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.8732688804675!2d98.5617492139955!3d3.6164421511125355!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312950d460a669%3A0x8104251fc5fadbc0!2sJl.%20Bintang%20Terang%20Ujung%20No.38%2C%20Mulyorejo%2C%20Kec.%20Sunggal%2C%20Kabupaten%20Deli%20Serdang%2C%20Sumatera%20Utara%2020351!5e0!3m2!1sid!2sid!4v1638620112855!5m2!1sid!2sid" style="border:0; width: 100%; height: 290px;" allowfullscreen="" loading="lazy"></iframe>
            </div>

          </div>

          <div class="col-lg-7">

            <form action="" method="post" class="">
              <form method="post" action="">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name" class="mb-2"><b>Your Name</b></label>
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name" class="mb-2"><b>Your Email</b></label>
                  <input type="email" class="form-control" name="email"  placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <label for="name" class="mb-2"><b>Subject</b></label>
                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <label for="name" class="mb-2"><b>Message</b></label>
                <textarea class="form-control" name="pesan" rows="10" required></textarea>
              </div>
              
              <div class="text-center mt-3"><input type="submit" name="kirim" class="btn btn-danger" value="Send Message"></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <!-- <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div> -->

    <div class="footer-top">
      <div class="container">
        <div class="row">

         

         
          <div class="col-lg-12 col-md-6 footer-links">
            <center>
            <h4>Our Social Networks</h4>
            <p>You can see our social media</p>
            <div class="social-links mt-3">
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="https://www.instagram.com/ratumerak.id/" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="https://www.tiktok.com/@beras.genthong" class="tiktok"><i class="bx bxl-tiktok"></i></a>
              </center>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>PT.Sinar Aneka Niaga</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
       
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets_landing/') ?>/vendor/aos/aos.js"></script>
  <script src="<?= base_url('assets_landing/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('assets_landing/') ?>/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url('assets_landing/') ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url('assets_landing/') ?>/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url('assets_landing/') ?>/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?= base_url('assets_landing/') ?>/js/main.js"></script>
  <script src="<?php echo base_url() ?>assets/alert.js"></script>
  <?php echo "<script>".$this->session->flashdata('message')."</script>"?>

</body>

</html>