<?php
$id_organisasi = $_GET['id'];
$sql = "SELECT * FROM organisasi WHERE id = $id_organisasi";
$organisasi = $conn->query($sql);
while ($data = $organisasi->fetch_assoc()) {
  $nama = $data['nama'];
  $ketua = $data['ketua'];
  $deskripsi =  $data['deskripsi'];
  $foto =  $data['foto'];
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
            <div class="col-2 title ps-0 float-start" style=" border-bottom: 2px solid #ff7f5c; width: 160px; font-size: 15px; ">Edit Data Organisasi
            </div>
          </div>
        <div class="col mt-4">
          <form action="?p=organisasi.action" id="defaultForm" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <input type="hidden" class="form-control" name="id" value="<?php echo $id_organisasi ?>" required />
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama Organisasi</label>
              <input type="text" class="form-control" name="nama_organisasi" value="<?php echo $nama ?>">
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama Ketua</label>
              <input type="text" class="form-control" name="nama_ketua" value="<?php echo $ketua ?>">
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
              <textarea class="form-control" id="deskripsi" rows="20" name="deskripsi" required><?php echo $deskripsi;?></textarea>
            </div>

            <div class="mb-3">
              <label for="name" class="form-label">Upload Gambar</label>
              <img src="assets/img/organisasi/<?php echo $foto ?>" width="200px">
              <br><br>
              <input type="file" id="img" value="<?php echo $foto ?>"name="img" class="form-control">
            </div>
            
            <div class="my-4">
              <button type="submit" name="edit" class="btn px-5 py-2 float-end" style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;"> Simpan
              </button>
              <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=organisasi.index" class="btn px-5 py-2 float-start" role="button">Kembali</a>
            </div>
        
        </div>
      </div>
    </div>
  </div>