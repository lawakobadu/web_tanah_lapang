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
          <a href="?p=organisasi.index" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;">
            Organisasi
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

     <div class="card shadow mb-5" style="box-shadow: 10px; border-radius: 10px; border: none">
      <div class="row mx-4 mt-5">
        <div class="col-6">
          <div class="title ps-0" style="border-bottom: 2px solid #ff7f5c; width: 130px">
          Daftar Organisasi
          </div>
        </div>

        <div class="col-6">
          <a href="?p=organisasi.add" class="btn float-end" style="background-color: #3734a9; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;">
            Tambah
          </a>
        </div>
      </div>

        <div class="row mt-4" style="margin-left: 40px; margin-right: 40px">
          <table id="datatablesSimple" style="border: transparent;">
            <thead style="background-color: #FF7F5C; color: white;font-family: Public Sans;font-size: 15px;line-height: 21px;text-align: left; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
              <tr>
                <th>No.</th>
                <th>Nama Organisasi</th>
                <th>Nama Ketua</th>
                
                <th>Action</th>
              </tr>
            </thead>
            <tbody style="background-color: #FBFBFB;">
              <?php
              $no = 0;
              $sql = "SELECT * FROM organisasi";
              $organisasi = $conn->query($sql);
              while ($data = $organisasi->fetch_assoc()) {
                $no++;
              ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['nama'] ?></td>
                  <td><?php echo $data['ketua'] ?></td>
                  
                  <td>
                    <form action="?p=organisasi.action" id="defaultForm" method="post" enctype="multipart/form-data">
                      <a href="?p=organisasi.detail&id=<?php echo $data['id'] ?>" class="btn btn-sm" style="background-color: #3734a9"><i class="fa fa-search" style="color: #fff"></i></a>
                      <a href="?p=organisasi.edit&id=<?php echo $data['id'] ?>" class="btn btn-sm" style="background-color: #e15b29"><i class="fa fa-pen" style="color: #fff"></i></a>
                      <input type="hidden" name="aksi" value="hapus">
                      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                      <button class="btn btn-sm btn-danger" type="submit" name="delete" onclick="return confirm('Anda yakin akan menghapus data organisasi ini?')"><i class="fa fa-trash"></i></button>
                      
                    </form>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>