

<div class="container">
    <div class="content p-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="me-3">
                <a href="" class="btn btn-sm" style="font-weight: bold; font-size: 13px; color: #404444"> Konten
                </a>
            </li>
        
            <li class="active" aria-current="page">
                <a href="" class="btn btn-title shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;"> Profil Kelurahan
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
                  <div class="col-2 title ps-0 float-start" style="border-bottom: 2px solid #ff7f5c; width: 75px;font-size: 15px;">Visi-Misi
                        </div>

                    </div>

                    <div class="row">
                      <div class="col mt-4">
                        <form action="?p=visi-misi.action" id="defaultForm" method="post" enctype="">
                          <div class="mb-3">
                            <label for="visi" class="form-label">Visi</label>
                            <textarea class="form-control" rows="5" id="visi" name="visi" required=""><?php echo $data['visi'];?></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="misi" class="form-label">Misi</label>
                            <textarea class="form-control" rows="10" id="misi" name="misi" required=""><?php echo $data['misi'];?></textarea>
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
            