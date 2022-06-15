<?php

require_once('connect.php');

session_start();
if ($_SESSION['uname']) {
  header('location:main.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home - Tanah Lapang</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/stylegallery.css" />

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;500;700&display=swap" rel="stylesheet">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" /> -->
</head>

<body>
<?php include("whatsapplink.php"); ?>

  <!-- Navbar  -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
    <div class="container">
      <a class="navbar-brand" href="index.php">Tanah Lapang</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="mr-auto"></div>
        <ul class="navbar-nav mx-auto text-center">
          <li class="nav-item">
            <a class="nav-link text-white" href="index.php">Home</a>
          </li>
          <li class="nav-item dropdown ">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Profile
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a href="visimisi.php" class="dropdown-item">Visi Misi</a>
              <a href="struktur.php" class="dropdown-item">Struktur Organisasi</a>
              <a href="sejarah.php" class="dropdown-item">Sejarah</a>
              <a href="laporan_penduduk.php" class="dropdown-item">Data Penduduk dan Fasilitas</a>
            </div>
          </li>
          <li class="nav-item">
              <a class="nav-link text-white" href="organisasi.php">Organisasi</a>
            </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="pariwisata.php">Pariwisata</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="blog.php">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="about.php">About</a>
          </li>
          </li>
        </ul>
        <div class="container-login text-white">
          <a class="login-btn " href="login.php">Login</a>
        </div>
      </div>
    </div>

  </nav>

  <!-- Banner Image  -->
  <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center" style="background-image: url(assets/img/bg.jpg);">
    <div class="content text-center">
      <h1 class="jdl">Kelurahan Tanah Lapang<br> Sawah Lunto</h1>
    </div>
    <div class="jdl-detail">
      <p>
        Tanah Lapang adalah kelurahan yang berada di kecamatan Lembah Segar, Kota Sawahlunto, Sumatera Barat, Indonesia.
      </p>
    </div>
  </div>
  <!-- End BAnner Image -->

  <!-- About -->
  <?php     
    $sql = "SELECT * FROM profil WHERE id = 1 LIMIT 1";
    $res = $conn->query($sql);
    $data2 = $res->fetch_assoc();
?>
  <div class="container-fluid py-5">
    <div class="container">
      <div class="row align-items-center pb-1">
        <div class="col-lg-5 mt-lg-4">
          <img class="img-thumbnail p-3" src="assets/img/kantorlurah.jpg" alt="">
        </div>
        <div class="col-lg-6 mt-5 mb-5 mt-lg-5  mx-auto">
          <small class="jdl-profil-kelurahan">PROFIL KELURAHAN</small>
          <h1 class="jdl-pk-2 mt-2 mb-4 ">Kelurahan Tanah Lapang, Lembah Segar, Sawah Lunto</h1>
          <p class="detail-pk mb-4"><?php echo $data2['desk']; ?></p>
          <a href="about.php" class="btn btn-primary py-md-3 px-md-7 font-weight-semi-bold">Baca Lebih Lanjut</a>
        </div>
      </div>
    </div>
  </div>
  <!-- About End -->

  <!-- Data -->
  <?php
  $sql = " SELECT 
        (SELECT COUNT(*) FROM penduduk WHERE id_jk = 1) AS pr,
        ( SELECT COUNT(*) FROM penduduk WHERE id_jk = 2) AS lk,
        ( SELECT COUNT(*) FROM penduduk) AS total" ;
  $res = $conn->query($sql);
  $data = $res->fetch_assoc();
  ?>
  <div class="cont-data container-fluid pt-5">
    <div class="container">
      <div class="row mt-3  ">
        <div class="col-lg-2 mb-5 border-right border-secondary ">
          <div class="d-flex align-items-left  mb-4 mb-lg-0 p-4">
            <div class="d-flex flex-column">
              <h3 class="jdl-data1 font-weight-bold text-uppercase " font face="Manrope">Data Penduduk</h3>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="d-flex align-items-left  mb-4 mb-lg-0 " style="height: 120px;">
            <div class="d-flex flex-column align-items-left">
              <h3 class="jdl-data2 font-weight-bold text-uppercase  "><?php echo $data['total']; ?></h3>
              <p class="isi-data"><i class="fas fa-user"></i> Jumlah Penduduk</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="d-flex align-items-left  mb-4 mb-lg-0 " style="height: 120px;">
            <div class="d-flex flex-column align-items-left">
              <h3 class="jdl-data2 font-weight-bold text-uppercase  "><?php echo $data['lk']; ?></h3>
              <p class="isi-data"><i class="fas fa-star"></i> Laki-Laki</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="d-flex align-items-left mb-4 mb-lg-0 " style="height: 120px;">
            <div class="d-flex flex-column align-items-left">
              <h3 class="jdl-data2 font-weight-bold text-uppercase  "><?php echo $data['pr']; ?></h3>
              <p class="isi-data"><i class="fas fa-star"></i> Perempuan</p>
            </div>
          </div>
        </div>
        <div class="col-hiasan col-md-1">
          <div class="d-flex align-items-right mb-0 mb-lg-0 " style="height: 120px;">
            <div class="d-flex flex-column align-items-right mr-0">
              <img class="hiasan" src="assets/img/44.png">
            </div>
          </div>
          <br><br><br><br>
           <div class="col-hiasan2 col-md-1">
          <!-- <div class="d-flex align-items-right mb-0 mb-lg-0 "> -->
          <!-- <div class="d-flex flex-column align-items-right mr-0"> -->
          <a href="laporan_penduduk.php"><img id="hiasan2" src="assets/img/Right Button.png"></a>
          <!-- </div> -->
          <!-- </div> -->
        </div>
        </div>
     


       
     </div>


    </div>
  </div>
  <!-- End Data -->

  <!-- Organisasi -->
  <div class="cont-org container-fluid pt-5 ">
    <div class="container">
      <div class="row mt-4 ml-1">
        <p class="judul-org">Organisasi Kelurahan</p>
        <?php
        $no = 1;
        $sql = "SELECT * FROM organisasi";
        $organisasi = $conn->query($sql);
        while ($data = $organisasi->fetch_assoc()) {
        ?>
          <div class="col-md-3 ">
            <div class="col-org d-flex align-items-left border mb-4 mb-4 mb-lg-0 p-4">
              <div class="d-flex flex-column">
                <a class="link-org" href="detail_organisasi.php?id=<?php echo $data['id'] ?>">
                  <h3 class="jdl-org " font face="Manrope"><?php echo $data['nama'] ?></h3>
                </a>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  </div>

  <!-- End Organisasi -->

  <!-- Galeri foto  -->


  <section class="ftco-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="heading-section mb-5 pb-md-4 text-white">Galeri Foto</h2>
        </div>
        <div class="col-md-12">
          <div class="featured-carousel owl-carousel">
            <?php
            $no = 1;
            $sql = "SELECT * FROM organisasi";
            $organisasi = $conn->query($sql);
            while ($data = $organisasi->fetch_assoc()) {
            ?>
            <div class="item">
              <div class="work">
                <div class="img d-flex align-items-center justify-content-center rounded" style="background-image: url(assets/img/organisasi/<?php echo $data['foto']; ?>);">
                  <a href="detail_organisasi.php?id=<?php echo $data['id'] ?>" class="icon d-flex align-items-center justify-content-center">
                    <span class="ion-ios-search"></span>
                  </a>
                </div>
                <div class="text pt-3 w-100 text-center">
                  <h3 style="color: white"><?php echo $data['nama']; ?></h3>
                  <span><?php echo $data['nama']; ?></span>
                </div>
              </div>
            </div>
          <?php } ?>
            
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- End GAleri Foto -->

  <!-- Blog Start -->
  <div class="container-fluid pt-5">
    <div class="container">
      <div class="text-center">
        <h1 class="recent-blog mt-2 mb-5">Recent Blogs</h1>
      </div>
      <div class="row">
        <?php
        $sql = "SELECT * FROM blog order by tanggal";
        $blog = $conn->query($sql);
        while ($data = $blog->fetch_assoc()) {
        ?>
          <div class="col-md-6 mb-5">
            <div class="position-relative">
              <img class="img-fluid w-100" src="assets/img/blog/<?php echo $data['foto'] ?>" style="height: 300px !important;"alt="">
              <div class="position-absolute bg-primary d-flex flex-column align-items-center justify-content-center" style="width: 80px; height: 80px; bottom: 0; left: 0;">
                <h6 class="text-uppercase mt-2 mb-n2"><?php echo date('F', strtotime($data['tanggal'])) ?></h6>
                <h1 class="m-0"><?php echo date('d', strtotime($data['tanggal'])) ?></h1>
              </div>
            </div>
            <div class="border border-top-0" style="padding: 30px;">
              <div class="d-flex mb-3">
                <div class="d-flex align-items-center">
                  <img class="rounded-circle" style="width: 40px; height: 40px;" src="assets/img/profil/index.jpg" alt="">
                  <p class="text-muted ml-2"><?php echo $data['author'] ?></p>
                </div>
              </div>
              <a class="h5 font-weight-bold" href="detail_blog.php?id=<?php echo $data['id'] ?>"><?php echo $data['judul'] ?></a>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- Blog End -->

  <!-- Footer Start -->
  <div class="container-fluid bg-secondary text-white mt-5 pt-5 px-sm-3 px-md-5 bg-dark border-bottom border-light">
    <div class="map-container">
      <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.5354654546504!2d100.77770030628515!3d-0.6822530414245733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2b2f40ed0d2e49%3A0x3a2153da2bec7376!2sKantor%20Lurah%20Tanah%20Lapang!5e0!3m2!1sen!2sid!4v1651114882346!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="row pt-5">
      <div class="col-lg-4 col-md-6 mb-5">
        <a href="index.html" class="navbar-brand">
          <h1 class="footer-jdl m-0 mt-n2 text-white font-weight-bold ">Tanah Lapang</h1>
        </a>
        <p>Tanah Lapang adalah kelurahan yang berada di kecamatan Lembah Segar, Kota Sawahlunto, Sumatra Barat, Indonesia. </p>
        <div class="d-flex justify-content-start mt-4">
          <a href="#"><img src="assets/img/unand.png" alt="Logo Unand" style="width: 38px; height: 38px; margin-right: 15px;" href="#"></a>
          <a href="http://labdas.si.fti.unand.ac.id"><img src="assets/img/ldkom.png" alt="Logo Unand" style="width: 50px; height: 38px; margin-right: 15px;" href="#"></a>
          <a href="#"><img src="assets/img/Logo-Sawahlunto.png" alt="Logo Unand" style="width: 38px; height: 38px; margin-right: 15px;" href="#"></a>
        </div>
      </div>
      <div class="col-lg-2 col-md-6 mb-5">
        <h5 class="font-weight-bold text-white mb-4">Tanah Lapang</h5>
        <div class="d-flex flex-column justify-content-start">
          <a class="text-white mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Home</a>
          <a class="text-white mb-2" href="visimisi.php"><i class="fa fa-angle-right text-white mr-2"></i>Profile</a>
          <a class="text-white mb-2" href="pariwisata.php"><i class="fa fa-angle-right text-white mr-2"></i>Pariwisata</a>
          <a class="text-white" href="blog.php"><i class="fa fa-angle-right text-white mr-2"></i>Blog</a>
          <a class="text-white" href="about.php"><i class="fa fa-angle-right text-white mr-2"></i>About</a>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-5">
        <h5 class="font-weight-bold text-white mb-4">Organisasi</h5>
        <div class="d-flex flex-column justify-content-start">
        <?php
        require_once('connect.php');
        $sql = "SELECT * FROM organisasi";
        $organisasi = $conn->query($sql);
        while ($data = $organisasi->fetch_assoc()) {
        ?>
          <a class="text-white mb-2" href="detail_organisasi.php?id=<?php echo $data['id'] ?>"><i class="fa fa-angle-right text-white mr-2"></i><?php echo $data['nama'] ?></a>
        <?php } ?>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 mb-5 ">
        <h5 class="font-weight-bold text-white mb-4">Info dan Kontak</h5>
        <p>Berikut Info Kontak dari Kelurahan Tanah Lapang</p>
        <p><i class="fa fa-map-marker-alt text-white mr-2"></i>Jl. Tangsi Baru, Pasar, Kec. Lembah Segar, Kota Sawahlunto</p>
        <p><i class="fab fa-facebook text-white mr-2"></i>Kelurahan Tanah Lapang</p>
      </div>
    </div>
  </div>
  <div class="cont-footer container-fluid py-4 px-sm-3 px-md-5 bg-dark text-white">
    <p class="m-0 text-center">
      &copy; <a class="font-weight-semi-bold text-white" href="#">Tanah Lapang</a>. All Rights Reserved. Designed by
      <a class="font-weight-semi-bold text-white" href="http://labdas.si.fti.unand.ac.id">LDKOM</a>
    </p>
  </div>
  <!-- Footer End -->

  <script src="js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    var nav = document.querySelector('nav');

    window.addEventListener('scroll', function() {
      if (window.pageYOffset > 100) {
        nav.classList.add('bg-dark', 'shadow');
      } else {
        nav.classList.remove('bg-dark', 'shadow');
      }
    });
  </script>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <!-- <-- Always remember to call the above files first before calling the bootstrap.min.js file -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>