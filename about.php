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
        <h1 style="font-size: 55px; padding-bottom:30px; padding-top: 20px;">ABOUT</h1>
      </div>
    </div>

    <!-- Konten -->
    <div class="konten">
      <div class="paragraf">
        <h4>PROFIL KELURAHAN</h4>
        <p><?php echo nl2br($data['desk']); ?></p> <br>

        <h4>KONTAK</h4>
        <div class="contact">
          <p><i class="fa-solid fa-tty fa-2x" style="padding-right: 10px; color:#E15B29;"></i><?php echo $data['nohp'];?></p>
          <P><i class="fa-brands fa-whatsapp fa-2x" style="padding-right: 10px; color: #E15B29;"></i><?php echo $data['whatsapp'];?></P>
          <p><i class="fa-brands fa-instagram fa-2x" style="padding-right: 10px; color: #E15B29;"></i> Kelurahan Tanah Lapang</p>
          <p><i class="fa-solid fa-envelope fa-2x" style="padding-right: 10px; color: #E15B29;"></i><?php echo $data['email'];?></p><br>
        </div>

        <h4>ALAMAT</h4>
        <p><i class="fa-solid fa-location-dot fa-2x" style="padding-right: 15px; color: #E15B29;"></i>Tanah Lapang, Lembah Segar, Sawahlunto, <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;West Sumatra </p>
        <div class="peta">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15958.144866406814!2d100.77679723523595!3d-0.6813465358070653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2b2f43abfff33f%3A0xe62705351ee946a7!2sTanah%20Lapang%2C%20Lembah%20Segar%2C%20Sawahlunto%2C%20West%20Sumatra!5e0!3m2!1sen!2sid!4v1651144666777!5m2!1sen!2sid" width="100%" height="500" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
    
    <!-- footer -->
    <?php include("footer.html"); ?> 
  </body>
</html>
