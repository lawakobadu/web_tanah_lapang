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
  <?php include("whatsapplink.php"); ?>

    <!-- banner -->
    <div class="bgimg container-fluid banner">
      <div class="container text-center">
        <h1 style="font-size: 55px; padding-bottom:30px; padding-top: 20px;">VISI & MISI</h1>
      </div>
    </div>

    <!-- Konten -->
    <div class="konten">
      <div class="paragraf">
        <h4>VISI</h4>
        <p><?php echo nl2br($data['visi']);?></p>
        <h4>MISI</h4>
        <p><?php echo nl2br($data['misi']);?></p>
      </div>
    </div>
    
   <!-- footer -->
    <?php include("footer.html"); ?>   
   
  </body>
</html>
