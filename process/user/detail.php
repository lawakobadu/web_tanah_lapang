
<div class="container">
  <div class="content p-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="active" aria-current="page">
          <a href="?p=user.index" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;">
            Admin
          </a>
        </li>
      </ol>
    </nav>  

    <div class="card shadow mb-5" style="box-shadow: 10px; border-radius: 10px; border: none">
      <div class="row mx-4 mt-4">
        <?php
       if ($_SESSION['status'] === '3')
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
          else if ($_SESSION['status'] === '4')
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
          else if ($_SESSION['status'] === '5')
          {
          ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= $_SESSION['pesan']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
      <?php 
            unset($_SESSION['status']);
            unset($_SESSION['pesan']);
          } 
          ?>
        <div class="col-6">
          <div class="title ps-0" style="border-bottom: 2px solid #ff7f5c; width: 120px">
          Detail Admin
          </div>
        </div>

        <?php 
        $id= $_GET['id'];
        $sql = "SELECT * FROM user WHERE id = '$id' LIMIT 1";
        $res = $conn->query($sql);
        $data = $res->fetch_assoc();
        ?>

       <div class="row  inline-block">
        <div class="row mx-4 mt-4">
          <div class="col-4" style="width:50px; float: left; width: 20%;padding: 10px;height: 220px;">
            <img src="assets/img/admin/<?php echo $data['foto'];?>" class="avaprofil" style="width:150px;height:150px; display: block; margin-right: auto; margin-left: auto;">
          </div>

          <div class="col-6" style="font-weight:500; margin:1px auto; float: left;padding: 10px;height: auto px;">
            <table class="table table-borderless" style="margin:1px auto; line-height:20px;">
              <tr>
                <td>Nama</td>
                <td>:</td>
                <td><?php echo $data['nama']; ?></td>
              </tr>
              <tr>
                <td>NIP</td>
                <td>:</td>
                <td><?php echo $data['nip']; ?></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><?php echo $data['jabatan']; ?></td>
              </tr>
              <tr>
                <td>No Hp</td>
                <td>:</td>
                <td><?php echo $data['nohp']; ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?php echo $data['alamat']; ?></td>
              </tr>
            </table>
          </div>
          <div class="col-2"></div>

        </div>
      </div>

      </div>
    </div>

    <div class="card shadow mb-5" style="box-shadow: 10px; border-radius: 10px; border: none">
      
     <div class="card-body">

          <div class="row">
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
          else if ($_SESSION['status'] === '2')
          {
          ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?= $_SESSION['pesan']; ?></strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
      <?php 
            unset($_SESSION['status']);
            unset($_SESSION['pesan']);
          } 
          ?>
            <div class="col-2 title ps-0 float-start" style=" border-bottom: 2px solid #ff7f5c; width: 140px; font-size: 15px; ">Ganti Kata Sandi
            </div>
          </div>  

      <div class="col mt-4">
        <form action="?p=user.action" id="defaultForm" method="post" enctype="">
          <input type="hidden" name="uname" value="<?php echo $data['uname']; ?>">
          <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="mb-3">
              <label class="form-label">Kata Sandi Lama</label>
                <input type="password"  name="pass1" class="password form-control" required="">
                
            </div>
            
            <div class="mb-3">
              <label class="form-label">Kata Sandi Baru</label>
                <input type="password"  name="pass2" class="password form-control" required="">
                
            </div>
              
            <div class="mb-3">
              <label class="form-label">Konfirmasi Kata Sandi</label>
                <input type="password"  name="cekpass" class="password form-control" required="">
                
            </div>
            <input type="checkbox" onchange="toogleInput(this)"> Lihat Kata Sandi
            <div class="my-4">
              <button type="submit" name="editpass" class="btn px-5 py-2 float-end" style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;"> Simpan
              </button>
              <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=user.index" class="btn px-5 py-2 float-start" role="button">Kembali</a>
            </div>
          </form>
          </div>

        </div>
      </div>
  
  <script>
  function toogleInput(e) {
    var list = document.getElementsByClassName('password');
    for (let item of list) {
    item.type = e.checked ? 'text' : 'password';
    }
  }
  </script>