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
          <a href="?p=blog.index" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;">
            Blog
          </a>
        </li>
      </ol>
    </nav>

  <div class="row mt-4" style="margin-left: 10px; margin-right: 10px">
      <?php
       if ($_SESSION['status'] === '0')
          {
          ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><?= $_SESSION['pesan']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
      <?php 
            unset($_SESSION['status']);
            unset($_SESSION['pesan']);
          } 
          else if ($_SESSION['status'] === '1')
          {
          ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><?= $_SESSION['pesan']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
      <?php 
            unset($_SESSION['status']);
            unset($_SESSION['pesan']);
          } 
          ?>

    <div class="card shadow-sm mb-5" style="box-shadow: 10px; border-radius: 10px; border: none">
      <div class="card-body">
        <div class="row">
            <div class="col-2 title ps-0 float-start" style=" border-bottom: 2px solid #ff7f5c; width: 200px; font-size: 15px; "> Form Edit Blog
            </div>
          </div>
        <div class="col mt-4">
          <form action="?p=blog.action" id="defaultForm" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="hidden" class="form-control" name="id" value="<?php echo $id_blog?>" required/>
            </div>
            <div class="mb-3">
              <label for="judulBlog" class="form-label">Judul Blog</label>
                <input type="text" class="form-control" id="judulBlog" name="judul" value="<?php echo $judul?>" required/>
            </div>
            <div class="mb-3">
              <label for="tanggal" class="form-label">Tanggal</label>
                <input type="text" class="form-control" id="tanggal" name="tanggal" value="<?php echo $tanggal?>" readonly required/>
            </div>
            <div class="mb-3">
              <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" value="<?php echo $author?>" readonly required/>
            </div>
            <div class="mb-3">
              <label for="foto" class="form-label">Foto</label>
               <div class="mb-3">
              <img src="assets/img/blog/<?php echo $foto?>" width="200px"><br><br></div>
              <input class="form-control" id="foto" type="file" name="foto"/>
            </div>
            <div class="mb-3">
              <label for="isi" class="form-label">Isi</label>
              <textarea class="form-control" id="isi" rows="20" name="isi" required><?php echo $isi;?></textarea>
            </div>
            <div class="my-4">
              <button type="submit" name="edit" class="btn px-5 py-2 float-end" style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;"> Simpan
              </button>
              <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=blog.index" class="btn px-5 py-2 float-start" role="button">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
            