<?php include("navbar.php"); ?>

<!-- banner -->
<div class="bgimg container-fluid banner">
      <div class="container text-center">
        <h1 style="font-size: 55px; padding-bottom:30px; padding-top: 20px;">ORGANISASI KELURAHAN</h1>
      </div>
    </div>

<!-- Konten -->

<?php
require_once('connect.php');
$sql = "SELECT * FROM organisasi";
$organisasi = $conn->query($sql);
while ($data = $organisasi->fetch_assoc()) {
?>

   <div class="konten">
      <div>
                <img src="assets/img/organisasi/<?php echo $data['foto'] ?>" style="width: 300px; padding: 10px 10px 2px 10px;">
                <div style="display: flex; ">
                    <h3 style="
                        width: 300px;
                  height: 40px;
                  left: 123px;
                  top: 133px;
                  font-style: normal;
                  font-weight: 700;
                  font-size: 15px;
                  line-height: 130%;
                  letter-spacing: 0.01em;
                  color: #3734A9;
                  padding-top: 10px;
                  padding-left: 10px;  text-align: left;"><?php echo $data['nama'] ?></h3>
                    

                </div>
            </div>
            <div class="container-fluid">
                <p style="padding-top: 4px; text-align: justify;"><?php echo substr($data['deskripsi'], 0, 500)?>... </p>
                <a href="detail_organisasi.php?id=<?php echo $data['id'] ?>" role="button" class="btn" style="border-left-width: 15px; border-right-width: 15px;border-width: 1px; margin-bottom:15px;
              font-size: 12px;"> 
                  Baca Selengkapnya
              </a>
                <!-- <i class="fa fa-eye" style=" color:grey; text-align: right; width: 100%;"> 110</i> -->
                <br>


            </div>
        </div>
    </div>


<?php } ?>


<?php include("navbar.html"); ?>
<?php include("footer.html"); ?>   

</html>