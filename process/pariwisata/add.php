
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
            <div class="col-2 title ps-0 float-start" style=" border-bottom: 2px solid #ff7f5c; width: 180px; font-size: 15px; "> Form Tambah Pariwisata
            </div>
          </div>
      <div class="col mt-4">

        <form action="?p=pariwisata.action" id="defaultForm" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="nama_wisata" class="form-label">Nama Pariwisata</label>
              <input type="text" class="form-control" id="nama_wisata" name="nama_wisata"required/>
          </div>
          
          <div class="mb-3">
            <label for="tempat" class="form-label">Tempat</label>
              <input type="text" class="form-control" id="tempat" name="tempat" required/>
          </div>
          <!-- <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
              <input class="form-control" id="gambar" type="file" name="gambar" required />
              <small class="text-danger">Ukuran foto maksimal 1MB</small>
          </div> -->
          <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
              <textarea class="form-control" id="keterangan" rows="20" name="keterangan"required></textarea>
          </div>
        
          <div class="my-4">
            <button type="submit" name="add" class="btn px-5 py-2 float-end" style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;"
            onclick="return confirm('Apakah Data Yang Dimasukkan Sudah Benar ?')">Lanjut
          
          </button>
            <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=pariwisata.index" class="btn px-5 py-2 float-start" role="button">Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
