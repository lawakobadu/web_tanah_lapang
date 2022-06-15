<?php 
  $id_pariwisata = $_GET['id'];
  $sql = "SELECT * FROM pariwisata WHERE id = $id_pariwisata";
  $pariwisata = $conn->query($sql);
  while($data = $pariwisata -> fetch_assoc()){
    $nama_wisata = $data['nama_wisata'];
    $tempat = $data['tempat'];
    $keterangan =  $data['keterangan'];
    // $gambar = $data['gambar'];
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
          <a href="?p=pariwisata.index" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;">
            Pariwisata
          </a>
        </li>
      </ol>
    </nav>

  <div class="row mt-4" style="margin-left: 10px; margin-right: 10px">
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
          ?>
    <div class="card shadow mb-5" style="box-shadow: 10px; border-radius: 10px; border: none">
      <div class="card-body">
        <div class="row">
            <div class="col-2 title ps-0 float-start" style=" border-bottom: 2px solid #ff7f5c; width: 200px; font-size: 15px; "> Form Edit Pariwisata
            </div>
          </div>
        <div class="col mt-4">
          <form action="?p=pariwisata.action" id="defaultForm" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" class="form-control" name="id" value="<?php echo $id_pariwisata?>" required/>
            </div>
            <div class="mb-3">
              <label for="nama_wisata" class="form-label">Nama Wisata</label>
                <input type="text" class="form-control" id="nama_wisata" name="nama_wisata" value="<?php echo $nama_wisata?>" required/>
            </div>
      
            <div class="mb-3">
              <label for="tempat" class="form-label">Tempat</label>
                <input type="text" class="form-control" id="tempat" name="tempat" value="<?php echo $tempat?>" required/>
            </div>
            <!-- <div class="mb-3">
              <label for="gambar" class="form-label">Gambar</label> <br> 
              <img src="assets/img/pariwisata/" width="200px"><br><br>
              <input class="form-control" id="gambar" type="file" name="gambar"/>
            </div> -->
            <div class="mb-3">
              <label for="keterangan" class="form-label">Keterangan</label>
              <textarea class="form-control" id="keterangan" rows="20" name="keterangan" required><?php echo $keterangan;?></textarea>
            </div>
            <div class="my-4">
              <button type="submit" name="edit" class="btn px-5 py-2 float-end" style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;"> Simpan
              </button>
              <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=pariwisata.index" class="btn px-5 py-2 float-start" role="button">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
