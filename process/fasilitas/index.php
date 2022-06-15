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
          <a href="?p=fasilitas.index" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;">
            Data Fasilitas
          </a>
        </li>
      </ol>
    </nav>

    <div class="card shadow mb-5" style="box-shadow: 10px; border-radius: 10px; border: none">
      <div class="row mx-4 mt-5">
        <div class="col-6">
          <div class="title ps-0" style="border-bottom: 2px solid #ff7f5c; width: 110px;">
          Daftar Fasilitas
          </div>
        </div>
      </div>

     <div class="row mt-4" style="margin-left: 40px; margin-right: 40px">
        <table id="datatablesSimple" style="border: transparent;">
            <thead style="background-color: #FF7F5C; color: white;font-family: Public Sans;font-size: 15px;line-height: 21px;text-align: left; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                <tr>
                    <th>No</th>
                    <th>Jenis Fasilitas</th>
                    <th>Jumlah</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody style="background-color: #FBFBFB;">
                <?php                

                $sql = "SELECT id_jenis, jenis, COUNT(*) as total FROM fasilitas a join jenis_fasilitas b on (a.id_jenis = b.idf) GROUP BY id_jenis";
                $res = $conn->query($sql);       
                $no = 0;

                foreach ($res as $row => $data) 
                {
                    $no++;
                ?>                     
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['jenis']; ?></td>
                  <td><?php echo $data['total']; ?></td>
                  <td>
                    <a href="?p=fasilitas.detail&id=<?php echo $data['id_jenis']; ?>" class="btn btn-sm" style="background-color: #3734a9"><i class="fa fa-search" style="color: #fff"></i></a>
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
        