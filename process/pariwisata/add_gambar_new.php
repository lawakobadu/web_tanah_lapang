
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
            <div class="col-2 title ps-0 float-start" style=" border-bottom: 2px solid #ff7f5c; width: 180px; font-size: 15px; "> Form Tambah Gambar Pariwisata
            </div>
          </div>
      <div class="col mt-4">

        <form action="?p=pariwisata.action" id="defaultForm" method="post" enctype="multipart/form-data">
       
       <?php 
            // $sql = "SELECT * FROM pariwisata";
            // $res = $conn->query($sql);
            // while ($row = $res->fetch_assoc()) {
            // $pariwisata .= "<option value='{$row['id']}'> {$row['nama_wisata']} </option>";
            // }

            $id = $_GET["id"];
        ?>

          <input type="hidden" value="<?php echo $id ?>" name="id">
          <!-- <div class="mb-3">
          <div class="row">
              <div class="col">
                <label for="nama_wisata" class="form-label">Nama Pariwisata</label>
                <select class="form-control" name="id" required/>
                <option value="">- Pilih -</option>
                  <?php  echo $pariwisata; ?>
                </select>
              </div>
          </div>
          </div> -->

          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
              <input class="form-control" id="gambar" name="image[]" type="file"  multiple required />
              <small class="text-danger">Ukuran foto masing-masing maksimal 1MB</small>
          </div>
          
          <div class="my-4">
            <button type="submit" name="add_gambar_new" class="btn px-5 py-2 float-end" style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;"
            onclick="return confirm('Simpan gambar ?')"> Simpan
          </button>

            <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=pariwisata.index" class="btn px-5 py-2 float-start" role="button">Kembali</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
