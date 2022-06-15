<style>
  
tr td:last-child {
    width: 1%;
    white-space: nowrap;
}
th {
    text-align: center;
}
</style>
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
      <div class="row mx-4 mt-5">
        <div class="col-6">
          <div class="title ps-0" style="border-bottom: 2px solid #ff7f5c; width: 85px">
          Daftar Blog
          </div>
        </div>

        <div class="col-6">
          <a href="?p=blog.add" class="btn float-end" style="background-color: #3734a9; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;">
            Tambah
          </a>
        </div>
      </div>

      <div class="row mt-4" style="margin-left: 40px; margin-right: 40px">
        <table id="datatablesSimple" class="table table-borderless" style="border: transparent">
          <thead style="background-color: #ff7f5c; color: #fff; font-size: 14px;height: 50px;" class="shadow-sm align-middle">
            <tr>
              <th scope="col" style="border-radius: 3px 0 0 3px"> No.</th>
              <th scope="col"> Judul Blog</th>
              <th scope="col">Tanggal</th>
              <th scope="col">Author</th>
              <th scope="col" width="35%">Isi</th>
              <th scope="col" style="border-radius: 0 3px 3px 0"> Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $no = 1;
            $sql = "SELECT * FROM blog";
            $blog = $conn->query($sql);
            while($data = $blog -> fetch_assoc()){
          ?>
            <tr>
              <td><?php echo $no++?></td>
              <td><?php echo $data['judul']?></td>
              <td><?php echo date('d F Y', strtotime($data['tanggal']));?></td>
              <td><?php echo $data['author']?></td>
              <td><?php echo $data['isi']?></td>
              <td>
                  <form action="?p=blog.action" id="defaultForm" method="post" enctype="multipart/form-data">
                    <a href="?p=blog.detail&id=<?php echo $data['id']?>" class="btn btn-sm" style="background-color: #3734a9"><i class="fa fa-search" style="color: #fff"></i></a>
                    <a href="?p=blog.edit&id=<?php echo $data['id']?>" class="btn btn-sm" style="background-color: #e15b29"><i class="fa fa-pen" style="color: #fff"></i></a>
                    <input type="hidden" name="aksi" value="hapus">
                    <input type="hidden" name="id" value="<?php echo $data['id'];?>">
                    <button class="btn btn-sm btn-danger" type="submit" name="delete" onclick="return confirm('Anda yakin akan menghapus data blog ini?')"><i class="fa fa-trash"></i></button>
                  </form>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
       