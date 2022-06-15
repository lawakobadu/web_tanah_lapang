<div class="container">
  <div class="content p-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="me-3">
          <a href="" class="btn btn-sm" style="font-weight: bold; font-size: 13px; color: #404444"> Konten
          </a>
        </li>
        
        <li class="active" aria-current="page">
          <a href="?p=struktur.index" class="btn btn-title shadow-sm px-3" style="background-color: #ff7f5c; color: #fff; font-weight: bold; font-size: 13px;border-radius: 10px;"> Profil Kelurahan
          </a>
        </li>
      </ol>
    </nav>

    <div class="row mt-4" style="margin-left: 10px; margin-right: 10px">
      <div class="card shadow mb-5" style="box-shadow: 10px; border-radius: 10px; border: none">
        <div class="card-body">
          <div class="row">
            <div class="col-2 title ps-0 float-start" style=" border-bottom: 2px solid #ff7f5c; width: 245px; font-size: 15px; "> Edit Struktur Organisasi Kelurahan
            </div>
          </div>

            <div class="col mt-4">
               <form action="?p=struktur.action" id="defaultForm" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="foto" class="form-label">Upload Gambar</label>
                  <input class="form-control" id="foto" name="foto" type="file" />
                <div class="my-4">
                  <button type="submit" name="edit" class="btn px-5 py-2 float-end" style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;"> Simpan
                  </button>
                  <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px; float:left" href="?p=struktur.index" class="btn px-5 py-2 float-start" role="button">Kembali</a>
                </div>
              </form>
            </div>
          </div>            
        </div>
                  