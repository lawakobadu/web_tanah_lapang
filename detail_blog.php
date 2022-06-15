<?php
    include "connect.php";
    echo $id_blog = $_GET['id'];
    $sql = "SELECT * FROM blog WHERE id = $id_blog";
    $blog = $conn->query($sql);
    while($data = $blog -> fetch_assoc()){
      $judul = $data['judul'];
      $tanggal = $data['tanggal'];
      $author = $data['author'];
      $isi =  $data['isi'];
      $foto = $data['foto'];

      $isi2= nl2br($isi);
    }
?>

<!DOCTYPE html>
<style>
  p,a{
    font-family: 'Segoe UI',Roboto,'Helvetica Neue',Arial,'Noto Sans','Liberation Sans',sans-serif,'Apple Color Emoji','Segoe UI Emoji','Segoe UI Symbol','Noto Color Emoji';
  }
  .float-start, .float-end{
    color: #ff7f5c;
  }
  h3{
    color: #3734a9;
  }
 
</style>

<!-- navbar -->
  <?php include("navbar.php"); ?>

    <!-- banner -->
    <div class="bgimg container-fluid banner">
      <div class="container text-center">
        <h1 style="font-size: 55px; padding-bottom:30px; padding-top: 20px;">BLOG</h1>
      </div>
    </div>

    <!-- Konten -->
  <div class="konten">
    <div class="card-body">
        <div class=" title ps-0"style="border-bottom: 2px solid #ff7f5c;width: 150px;font-size: 15px;">Halaman Detail Blog
        </div><br>
          <h1 class="col title text-center" style="font-weight: 700;color: #3734a9;"> <?php echo $judul?></h1>
            <img src="assets/img/blog/<?php echo $foto?>" style="width: 85%; height: 100%; padding: 10px;" class="d-block mx-auto row"><br>
            <div class="row">
              <div class="col-6">
                <p class="float-start" style="font-weight: 700; margin-left: 100px;"><i class="fa fa-user"></i>&nbsp;<?php echo $author?></p>
              </div>
              <div class="col-6">
                <p class="float-end" style="font-weight: 700;padding: 5px;margin-right: 90px;"><i class="fa fa-calendar"></i>&nbsp;<?php echo date('l, d F Y', strtotime($tanggal))?></p>
              </div>
            </div>  

          <div class="paragraf row p-5">
            <div class="col">
              <p style="text-align: justify; ">
              <?php echo $isi2?>
            </p>
          </div>
          
      </div>

        <div class="my-4">
          <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="blog.php" class="btn px-5 py-2 float-start" role="button">Kembali</a>
        </div>
    </div>
      </div>
      

  </div>
  <!-- </div> -->
 
  <!-- footer -->
  <?php include("footer.html"); ?> 
</body>
</html>
