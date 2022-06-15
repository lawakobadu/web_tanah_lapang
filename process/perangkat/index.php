<?php
$sql = "SELECT * FROM profil WHERE id=1";
$res = $conn->query($sql);
$data = $res -> fetch_assoc();
?>

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
      <div class="card shadow mb-5" style="box-shadow: 10px; border-radius: 10px; border: none">
        <div class="card-body">
          <div class="row">
            <div class="col-2 title ps-0 float-start" style=" border-bottom: 2px solid #ff7f5c; width: 160px; font-size: 15px; ">
                Perangkat Kelurahan
              </div>
            </div>

           
            <div class="col mt-4">
              <form action="?p=perangkat.action" id="defaultForm" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="lurah" class="form-label">Lurah</label>
                  <input class="form-control" id="lurah" name="foto_lurah" type="file" required/>
                </div>

                <div class="mb-3">
                  <label for="sekretaris" class="form-label">Sekretaris</label>
                  <input class="form-control" id="sekre" name="foto_sekre" type="file" required/>
                  
            
                </div>
                <div class="mb-3">
                  <label for="bendahara" class="form-label">Bendahara</label>
                    <input class="form-control" id="bendahara"name="foto_bend" type="file" required/>
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
            