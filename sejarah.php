<?php
require_once ('connect.php');
$sql = "SELECT * FROM profil WHERE id=1";
$res = $conn->query($sql);
$data = $res -> fetch_assoc();
?>

<!DOCTYPE html>
<!-- navbar -->
  <?php include("navbar.php"); ?>

    <!-- banner -->
  <div class="bgimg container-fluid banner">
    <div class="container text-center">
      <h1 style="font-size: 55px; padding-bottom:30px; padding-top: 20px;">SEJARAH</h1>
    </div>
  </div>

    <!-- Konten -->
  <div class="konten">
    <div class="paragraf">
      <h4>SEJARAH</h4>
      <p style="white-space: pre-line"><?php echo $data['sejarah'];?></p>
    </div>
  </div>
 
  <!-- footer -->
  <?php include("footer.html"); ?> 
</body>
</html>
