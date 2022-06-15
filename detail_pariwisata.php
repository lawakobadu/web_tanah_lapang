<?php
include "connect.php";
  $id_pariwisata = $_GET['id'];

  $sql2 = "SELECT * FROM pariwisata WHERE id = $id_pariwisata";
  $pariwisata2 = $conn->query($sql2);

  while($data2 = $pariwisata2 -> fetch_assoc()){
    $nama_wisata = $data2['nama_wisata'];
    $tempat = $data2['tempat'];
    $keterangan =  $data2['keterangan'];
  }

?>

<!DOCTYPE html>
<style>
  
</style>

<!-- navbar -->
  <?php include("navbar.php"); ?>

    <!-- Konten -->
  <!-- <div class="konten" style="margin-top:100px"> -->
  
  <div class="card shadow-sm mb-5" style="box-shadow: 10px; border-radius: 10px; border: none">
      <div class="row mt-4" style="margin-left: 10px; margin-right: 10px">
        <div class="card-body">
          <div class="col title ps-0"style="border-bottom: 2px solid #ff7f5c;width: 180px;font-size: 15px;">Halaman Detail Pariwisata
          </div>

         
          <div class="col mt-4">
            <h3 class="text-center" style=" font-weight: 700; color: #3734a9;"> <?php echo $nama_wisata?>
            </h3>
            <p class="text-center" style=" color: #ff7f5c; font-weight: 700; "><i class="bi bi-geo-alt-fill me-2"></i><?php echo $tempat?></p>
          </div>
        </div>
      </div>

       <div class="row justify-content-center">
     <?php 
      $sql = "SELECT * FROM pariwisata_gambar  INNER JOIN pariwisata
      ON pariwisata_gambar.id_pariwisata = pariwisata.id WHERE id_pariwisata = $id_pariwisata";
      $pariwisata = $conn->query($sql);
     while ($data = mysqli_fetch_assoc($pariwisata)) : 
     ?>
        <div class="col-6 p-3">
            <img src="assets/img/pariwisata/<?php echo $data['gambar'];?>" alt="" width="500px" class="d-block mx-auto row">
            
          </div>
          <?php endwhile;?>
      </div> 
                
      <div class="row p-5">
        <div class="col">
          <p style="text-align: justify">
            <?php echo nl2br($keterangan)?>
          </p>
          <div class="my-4">
        <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="pariwisata.php" class="btn px-5 py-2 float-start" role="button">Kembali</a>
      </div>
        </div>
      </div>
      
      
    </div>

  <!-- <div class="card shadow mb-5" style="box-shadow: 10px; border-radius: 10px; border: none; width: 90%;box-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
    border-radius: 10px; margin: 100px auto 34px auto;">
      <div class="row mt-4" style="margin-left: 10px; margin-right: 10px">
        <div class="card-body">
          <div class="col title ps-0"style="border-bottom: 2px solid #ff7f5c;width: 190px;font-size: 15px;">Halaman Detail Pariwisata
          </div>
          <div class="col mt-4">
            <h2 class="col title text-center" style="  font-weight: 700; color: #3734a9;"> <?php echo $nama_wisata?>
            </h2>
          </div>
        </div>
      </div>
      
      <div class="row justify-content-center">
        <div class="col-8">
            <img src="assets/img/pariwisata/<?php echo $gambar?>" alt="" width="80%" class="d-block mx-auto row"><br>
            <div class="row">
              <div class="col-6">
                <p class="float-start" style="font-weight: 700; margin-left: 75px;"><?php echo $tempat?></p>
              </div>
              <div class="col-6">
                
              </div>
          
        </div>
      </div>
                
      <div class="paragraf p-5">
            <div class="col">
              <p style="text-align: justify; ">
              <?php echo $ket ?>
            </p>
          </div>
          <div class="my-4">
          <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="pariwisata.php" class="btn px-5 py-2 float-start" role="button">Kembali</a>
        </div>
      </div>
      
      
    </div>
  </div> -->

  <!-- </div> -->
 
  <!-- footer -->
  <?php include("footer.html"); ?> 
</body>
</html>
            