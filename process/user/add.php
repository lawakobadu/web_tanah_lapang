<div class="container">
  <div class="content p-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="active" aria-current="page">
          <a href="?p=user.index" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;">
            Admin
          </a>
        </li>
      </ol>
    </nav>


  <div class="row mt-4" style="margin-left: 10px; margin-right: 10px">

    <?php
       if ($_SESSION['status'] === '0')
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
          else if ($_SESSION['status'] === '1')
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

    <div class="card shadow mb-5" style="box-shadow: 10px; border-radius: 10px; border: none">
        <div class="card-body">
          <div class="row">
            <div class="col-2 title ps-0 float-start" style=" border-bottom: 2px solid #ff7f5c; width: 140px; font-size: 15px; ">Form Tambah User
            </div>
          </div>   

      <div class="col mt-4">
          <form action="?p=user.action" id="defaultForm" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="uname" class="form-label">Username</label>
              <input type="text" class="form-control" id="uname" name="uname" required="" />
            </div>
            <div class="mb-3">
              <label for="pass" class="form-label">Password</label>
              <input type="password" class="form-control" id="pass" name="pass" required="" />
            </div>
            <div class="mb-3">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" id="nama" name="nama" required="" />
            </div>
            <div class="mb-3">
              <label for="nip" class="form-label">NIP</label>
                <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="nip" name="nip" required />
            </div>
            <div class="mb-3">
              <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" class="form-control" id="jabatan" name="jabatan" required="" />
            </div>
            <div class="mb-3">
              <label for="nohp" class="form-label">No. HP / Telepon</label>
                <input type="text" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" class="form-control" id="nohp" name="nohp" required />
            </div>
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required="" />
            </div>
            <div class="mb-3">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" class="form-control"name="foto" required/>
              <small class="text-danger">Ukuran foto maksimal 10MB</small>
            </div>
            <div class="my-4">
              <button type="submit" name="add" class="btn px-5 py-2 float-end" style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;"> Simpan
              </button>
              <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=user.index" class="btn px-5 py-2 float-start" role="button">Kembali</a>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>


