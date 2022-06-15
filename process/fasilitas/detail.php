<style>
tr td:last-child {
    width: 1%;
    white-space: nowrap;
    text-align:left;
}
</style>

<div class="container">
  <div class="content p-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb"> 
        <li class="active" aria-current="page">
          <a href="?p=fasilitas.index" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;">
            Data Fasilitas
          </a>
        </li>
      </ol>
    </nav>
    <?php 

    $id  = $_GET['id'];
    $sql = "SELECT*FROM jenis_fasilitas WHERE idf = '$id' ";
    $res = $conn->query($sql);  
    $data = $res->fetch_assoc();
    ?>

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
          <div class="title ps-0" style="border-bottom: 2px solid #ff7f5c; width: 210px;">
          Daftar <?php echo $data['jenis']; ?>
          </div>
        </div>

        <div class="col-6">
          <a href="?p=fasilitas.add" class="btn float-end" style="background-color: #3734a9; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;">
            Tambah
          </a>
        </div>
      </div>

     <div class="row mt-4" style="margin-left: 40px; margin-right: 40px">
        <table id="datatablesSimple" style="border: transparent;">
            <thead style="background-color: #FF7F5C; color: white;font-family: Public Sans;font-size: 15px;line-height: 21px;text-align: left; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                <tr>
                    <th>No</th>
                    <th>Nama Fasilitas</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="background-color: #FBFBFB;">
                <?php 
                  $sql = "SELECT*FROM fasilitas a
                          LEFT JOIN jenis_fasilitas b ON (a.id_jenis=b.idf) 
                          WHERE a.id_jenis = '$id' ";
                  $res = $conn->query($sql);
                  foreach ($res as $row => $data) 
                  {
                    $no++;
                  ?>                 
                  <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td>
                      <a href="?p=fasilitas.detail2&id=<?php echo $data['id']; ?>" class="btn btn-sm" style="background-color: #3734a9"><i class="fa fa-search" style="color: #fff"></i></a>
                      <a href="?p=fasilitas.edit&id=<?php echo $data['id']; ?>" class="btn btn-sm" style="background-color: #e15b29"><span class="fa fa-pen text-white"></span></a>
                      <a href="?p=fasilitas.delete&id=<?php echo $data['id']; ?>&id_jenis=<?php echo $data['id_jenis']; ?>" onclick="return confirm('Anda yakin akan menghapus data fasilitas ini?')" class="btn btn-sm btn-danger" title="Delete Data"><span class="fa fa-trash"></span></a>
                    </td>
                  </tr>
                <?php
                  }
                ?>
            </tbody>
          </table>
          <div class="my-4">
            <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=fasilitas.index" class="btn px-5 py-2 float-start" role="button">Kembali</a>
          </div>
        </div>

      </div>

</div>
        