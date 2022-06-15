

<div class="container">
  <div class="content p-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="me-3">
          <a href="" class="btn btn-sm" style="font-weight: bold; font-size: 13px; color: #404444"> Konten
          </a>
        </li>
        
        <li class="active" aria-current="page">
          <a href="?p=struktur.index" class="btn btn-title shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;"> Profil Kelurahan
          </a>
        </li>
      </ol>
    </nav>

    <div class="card shadow mb-5" style="box-shadow: 10px; border-radius: 10px; border: none">

      <?php 
        require_once ('connect.php');
        $sql = "SELECT * FROM profil WHERE id=1";
        $res = $conn->query($sql);
        $data = $res -> fetch_assoc();

          if ($_SESSION['status'] === '0')
          {
          ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= $_SESSION['pesan']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
      <?php 
            unset($_SESSION['status']);
            unset($_SESSION['pesan']);
          } 
          else if ($_SESSION['status'] === '1')
          {
      ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?= $_SESSION['pesan']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
      <?php 
            unset($_SESSION['status']);
            unset($_SESSION['pesan']);
          } 
          else if ($_SESSION['status'] === '2')
          {
      ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= $_SESSION['pesan']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
      <?php 
            unset($_SESSION['status']);
            unset($_SESSION['pesan']);
          } 
        ?>
        <br>
      <div class="row mx-4 ">
        <div class="col-6">
          <div class="title ps-0" style="border-bottom: 2px solid #ff7f5c; width: 210px">
          Struktur Organisasi Kelurahan
          </div>
        </div>

        <div class="col-6">
          <a href="?p=struktur.edit" class="btn float-end" style="background-color: #3734a9; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;">
            Edit
          </a>
        </div>
      </div>
      <br>
      <img src="assets/img/struktur/<?php echo $data['struktur'];?>" alt="" class="img-fluid mx-auto d-block"/>
      <br>
    </div>


    </div>
  </div>
            