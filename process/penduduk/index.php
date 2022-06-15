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
        <li class="active" aria-current="page">
          <a href="?p=penduduk.index" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;">
            Data Penduduk
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
          <div class="title ps-0" style="border-bottom: 2px solid #ff7f5c; width: 150px">
          Daftar Penduduk
          </div>
        </div>

        <div class="col-6">
          <!-- <input type="button" onclick="printDiv('printableArea')" value="Cetak" class="btn btn-success float-end" style="font-size: 14px; font-weight: bold; border-radius: 10px;"> -->
          <a href="?p=penduduk.laporan-penduduk" class="btn float-end" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;">Lihat Laporan</a>
          <a href="?p=penduduk.add" class="btn float-end" style="background-color: #3734a9; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; margin-right: 10px;">
            Tambah
          </a>
        </div>
      </div>

      <div class="row mt-4" style="margin-left: 40px; margin-right: 40px">
        <table id="datatablesSimple" style="border: transparent;">
            <thead style="background-color: #FF7F5C; color: white;font-family: Public Sans;font-size: 15px;line-height: 21px;text-align: left; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                <tr>
                    <th>No</th>
                    <th>Nama Penduduk</th>
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>RT</th>
                    <th>Jenis Kelamin</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="background-color: #FBFBFB;">
                <?php                

                $sql = "SELECT *FROM penduduk a
                       JOIN jk b ON (a.id_jk=b.id_jk) 
                        JOIN rt c ON (a.id_rt=c.id_rt) ORDER BY a.id DESC
                        ";
                $res = $conn->query($sql);       
                $no = 0;

                foreach ($res as $row => $data) 
                {
                    $no++;
                ?>                     
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['nik']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['rt']; ?></td>
                <td><?php echo $data['jenis']; ?></td>

                <td>

                <a href="?p=penduduk.detail&id=<?php echo $data['id']; ?>" class="btn btn-sm" style="background-color: #3734a9"><i class="fa fa-search" style="color: #fff"></i></a>
                <a href="?p=penduduk.edit&id=<?php echo $data['id']; ?>" class="btn btn-sm" style="background-color: #e15b29"><span class="fa fa-pen text-white"></span></a>
                <a href="?p=penduduk.delete&id=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin menghapus data penduduk?')" class="btn btn-sm btn-danger" title="Delete Data"><span class="fa fa-trash"></span></a>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</div>

</div>
</div>
</div>
                