<?php 
  $id_pariwisata = $_GET['id'];

  $sql2 = "SELECT * FROM pariwisata WHERE id = $id_pariwisata";
  $pariwisata2 = $conn->query($sql2);

  while($data2 = $pariwisata2 -> fetch_assoc()){
    $nama_wisata = $data2['nama_wisata'];
    $tempat = $data2['tempat'];
    $keterangan =  $data2['keterangan'];
  }

?>

<div class="container">
  <div class="content p-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="me-3">
          <a href="#" class="btn btn-sm" style="font-weight: bold; font-size: 13px; color: #404444">
            Konten
          </a>
        </li>
        
        <li class="active" aria-current="page">
          <a href="?p=pariwisata.index" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;">
            Pariwisata
          </a>
        </li>
      </ol>
    </nav>
    
    <div class="card shadow-sm mb-5" style="box-shadow: 10px; border-radius: 10px; border: none">
      <div class="row mt-4" style="margin-left: 10px; margin-right: 10px">
        <div class="card-body">
          <div class="col title ps-0"style="border-bottom: 2px solid #ff7f5c;width: 180px;font-size: 15px;">Halaman Detail Pariwisata
          </div>

         
          <div class="col mt-4">
            <h3 class="text-center" style=" font-weight: 700; color: #3734a9;"> <?php echo $nama_wisata?>
            </h3>
            <p class="text-center" style=" color: #ff7f5c; font-weight: 700; "><i class="bi bi-geo-alt-fill me-2"></i><?php echo $tempat?></p>
          </div>
        </div>
      </div>

       <div class="row justify-content-center">
     <?php 
      $sql = "SELECT * FROM pariwisata_gambar  INNER JOIN pariwisata
      ON pariwisata_gambar.id_pariwisata = pariwisata.id WHERE id_pariwisata = $id_pariwisata";
      $pariwisata = $conn->query($sql);
     while ($data = mysqli_fetch_assoc($pariwisata)) : 
     ?>
        <div class="col-6 p-3">
            <img src="assets/img/pariwisata/<?php echo $data['gambar'];?>" alt="" width="500px" class="d-block mx-auto row">
            
          </div>
          <?php endwhile;?>
      </div> 
                
      <div class="row p-5">
        <div class="col">
          <p style="text-align: justify">
            <?php echo nl2br($keterangan)?>
          </p>
          <div class="my-4">
        <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=pariwisata.index" class="btn px-5 py-2 float-start" role="button">Kembali</a>
      </div>
        </div>
      </div>
      
      
    </div>
            