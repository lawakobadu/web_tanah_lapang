<?php     
    
    $sql = "SELECT * FROM profil WHERE id = 1 LIMIT 1";
    $res = $conn->query($sql);
    $data = $res->fetch_assoc();
?>

    <!-- About -->
    <div class="container-fluid py-5">
      <div class="container">
          <div class="row align-items-center pb-1">
              <div class="col-lg-5 mt-lg-4">
                  <img class="img-thumbnail p-3" src="assets/img/kantorlurah.jpg" alt="">
              </div>
              <div class="col-lg-6 mt-5 mb-5 mt-lg-5  mx-auto" >
                  <small class="jdl-profil-kelurahan">PROFIL KELURAHAN</small>
                  <h1 class="jdl-pk-2 mt-2 mb-4 " >Kelurahan Tanah Lapang, Lembah Segar, Sawah Lunto</h1>
                  <p class="detail-pk mb-4" ><?php echo $data['desk']; ?></p>
                  
              </div>
          </div>
      </div>
  </div>
  <!-- About End -->

  