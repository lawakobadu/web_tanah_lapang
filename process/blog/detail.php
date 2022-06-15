<?php 
  $id_blog = $_GET['id'];
  $sql = "SELECT * FROM blog WHERE id = $id_blog";
  $blog = $conn->query($sql);
  while($data = $blog -> fetch_assoc()){
    $judul = $data['judul'];
    $tanggal = $data['tanggal'];
    $author = $data['author'];
    $isi =  $data['isi'];
    $foto = $data['foto'];
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
          <a href="?p=organisasi.index" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;">
            Organisasi
          </a>
        </li>
      </ol>
    </nav>
    
    <div class="card shadow mb-5" style="box-shadow: 10px; border-radius: 10px; border: none">
      <div class="row mt-4" style="margin-left: 10px; margin-right: 10px">
        <div class="card-body">
          <div class="col title ps-0"style="border-bottom: 2px solid #ff7f5c;width: 190px;font-size: 15px;">Halaman Detail Organisasi
          </div>
          <div class="col mt-4">
            <h2 class="text-center" style=" font-weight: 700; color: #3734a9;"> <?php echo $judul?>
            </h2>
            <p class="text-center" style=" color: #ff7f5c; font-weight: 500; "><i class="bi bi-geo-alt-fill me-2"></i><?php echo $author?>
            <p class="text-center" style=" color: #ff7f5c; font-weight: 500; "><i class="bi bi-geo-alt-fill me-2"></i><?php echo $tanggal?></p>
          </div>
        </div>
      </div>
      
      <div class="row justify-content-center">
        <div class="col-8">
            <img src="assets/img/blog/<?php echo $foto?>" alt="" width="500px" class="d-block mx-auto row">
            
          </div>
      </div>
                
      <div class="row p-5">
        <div class="col">
          <p style="text-align: justify">
            <?php echo nl2br($isi)?>
          </p>
          <div class="my-4">
        <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=blog.index" class="btn px-5 py-2 float-start" role="button">Kembali</a>
      </div>
        </div>
      </div>
      
      
    </div>
