<!DOCTYPE html>
<html lang="en">
<style>
.table {
    border-collapse: collapse;
    width: 100%;
    margin: 25px 0; 
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    font-size: 14px;
    
}

.thead {
    background-color: #FF7F5C; 
    color: #ffffff;
    text-align: center; 
   
}

</style>
  <!-- navbar -->
  <?php 
  require_once ('connect.php');
  include("navbar.php"); ?>

    <!-- banner -->
    <div class="bgimg container-fluid banner">
      <div class="container text-center">
        <h1 style="font-size: 55px; padding-bottom:30px; padding-top: 20px;">DATA PENDUDUK & FASILITAS</h1>
      </div>
    </div>

    <?php 

    $id  = $_GET['id'];
   
    $sql = "SELECT*FROM jenis_fasilitas WHERE idf = '$id' ";
    $res = $conn->query($sql);  
    $data = $res->fetch_assoc();
    ?>

    <!-- Konten -->
        <div class="konten">
        <div class="card-body" style="box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25); border-radius: 10px;  font-weight: 700; font-size: 18px;line-height: 25px; color: #3734A9;">       
            <div class="row mt-4" style="margin-left: 40px; margin-right: 40px">
            <center>
                <h3>DATA FASILITAS</h3>
                <h4><?php echo $data['jenis'];?></h4>                
                 <h4>KELURAHAN TANAH LAPANG</h4>
           </center>
                <br>
            
            <div style="display: table-cell;overflow-x: auto;width: 100%;">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead">
                    <tr>
                    <th>No</th>
                    <th>Gambar Fasilitas</th>
                    <th>Nama Fasilitas</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody style="background-color: #FBFBFB;">
                <?php 
                  $sql = "SELECT*FROM fasilitas a
                          LEFT JOIN jenis_fasilitas b ON (a.id_jenis=b.idf) 
                          WHERE a.id_jenis = '$id' ";
                  $res = $conn->query($sql);
                  foreach ($res as $row => $data) 
                  {
                    $no++;
                  ?>                 
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><img src="assets/img/fasilitas/<?php echo $data['foto'];?>" width="100" height="80"></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                  </tr>
                <?php
                  }
                ?>
            </tbody>
          </table>
          <div class="my-4">
          <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="fasilitas.php" class="btn  float-start" role="button">Kembali</a><br>
        </div>
        </div>
    </div>
</div>
</div>
</div>




  <!-- footer -->
  <?php include("footer.html"); ?> 
</body>
</html>
