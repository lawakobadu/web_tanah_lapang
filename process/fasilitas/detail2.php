<style>
  td{
    text-align:left;
  }
</style>

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
        $id= $_GET['id'];
        $sql = "SELECT*FROM fasilitas a
                  LEFT JOIN jenis_fasilitas b ON (a.id_jenis=b.idf) 
                WHERE a.id = '$id'";
        $res = $conn->query($sql);
        $data = $res->fetch_assoc();
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
      <div class="row mx-4 mt-5">
        <div class="col-6">
          <div class="title ps-0" style="border-bottom: 2px solid #ff7f5c; width: 110px">
          Detail Fasilitas
          </div>
        </div>

        <div class="col-6">
          
        </div>
        
   
        <div class="row justify-content-start inline-block">
          <div class="kolom" style="width:50px; float: left; width: 20%;padding: 10px;height: 220px;">
            <img src="assets/img/fasilitas/<?php echo $data['foto']; ?>" class="" style="width:180px;height:180px; display: block; margin-right: auto; margin-left: auto;">
          </div>
          <div class="kolom" style="font-weight:500; margin:1px auto; float: left;width: 60%;padding: 10px;height: auto px;">
            <table class="table table-borderless" style="margin:1px auto; line-height:20px;">
              <tr>
                <td>Nama Fasilias</td>
                <td>:</td>
                <td><?php echo $data['nama'];?></td>
              </tr>
              <tr>
                <td>Jenis Fasilitas</td>
                <td>:</td>
                <td><?php echo $data['jenis'];?></td>
              </tr>
               <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $data['alamat'];?></td>
              </tr>
            </table>
            
          </div>
        </div>
   
      <div class="my-4">
            <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=fasilitas.detail&id=<?php echo $data['id_jenis']; ?>" class="btn px-5 py-2 float-start" role="button">Kembali</a>
          </div>
      <div class="card-header bg-white border-0">
        
          </div>
        </div>
      </div>
    </div>