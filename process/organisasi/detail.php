<?php
$id_organisasi = $_GET['id'];
$sql = "SELECT * FROM organisasi WHERE id = $id_organisasi";
$organisasi = $conn->query($sql);
while ($data = $organisasi->fetch_assoc()) {
  $nama = $data['nama'];
  $ketua = $data['ketua'];
  $deskripsi =  $data['deskripsi'];
  $foto = $data['foto'];
}
?>


<div class="container">
  <div class="content p-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="me-3">
          <a href="#" class="btn btn-sm" style="font-weight: bold; font-size: 13px; color: #404444">
            Konten
          </a>
        </li>

        <li class="active" aria-current="page">
          <a href="?p=organisasi.index" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;">
            Organisasi
          </a>
        </li>
      </ol>
    </nav>

    <div class="card shadow mb-5" style="box-shadow: 10px; border-radius: 10px; border: none">
      <div class="row mx-4 mt-4">
        <?php
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
        <div class="col-6">
          <div class="title ps-0" style="border-bottom: 2px solid #ff7f5c; width: 120px">
          Detail Organisasi
          </div>
        </div>

        <?php 
        $id= $_GET['id'];
        $sql = "SELECT * FROM user WHERE id = '$id' LIMIT 1";
        $res = $conn->query($sql);
        $data = $res->fetch_assoc();
        ?>

       <div class="row  inline-block">
        <div class="row mx-4 mt-4">
          <div class="row justify-content-start">
            <div class="kolom" style="width:50px; float: left; width: 20%; padding: 10px; height: 220px;">
              <img src="assets/img/organisasi/<?= $foto ?>" class="" style="width:180px;height:180px; display: block; margin-right: auto; margin-left: auto;">
            </div>

            <div class="kolom" style="font-weight:500; margin:1px auto; float: left; width: 60%; padding: 10px; height: 220px;">
              <table class="table table-borderless" style="margin:1px auto; line-height:15px;">
                <tr>
                  <td>Nama Organisasi</td>
                  <td>:</td>
                  <td><?= $nama ?></td>
                </tr>
                <tr>
                  <td>Nama Ketua</td>
                  <td>:</td>
                  <td><?= $ketua ?></td>
                </tr>
                <!-- <tr>
                  <td>Bidang</td>
                  <td>:</td>
                  <td>A</td>
                </tr> -->
                <!-- <tr>
                  <td>No HP Ketua</td>
                  <td>:</td>
                  <td>08</td>
                </tr> -->
              </table>
            </div>

      
          <p style="text-align: justify">
            <?php echo nl2br($deskripsi)?>
          </p>
          <div class="my-4">
            <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=organisasi.index" class="btn px-5 py-2 float-start" role="button">Kembali</a>
          </div>
        </div>
      </div>
          
            </div>
          </div>
        </div>
      </div>