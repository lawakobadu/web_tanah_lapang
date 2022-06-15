<div class="container">
  <div class="content p-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="active" aria-current="page">
          <a href="?p=penduduk.index" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;">
            Data Penduduk
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
            <div class="col-2 title ps-0 float-start" style=" border-bottom: 2px solid #ff7f5c; width: 175px; font-size: 15px; "> Tambah Data Penduduk
            </div>
          </div>
        

      <div class="col mt-4">
        <form action="?p=penduduk.action" id="defaultForm" method="post" enctype="multipart/form-data">
          <?php 
            $sql = "SELECT * FROM jk";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
            $jk .= "<option value='{$row['id_jk']}'> {$row['jenis']} </option>";
            }

            $sql = "SELECT * FROM rt";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
            $rt .= "<option value='{$row['id_rt']}'> {$row['rt']} </option>";
            }

            $sql = "SELECT * FROM rw";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
            $rw .= "<option value='{$row['id_rw']}'> {$row['rw']} </option>";
            }

            $sql = "SELECT * FROM status_domisili";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
            $dom .= "<option value='{$row['id1']}'> {$row['status1']} </option>";
            }

            $sql = "SELECT * FROM status_hidup";
            $res = $conn->query($sql);
            while ($row = $res->fetch_assoc()) {
            $hidup .= "<option value='{$row['id2']}'> {$row['status2']} </option>";
            }
          ?>

          <div class="mb-3">
            <label for="nama" class="form-label">Nama Penduduk</label>
            <input type="text" class="form-control" name="nama">
          </div>
          <div class="mb-3">
            <label for="nik" class="form-label">NIK</label><input type="text" class="form-control" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" name="nik" required>
          </div>
          <div class="mb-3">
            <label for="nokk" class="form-label">No. KK</label><input type="text" class="form-control" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" name="nokk" >
          </div>
          <div class="mb-3">
            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" required>
          </div>
          <div class="mb-3">
            <label for="id_jk" class="form-label">Jenis Kelamin</label>
            <select class="form-control" name="id_jk" required/>
              <option value="">- Pilih -</option>
                <?php  echo $jk; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" required>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col">
                <label for="rt" class="form-label">RT</label>
                <select class="form-control" name="id_rt" required/>
                <option value="">- Pilih -</option>
                  <?php  echo $rt; ?>
                </select>
              </div>
              <div class="col">
                <label for="rt" class="form-label">RW</label>
                <select class="form-control" name="id_rw" required/>
                <option value="">- Pilih -</option>
                <?php  echo $rw; ?>
                </select>
              </div>
            </div> 
          </div>            
          <div class="mb-3">
            <label for="Pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" name="pekerjaan" required>
          </div>
          <div class="mb-3">
            <label for="id_status1" class="form-label">Status Domisili</label>
            <select class="form-control" name="id_status1" required/>
              <option value="">- Pilih -</option>
                <?php  echo $dom; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="id_status2" class="form-label">Status Hidup</label>
            <select class="form-control" name="id_status2" required/>
              <option value="">- Pilih -</option>
                <?php  echo $hidup; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="foto" required/>
            <small class="text-danger">Ukuran foto maksimal 10MB</small>
          </div>
          <div class="my-4">
            <button type="submit" name="add" class="btn px-5 py-2 float-end" style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;">Simpan
            </button>
            <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=penduduk.index" class="btn px-5 py-2 float-start" role="button">Kembali</a>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
                