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
          <a href="?p=user.index" class="btn btn-sm shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;">
            Admin
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
        <div class="card-body">
          <div class="row">
            <div class="col-2 title ps-0 float-start" style=" border-bottom: 2px solid #ff7f5c; width: 130px; font-size: 15px; ">Form Edit About
            </div>
            <div class="col-10">
              <a href="?p=user.add" class="btn float-end" style="background-color: #3734a9; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;">Tambah
              </a>
            </div>
        </div>

        <div class="col mt-4">
          <table id="datatablesSimple" style="border: transparent;">
             <thead style="background-color: #FF7F5C; color: white;font-family: Public Sans; font-size: 15px; line-height: 21px; text-align: center; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
            <tr >
                <th style="text-align: center">Nama</th>
                <th style="text-align: center">No HP</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
          </thead> 
          <tbody style="background-color: #FBFBFB;">
          <?php                

                $sql = "SELECT *FROM user ORDER BY id DESC";
                $res = $conn->query($sql);       
                $no = 0;

                foreach ($res as $row => $data) 
                {
                    $no++;
                ?>    
              <tr>
                <td><?php echo $data['nama'];?></td>
                <td><?php echo $data['nohp'];?></td>
                <td><?php echo $data['role'];?></td>
                <td style="align-content: center;">
                    <a href="?p=user.detail&id=<?php echo $data['id'];?>" class="btn btn-sm" style="background-color: #3734a9"><i class="fa fa-search" style="color: #fff"></i></a>
                    <a href="?p=user.edit&id=<?php echo $data['id'];?>"class="btn btn-sm" style="background-color: #e15b29"><i class="fa fa-pen" style="color: #fff"></i></a>
                    <a href="?p=user.delete&id=<?php echo $data['id'];?>" class="btn btn-sm btn-danger" name="delete" onclick="return confirm('Anda yakin akan menghapus admin ini?')"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
          <?php } ?>
        </tbody>
    </table>
</div>
</div>
</div>
                        