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
      <div class="row mx-4 mt-5">
        <div class="col-6">
          <div class="title ps-0" style="border-bottom: 2px solid #ff7f5c; width: 120px">
          Detail Penduduk
          </div>
        </div>

        <?php 
        $id= $_GET['id'];
        $sql = "SELECT *FROM penduduk a
                    LEFT JOIN jk b ON (a.id_jk=b.id_jk) 
                    LEFT JOIN rt c ON (a.id_rt=c.id_rt)
                    LEFT JOIN det_dom d ON (d.id_penduduk=a.id) 
                    LEFT JOIN det_hidup e ON (e.id_penduduk=a.id)
                    LEFT JOIN status_domisili f ON (f.id1=d.id_status1)
                    LEFT JOIN status_hidup g ON (g.id2=e.id_status2)
                    LEFT JOIN rw h ON (a.id_rw=h.id_rw)
                    WHERE a.id = '$id' LIMIT 1";

            $res = $conn->query($sql);
            $data = $res->fetch_assoc();
        ?>
   
        <div class="row justify-content-start inline-block">
          <div class="kolom" style="width:50px; float: left; width: 20%;padding: 10px;height: 220px;">
            <img src="assets/img/profil/<?php echo $data['foto'];?>" class="avaprofil" style="width:180px;height:180px; display: block; margin-right: auto; margin-left: auto;">
          </div>
          <div class="kolom" style="font-weight:500; margin:1px auto; float: left;width: 60%;padding: 10px;height: auto px;">
            <table class="table table-borderless" style="margin:1px auto; line-height:20px;">
              <tr >
                <td>Nama</td>
                <td>:</td>
                <td ><?php echo $data['nama'];?></td>
              </tr>
              <tr>
                <td>NIK</td>
                <td>:</td>
                <td><?php echo $data['nik'];?></td>
              </tr>
               <tr>
                <td>No. KK</td>
                <td>:</td>
                <td><?php echo $data['nokk'];?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $data['alamat'];?></td>
              </tr>
              <tr>
                <td>RT</td>
                <td>:</td>
                <td><?php echo $data['rt'];?></td>
              </tr>
              <tr>
                <td>RW</td>
                <td>:</td>
                <td><?php echo $data['rw'];?></td>
              </tr>
              <tr>
                <td>Status Domisili</td>
                <td>:</td>
                <td><?php echo $data['status1'];?></td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><?php echo $data['tgl_lahir'];?></td>
              </tr>
              <tr>
                <td>Umur</td>
                <td>:</td>
                <td><?php echo $data['umur'];?></td>
              </tr>
              <tr>
                <td>Status Hidup</td>
                <td>:</td>
                <td><?php echo $data['status2'];?></td>
              </tr>
              <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td><?php echo $data['pekerjaan'];?></td>
              </tr>
            </table>

            
          </div>
        </div>
        <div class="my-4">
          <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=penduduk.index" class="btn px-5 py-2 float-start" role="button">Kembali</a>
        </div>
      
      <div class="card-header bg-white border-0">
        
          </div>
        </div>
      </div>
    </div>
      