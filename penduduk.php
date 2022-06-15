<!DOCTYPE html>
<html lang="en">
<style>
.topnav {
  background-color: #0000;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: #000000;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 20px;
  font-weight: bold;
  font-family: Helvetica;
  border-bottom: 3px solid transparent;
}

.topnav a:hover {
  border-bottom: 3px solid #ff7f5c;
}

.topnav a.active {
  border-bottom: 3px solid #ff7f5c;
}

.table {
    border-collapse: collapse;
    width: 100%;
    margin: 25px 0; 
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    font-size: 14px;
    
}

.thead {
    background-color: #FF7F5C; 
    color: #ffffff;
    text-align: center; 
   
}

</style>
  <!-- navbar -->
  <?php include("navbar.php"); ?>

    <!-- banner -->
    <div class="bgimg container-fluid banner">
      <div class="container text-center">
        <h1 style="font-size: 55px; padding-bottom:30px; padding-top: 20px;">DATA PENDUDUK & FASILITAS</h1>
        <a href="#getstarted"> 
          <button type="button" class="btn" style="border-left-width: 25px; border-right-width: 25px;">
            Get Sarted
          </button>
        </a>
      </div>
    </div>

    <!-- Konten -->
        <div class="konten">
        <div class="card-body" style="box-shadow: 0px 4px 4px 3px rgba(0, 0, 0, 0.25); border-radius: 10px;  font-weight: 700; font-size: 18px;line-height: 25px; color: #3734A9;">
            <div class="topnav">
                <a href="penduduk.php" class="active">Data Penduduk</a>
                <a href="fasilitas.php" class="active">Data Fasilitas</a>
                <br><br><br>
                    
                <div class="row mt-4" style="margin-left: 40px; margin-right: 40px">
                <center>
                    <h3>JUMLAH PENDUDUK BERDASARKAN KELOMPOK UMUR DAN JENIS KELAMIN</h3>
                    <h4>KELURAHAN TANAH LAPANG</h4>
                    <h4>BULAN TAHUN</h4>
                </center>
                <br>
                <div class="card-body">
                <form action="laporan_penduduk.php" id="defaultForm" method="post">
                <div class="row">
                    <div class="col-2">
                        <label class="form-label">Jenis Laporan </label>
                    </div>
                    <div class="col-4">
                        <select class="form-control" name="jenis" required>
                            <option value="kependudukan">Laporan kependudukan </option>
                            <option value="mutasi">Laporan mutasi menurut golongan umur</option>
                        </select>
                    </div>
                    <div class="col-2" > 
                    </div>
                    
                    <div class="col">
                       
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-2">
                        <label class="form-label">Bulan</label>
                    </div>
                    <div class="col-2">
                        <select class="form-control" name="kategori" required>
                            <option value="01">Januari</option>
                            <option value="02">Februari</option>
                            <option value="03">Maret</option>
                            <option value="04">April</option>
                            <option value="05">Mei</option>
                            <option value="06">Juni</option>
                            <option value="07">Juli</option>
                            <option value="08">Agustus</option>
                            <option value="09">September</option>
                            <option value="10">Oktober</option>
                            <option value="11">November</option>
                            <option value="12">Desember</option>
                        </select>
                    </div>
                    <div class="col-1">
                        <label class="form-label">Tahun</label>
                    </div>
                    <div class="col-1">
                        <input class="form-control" type=”number” name="tahun">
                    </div>
                    <div class="col-3" >  
                        <button type="submit" name="cek" class="btn btn-xs float" style="background-color: #ff7f5c; color: #fff; font-size: 12px; font-weight: bold; border-radius: 10px;">Lihat
                        </button>
                    </div>
                    <div class="col-3" >
                    </div>
                </div>
                </form>
            </div>
            </div>

            <div class="card-body" style="display: table;table-layout: fixed;width: 100%;">
                <div style="display: table-cell;overflow-x: auto;width: 100%;">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead">
                    <tr>
                        <th rowspan="2">No.</th>
                        <th rowspan="2">RT</th>
                        <th colspan="3">Penduduk Awal Bulan</th>
                        <th colspan="3">Lahir Bulan Ini</th>
                        <th colspan="3">Mati Bulan Ini</th>
                        <th colspan="3">Pindah Bulan Ini</th>
                        <th colspan="3">Datang Bulan Ini</th>
                        <th colspan="3">Penduduk Akhir Bulan</th>
                        <th colspan="3">Jumlah KK Bulan Ini</th>
                    </tr>
                    
                    <tr>
                        <th>Lk</th>
                        <th>Pr</th>
                        <th>Jml</th>
                        <th>Lk</th>
                        <th>Pr</th>
                        <th>Jml</th>
                        <th>Lk</th>
                        <th>Pr</th>
                        <th>Jml</th>
                        <th>Lk</th>
                        <th>Pr</th>
                        <th>Jml</th>
                        <th>Lk</th>
                        <th>Pr</th>
                        <th>Jml</th>
                        <th>Lk</th>
                        <th>Pr</th>
                        <th>Jml</th>
                        <th>Lk</th>
                        <th>Pr</th>
                        <th>Jml</th>
                    </tr>
                </thead>
                
                <tbody>
                   <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                        <td>1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>




  <!-- footer -->
  <?php include("footer.html"); ?> 
</body>
</html>
