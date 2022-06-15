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

      <div class="card shadow-sm mb-5" style="box-shadow: 10px; border-radius: 10px; border: none">
        <div class="card-body">
          <div class="row">
            <div class="col-2 title ps-0 float-start" style=" border-bottom: 2px solid #ff7f5c; width: 200px; font-size: 15px; "> Form Tambah Organisasi
            </div>
          </div>
        

      <div class="col mt-4">
          <form action="?p=organisasi.action" id="defaultForm" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama Organisasi</label>
              <input type="text" id="nama_organisasi" name="nama_organisasi" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nama Ketua</label>
              <input type="text" id="nama_ketua" name="nama_ketua" class="form-control" required="">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
              <textarea class="form-control" id="deskripsi" rows="20" name="deskripsi" required></textarea>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Upload Gambar</label>
              <input type="file" id="img" name="img" class="form-control" required="">
              <small class="text-danger">Ukuran foto maksimal 10MB</small>
            </div>
            <div class="my-4">
              <button type="submit" name="add" id="add" class="btn px-5 py-2 float-end" style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;">Simpan
              </button>
              <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=organisasi.index" class="btn px-5 py-2 float-start" role="button">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>