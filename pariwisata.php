<!DOCTYPE html>
<html lang="en">
<!-- navbar -->
  <?php include("navbar.php"); ?>

    <!-- banner -->
    <div class="bgimg container-fluid banner">
      <div class="container text-center">
        <h1 style="font-size: 55px; padding-bottom:30px; padding-top: 20px;">PARIWISATA</h1>
          
        <!-- <a href="#getstarted"> 
          <button type="button" class="btn" style="border-left-width: 25px; border-right-width: 25px;">Get Sarted </button>
        </a> -->
      </div>
    </div>

    <?php
      include "connect.php";
      $sql = "SELECT * FROM pariwisata INNER JOIN pariwisata_gambar ON pariwisata.id = pariwisata_gambar.id_pariwisata GROUP BY pariwisata.id";
      $pariwisata = $conn->query($sql);
      while($data = $pariwisata -> fetch_assoc()){
    ?>
    <div class="konten">
      <div>
          <img  src="assets/img/pariwisata/<?php echo $data['gambar']?>" style="width: 300px; height:200px; padding: 10px 10px 2px 10px;" > 
          <div style="display: flex; ">
          <h3  style=" 
                  width: 150px;
                  height: 40px;
                  left: 123px;
                  top: 133px;
                  font-style: normal;
                  font-weight: 700;
                  font-size: 14px;
                  line-height: 130%;
                  letter-spacing: 0.01em;
                  color: #3734A9;
                  padding-top: 10px;
                  padding-bottom: 3px;
                  padding-left: 10px;  text-align: left;"><?php echo $data['nama_wisata']?></h3>
          <p style=" 
          font-style: normal;
          font-weight: 600;
          font-size: 13px;
          line-height: 19px;
          letter-spacing: 0.01em;
          padding-top: 10px;
          color: #E15B29; width: 150px; text-align: right; padding-right: 10px;"><i class="bi bi-geo-alt me-2" aria-hidden="true" ></i><?php echo $data['tempat']?></p>
          
          </div>
      </div>
     
           <div class="container-fluid">    
              <p style="padding-top: 4px;text-align: justify;"><?php echo substr($data['keterangan'], 0, 500)?>... </p>
              <a href="detail_pariwisata.php?id=<?php echo $data['id']?>" role="button" class="btn" style="border-left-width: 15px; border-right-width: 15px;border-width: 1px; margin-bottom:15px;
              font-size: 12px;"> 
                  Baca Selengkapnya
              </a>
      </div> 
    </div>
    <?php } ?>

   <!-- footer -->
    <?php include("footer.html"); ?>   
   
  </body>
</html>
