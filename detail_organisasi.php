<!DOCTYPE html>
<html lang="en">

<?php include("navbar.php"); ?>
<!-- banner -->
<div class="bgimg container-fluid banner">
      <div class="container text-center">
        <h1 style="font-size: 55px; padding-bottom:30px; padding-top: 20px;">ORGANISASI KELURAHAN</h1>
      </div>
    </div>

<!-- Konten -->
<div class="konten">
    <?php
    require_once('connect.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM organisasi WHERE id='$id'";
    $organisasi = $conn->query($sql);
    while ($data = $organisasi->fetch_assoc()) {
    ?>

        <div class=" container-fluid">
            <div class="paragraf">
                <h4 style=" color: #3734A9;">
                    <?php echo $data['nama'] ?>
                </h4>
                <a>Nama Ketua : </a> <a><?php echo $data['ketua'] ?></a>
                <br>
                <br>

                <div class="row">
                    <div class="col-8">
                    <p style="text-align: justify"><?php echo nl2br($data['deskripsi']) ?></p>
                </div>
                <div class="float-end col-4 ">
                    <img src="assets/img/organisasi/<?php echo $data['foto'] ?>" alt="" style="width: 100%" >
                </div>
                
            </div>
            <div class="my-4">
          <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="organisasi.php" class="btn px-5 py-2 float-start" role="button">Kembali</a><br>
        </div>
     
    </div>
            </div>


        </div>
    <?php } ?>

</div>

<?php include("footer.html"); ?>
</body>

</html>