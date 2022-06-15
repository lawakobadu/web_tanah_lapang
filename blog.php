<!DOCTYPE html>
<html lang="en">
<!-- navbar -->
<style>
    a {
  text-decoration: none !important;
}
</style>
  <?php include("navbar.php"); ?>

    <!-- banner -->
    <div class="bgimg container-fluid banner">
      <div class="container text-center">
        <h1 style="font-size: 55px; padding-bottom:30px; padding-top: 20px;">BLOG</h1>
        <!-- <img src="images/cover.jpg"> -->
        <!-- <a href="#getstarted"> 
          <button type="button" class="btn" style="border-left-width: 25px; border-right-width: 25px;">Get Sarted </button>
        </a> -->
      </div>
    </div>

    <?php
   
      include "connect.php";
      $sql = "SELECT * FROM blog order by tanggal";
      $blog = $conn->query($sql);
      while($data = $blog -> fetch_assoc()){
    ?>
    <div class="konten">
      <div>
          <img  src="assets/img/blog/<?php echo $data['foto']?>" style="width: 300px; height:200px; padding: 10px 10px 2px 10px;" > 
          <div class="row">
            <div class="col-5">
                <p style=" 
          font-style: normal;
          font-weight: 700;
          font-size: 13px;
          line-height: 19px;
          letter-spacing: 0.01em;
          padding: 10px;
          color: #E15B29;  text-align: left; padding-right: 10px;"><i class="fa fa-user" aria-hidden="true" ></i>&nbsp;<?php echo $data['author'];?></p>
            </div>
            <div class="col-7">
                <p style=" 
          font-style: normal;
          font-weight: 700;
          font-size: 13px;
          line-height: 19px;
          letter-spacing: 0.01em;
          padding-top: 10px;
          color: #E15B29;  text-align: right; padding-right: 10px;"><i class="fa fa-calendar" aria-hidden="true" ></i>&nbsp;<?php echo date('l, d F Y',strtotime($data['tanggal']))?></p>
            </div>
              
          </div>    
      </div>
      <div class="container-fluid">   
        <h3 style="color: #3734a9;"><?php echo $data['judul']; ?></h3>
                          
          <p style="padding-top: 4px;"><?php echo substr($data['isi'], 0, 500)?>...</p>
          <a href="detail_blog.php?id=<?php echo $data['id']?>" role="button" class="btn" style="border-left-width: 15px; border-right-width: 15px;border-width: 1px; margin-bottom:15px;
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
