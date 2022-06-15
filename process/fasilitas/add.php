<div class="container">
  <div class="content p-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">   
        <li class="active" aria-current="page">
          <a href="?p=fasilitas.index" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;">
            Data Fasilitas
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
        <div class="col title ps-0" style=" border-bottom: 2px solid #ff7f5c; width: 160px; font-size: 15px;"> Form Tambah Fasilitas
        </div>
      <div class="col mt-4">
      <?php 

            $sql = "SELECT * FROM jenis_fasilitas";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
            $fas .= "<option value='{$row['idf']}'> {$row['jenis']} </option>";
            }
      ?>
        <form action="?p=fasilitas.action" id="defaultForm" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Fasilitas</label>
              <input type="text" class="form-control" name="nama" required />
          </div>
          <div class="mb-3">
            <label for="id_jenis" class="form-label">Jenis Fasilitas</label>
            <select class="form-control" name="id_jenis" required/>
              <option value="">- Pilih -</option>
                <?php  echo $fas; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" name="alamat" required />
          </div>
          <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
              <input class="form-control" id="foto" type="file" name="foto" required />
              <small class="text-danger">Ukuran foto maksimal 10MB</small>
          </div>
      
          <div class="my-4">
            <button type="submit" name="add" class="btn px-5 py-2 float-end" style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;">Simpan
            </button>
            <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=fasilitas.detail&id=<?php echo $data['id_jenis']; ?>" class="btn px-5 py-2 float-start" role="button">Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
