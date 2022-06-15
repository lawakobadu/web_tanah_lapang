<!DOCTYPE html>
<html lang="en">
<style>
.topnav {
  background-color: #0000;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: #000000;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 20px;
  font-weight: bold;
  font-family: Helvetica;
  border-bottom: 3px solid transparent;
}

.topnav a:hover {
  border-bottom: 3px solid #ff7f5c;
}

.topnav a.active {
  border-bottom: 3px solid #ff7f5c;
}

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
tr td:last-child {
    width: 1%;
    white-space: nowrap;
}
th {
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

    <!-- Konten -->
        <<div class="konten">
      <div class="card-body" style="box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25); border-radius: 10px;  font-weight: 700; font-size: 18px;line-height: 25px; color: #3734A9;">
        <div class="topnav">
            <a href="laporan_penduduk.php" class="active">Data Penduduk</a>
            <a href="fasilitas.php" class="active">Data Fasilitas</a>
                <br><br><br>      
            <div class="row mt-4" style="margin-left: 40px; margin-right: 40px">
            <center>
                <h3>DATA FASILITAS</h3>
                <h4>KELURAHAN TANAH LAPANG</h4>
           </center>
                <br>
            
            <div style="display: table-cell;overflow-x: auto;width: 100%;">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead">
                    <tr>
                    <th>No</th>
                    <th>Jenis Fasilitas</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="background-color: #FBFBFB;">
                <?php                

                $sql = "SELECT id_jenis, jenis, COUNT(*) as total FROM fasilitas a join jenis_fasilitas b on (a.id_jenis = b.idf) GROUP BY id_jenis";
                $res = $conn->query($sql);       
                $no = 0;

                foreach ($res as $row => $data) 
                {
                    $no++;
                ?>                     
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['jenis']; ?></td>
                  <td><?php echo $data['total']; ?></td>
                  <td>
                    <a href="fasilitas_detail.php?id=<?php echo $data['id_jenis']; ?>" class="btn btn-sm" style="background-color: #3734a9"><i class="fa fa-search" style="color: #fff"></i></a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
        </div>
    </div>
</div>
</div>
</div>




  <!-- footer -->
  <?php include("footer.html"); ?> 
</body>
</html>
