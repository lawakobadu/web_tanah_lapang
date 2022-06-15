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
	<?php 

        $id  = $_GET['id'];
        $sql = "SELECT*FROM fasilitas a
                	LEFT JOIN jenis_fasilitas b ON (a.id_jenis=b.idf) 
                WHERE a.id = '$id'";
        $res = $conn->query($sql);
        $data = $res->fetch_assoc();
            
        $sql = "SELECT * FROM jenis_fasilitas";
        $res = $conn->query($sql);
        while ($row = $res->fetch_assoc()) {
        $fas .= "<option value='{$row['idf']}'> {$row['jenis']} </option>";
        }
    ?>

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
      <div class="row mt-4" style="margin-left: 10px; margin-right: 10px">
        <div class="card-body">
          <div class="col title ps-0"style="border-bottom: 2px solid #ff7f5c;width: 190px;font-size: 15px;">Edit Data <?php echo $data['jenis']; ?>
          </div>

          
          <div class="col mt-4">
            <form action="?p=fasilitas.action" id="defaultForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Fasilitas</label>
              <input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" style="background-color:#F1F1F1">
            </div>
            <div class="mb-3">
              <label for="id_jenis" class="form-label">Jenis Fasilitas</label>
              <select class="form-control" name="id_jenis" value="<?php echo $data['id_jenis'];?>" style="background-color:#F1F1F1"required/>
              <?php echo $fas; ?>
              </select>
            </div>
            <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>" style="background-color:#F1F1F1" >
            </div>
            <div class="mb-3">
              <label for="foto" class="form-label">Foto</label>
              <div class="mb-3">
                <img src="assets/img/fasilitas/<?php echo $data['foto'];?>" width="90" height="90"/>
              <br>
            </div> 
            <input type="file" class="form-control" name="foto"/>
            </div>          
            <div class="my-4">
              <button type="submit" name="edit" class="btn px-5 py-2 float-end" style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;">Simpan
              </button>
            </div>
          </form>
       	</div>
	</div>
</div>
               