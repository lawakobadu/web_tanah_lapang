<?php
require_once ('connect.php');
$sql = "SELECT * FROM profil WHERE id=1";
$res = $conn->query($sql);
$data = $res -> fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
  <!-- navbar -->
  <?php include("navbar.php"); ?>

    <!-- banner -->
    <div class="bgimg container-fluid banner">
      <div class="container text-center">
        <h1 style="font-size: 55px; padding-bottom:30px; padding-top: 20px;">STRUKTUR ORGANISASI </h1>
      </div>
    </div>

    <!-- Konten --> 
    <div class="konten">
      <div class="paragraf">
        <h4>STRUKTUR ORGANISASI</h4>
        <picture>
          <!-- <source media="(min-width: 600px)" srcset="/img/Struktur.png">
     <source media="(min-width: 450px)" srcset="/img/Struktur.png"> -->
     <img src="assets/img/<?php echo $data['struktur'];?>" style="width:auto;">
        </picture>
      </div>
    </div>
   
       
    <!-- footer -->
    <?php include("footer.html"); ?>  

  </body>
</html>
