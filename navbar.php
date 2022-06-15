<?php 
    require_once ('connect.php');
    session_start();
    if ($_SESSION['uname']) 
    {
        header('location:main.php');
    }
?>
<head>
  <style>
.bgimg {
    background-image: url('assets/img/bg2.JPG');
}
.nav-link {
    padding-right: 12px;
    padding-left: 12px;
    font-size: medium;
}
</style>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tanah Lapang</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="css/UIstyle.css" />
  </head>
  <body>
<?php include("whatsapplink.php"); ?>

    <!-- navigasi -->
    <nav
      class="navbar navbar-expand-lg navbar-dark shadow-lg fixed-top" style="background-color: #343a40;"
    >
      <div class="container">
        <a class="navbar-brand" style="font-size: 24px;" href="index.php">TANAH LAPANG</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarText"
          aria-controls="navbarText"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-right" id="navbarText">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="padding: 10px;">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="">Profile</a>
              <ul class="drop" style="background-color:white">
                <li><a href="visimisi.php" style="font-size:medium;">Visi & Misi</a></li>
                <li><a href="struktur.php" style="font-size:medium;">Struktur Organisasi</a></li>
                <li><a href="sejarah.php" style="font-size:medium;">Sejarah</a></li>
                <li><a href="laporan_penduduk.php" style="font-size:medium;">Data Penduduk & Fasilitas</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="organisasi.php">Organisasi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pariwisata.php">Pariwisata</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.php">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <div class="container-login text-white">
                <a class="login-btn " href="login.php">Login</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>

