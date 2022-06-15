<?php     
    session_start();
    require_once ('connect.php');
    if  ( empty($_SESSION['uname']) )  
    {
        header('location:./');
    }

    $id= $_SESSION['id'];
    $sql = "SELECT * FROM user WHERE id = '$id' LIMIT 1";
    $res = $conn->query($sql);
    $data = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>

  <body class="sb-sidenav-collapse-arrow">
    <div id="layoutSidenav">
      <div id="layoutSidenav_nav">
        <nav
          class="sb-sidenav accordion sb-sidenav-dark"
          id="sidenavAccordion"
          style="color: #fafbff"
        >
          <div class="sb-sidenav-menu" style="background-color: #1b1c31">
            <div class="nav">
              <img class="avasidebar" src="assets/img/admin/<?php echo $data['foto']; ?>" alt="Foto Profil" />
              <div
                class="small"
                style="
                  margin: auto;
                  font-weight: bolder;
                  padding-top: 5%;
                  font-family: Manrope;
                "
              >
                Kelurahan Tanah Lapang
              </div>
              <div
                class="small"
                style="margin: auto; font-weight: bolder; font-family: Manrope"
              >
                SAWAHLUNTO
              </div>
              <hr style="border: 1px solid #ff7f5c" />
              <a class="nav-link" href="?p=user.index">
                <div class="sb-nav-link-icon">
                  <i class="fa fa-user"></i>
                </div>
                Admin
              </a>

              <!-- Konten -->
              <a
                class="nav-link collapsed"
                href="#"
                data-bs-toggle="collapse"
                data-bs-target="#collapseLayouts"
                aria-expanded="false"
                aria-controls="collapseLayouts"
              >
                <div class="sb-nav-link-icon">
                  <i class="fa fa-columns"></i>
                </div>
                Konten
                <div class="sb-sidenav-collapse-arrow">
                  <i class="fa fa-angle-down"></i>
                </div>
              </a>

              <!-- Menu Konten -->
              <div
                class="collapse"
                id="collapseLayouts"
                aria-labelledby="headingOne"
                data-bs-parent="#sidenavAccordion"
              >
                <nav class="sb-sidenav-menu-nested nav">
                  <!-- Profil Kelurahan -->
                  <a
                    class="nav-link collapsed"
                    href="#"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapseLayouts2"
                    aria-expanded="false"
                    aria-controls="collapseLayouts"
                    id="sidenavAccordion2"
                  >
                    <div class="sb-nav-link">Profil Kelurahan</div>
                    <div class="sb-sidenav-collapse-arrow">
                      <i class="fa fa-angle-down"></i>
                    </div>
                  </a>

                  <!-- Menu Profil Kelurahan -->
                  <div
                    class="collapse"
                    id="collapseLayouts2"
                    aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion2"
                  >
                    <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="?p=visi-misi.index">Visi Misi</a>
                      <a class="nav-link" href="?p=sejarah.index">Sejarah</a>
                      <a class="nav-link" href="?p=struktur.index"
                        >Struktur Organisasi</a
                      >
                      <!-- <a class="nav-link" href="?p=perangkat.index"
                        >Perangkat Kelurahan</a
                      > -->
                    </nav>
                  </div>

                  <a class="nav-link" href="?p=organisasi.index">Organisasi</a>
                  <a class="nav-link" href="?p=pariwisata.index">Pariwisata</a>
                  <a class="nav-link" href="?p=blog.index">Blog</a>
                  <a class="nav-link" href="?p=about.index">About</a>
                </nav>
              </div>
              <!-- Akhir Menu Konten -->
              <a class="nav-link" href="?p=penduduk.index">
                <div class="sb-nav-link-icon">
                  <i class="fa fa-users"></i>
                </div>
                Data Penduduk
              </a>
              <!-- tables html -->
              <a class="nav-link" href="?p=fasilitas.index">
                <div class="sb-nav-link-icon"><i class="fa fa-table"></i></div>
                Data Fasilitas
              </a>
            </div>
          </div>
          <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Admin
          </div>
        </nav>
      </div>
      <div id="layoutSidenav_content">
        <nav class="sb-topnav navbar navbar-expand">
          <!-- Navbar Brand-->
          <!-- Sidebar Toggle-->
          <button
            class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 text-black"
            id="sidebarToggle"
            href="#!"
            style="margin: 3%"
          >
            <i class="fa fa-bars"></i>
          </button>
          <!-- Navbar Search-->
          <form
            class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"
          ></form>
          <!-- Navbar-->
          <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle text-black"
                id="navbarDropdown"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <img class="avapp" src="assets/img/admin/<?php echo $data['foto']; ?>"/>
                Admin
              </a>
              <ul
                class="dropdown-menu dropdown-menu-end text-black"
                aria-labelledby="navbarDropdown"
              >
                <li><a class="dropdown-item" href="?p=user.detail&id=<?php echo $data['id']; ?>">Profil</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </nav>
        <main>
          <?php
                if ($_SESSION['role'] === 'admin')
                {
                    if( isset($_GET['p']) && strlen($_GET['p']) > 0 )
                    {
                        $p = str_replace(".","/",$_GET['p']).".php";
                    } else {
                        $p = "home.php";    
                    } if( file_exists("process/".$p) )
                    {
                        include("process/".$p);
                    } else {
                        include("process/home.php");
                    }
                 }
            ?>
        </main>


        <footer class="py-4 bg-light mt-auto">
          <div class="container-fluid px-4">
            <div
              class="d-flex align-items-center justify-content-between small"
            >
              <div class="text-muted">
                Copyright &copy Y2022 Tanah Lapang X LDKOM. All rights reserved.
              </div>
              <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
  </body>
  
</html>
