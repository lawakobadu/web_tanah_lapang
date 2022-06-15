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
            About
          </a>
        </li>
      </ol>
    </nav>

   <div class="row mt-4" style="margin-left: 10px; margin-right: 10px">
      <?php 
          $sql = "SELECT * FROM profil WHERE id=1";
          $res = $conn->query($sql);
          $data = $res -> fetch_assoc();
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
          } ?>
          
      <div class="card shadow mb-5" style="box-shadow: 10px; border-radius: 10px; border: none">
        <div class="card-body">
          <div class="row">
            <div class="col-2 title ps-0 float-start" style=" border-bottom: 2px solid #ff7f5c; width: 130px; font-size: 15px; ">Form Edit About
            </div>
          </div>   
          <div class="col mt-4">
          <form action="?p=about.action" id="defaultForm" method="post" enctype="">
            <div class="mb-3">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $data['alamat']; ?>" required/>
            </div>
            <div class="mb-3">
              <label for="nohp" class="form-label">No. HP / Telepon</label>
              <input type="number" class="form-control" id="nohp" name="nohp" value="<?php echo $data['nohp']; ?>" required/>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>" required />
            </div>
            <div class="mb-3">
              <label for="whatsapp" class="form-label">WhatsApp</label>
                <input type="number" class="form-control" id="whatsapp" name="whatsapp" value="<?php echo $data['whatsapp']; ?>" required/>
            </div>
            <div class="mb-3">
            <label for="desk" class="form-label">Deskripsi Kelurahan</label>
              <textarea class="form-control" id="desk" rows="20" name="desk" value="" required><?php echo $data['desk']; ?></textarea>
          </div>
            <div class="my-4">
              <button type="submit" name="edit" class="btn px-5 py-2 float-end" style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;"> Simpan
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
        