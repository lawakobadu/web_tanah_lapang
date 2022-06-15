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
          <div class="title ps-0" style="border-bottom: 2px solid #ff7f5c; width: 450px">
          LAPORAN KEPENDUDUKAN KELURAHAN TANAH LAPANG BULAN TAHUN
          </div>
        </div>

        <div class="col-6">
          <!-- <input type="button" onclick="printDiv('printableArea')" value="Cetak" class="btn btn-success float-end" style="font-size: 14px; font-weight: bold; border-radius: 10px;"> -->
        </div>
      </div>

      <div class="row mt-4" style="margin-left: 40px; margin-right: 40px">
      <?php

if (isset($_POST['cek'])) 
{
        
        $jenis = $_POST['jenis'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];

        $tgl = $tahun."-".$bulan."-01";
        $tgl2 = $tahun."-".$bulan."-31";

        $nama = array(
        '01' => 'JANUARI',
        '02' => 'FEBRUARI',
        '03' => 'MARET',
        '04' => 'APRIL',
        '05' => 'MEI',
        '06' => 'JUNI',
        '07' => 'JULI',
        '08' => 'AGUSTUS',
        '09' => 'SEPTEMBER',
        '10' => 'OKTOBER',
        '11' => 'NOVEMBER',
        '12' => 'DESEMBER',
        );
       
    
    // if ($jenis === 'Laporan kependudukan') 
    // { ?>

        <div class="row mt-4" style="margin-left: 40px; margin-right: 40px">
            <center>
            <h3>LAPORAN KEPENDUDUKAN</h3>
            <h4>KELURAHAN TANAH LAPANG</h4>
            <h4>BULAN <?php echo $nama[$bulan]; ?> TAHUN <?php echo $tahun; ?></h4>
            </center>
            <br>
        <div class="card-body">
        <form action="laporan_penduduk.php" id="defaultForm" method="post">
        <div class="row">
            <!-- <div class="col-2">
                <label class="form-label">Jenis Laporan </label>
            </div>
            <div class="col-4">
                <select class="form-control" name="jenis" required>
                    <option value="<?php echo $jenis ?>" selected><?php echo $jenis ?></option>
                    <option value="Laporan kependudukan">Laporan kependudukan </option>
                    <option value="Laporan mutasi menurut golongan umur">Laporan mutasi menurut golongan umur</option>
                </select>
            </div> -->
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
                <select class="form-control" name="bulan" required>
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
            <div class="col-3 d-flex bd-highlight mb-3">  
                <a href="cetak.php?bulan=<?php echo $bulan; ?>&tahun=<?php echo $tahun; ?>" class="btn btn-xs btn-success float ms-auto p-2 bd-highlight" style="font-size: 12px; font-weight: bold; border-radius: 10px;">Cetak</a>
                

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
                <th>L</th>
                <th>P</th>
                <th>Jml</th>
                <th>L</th>
                <th>P</th>
                <th>Jml</th>
                <th>L</th>
                <th>P</th>
                <th>Jml</th>
                <th>L</th>
                <th>P</th>
                <th>Jml</th>
                <th>L</th>
                <th>P</th>
                <th>Jml</th>
                <th>L</th>
                <th>P</th>
                <th>Jml</th>
                <th>L</th>
                <th>P</th>
                <th>Jml</th>
            </tr>
        </thead>
        
        <tbody>
        <?php
        $sql = 
        "SELECT
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl' AND id_jk = 1 AND id_rt=1) AS awal_pr,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl' AND id_jk = 2 AND id_rt=1) AS awal_lk,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl' AND id_rt=1) AS awal_sum,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_lahir) = $bulan AND year(tgl_lahir) = $tahun AND id_jk = 1 AND id_rt=1) AS lahir_pr,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_lahir) = $bulan AND year(tgl_lahir) = $tahun AND id_jk = 2 AND id_rt=1) AS lahir_lk,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_lahir) = $bulan AND year(tgl_lahir) = $tahun AND id_rt=1) AS lahir_sum,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_hidup b ON a.id=b.id_penduduk WHERE a.id_jk = 1 AND b.id_status2 = 2 AND a.id_rt=1 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS mati_pr,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_hidup b ON a.id=b.id_penduduk WHERE a.id_jk = 2 AND b.id_status2 = 2 AND a.id_rt=1 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS mati_lk,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_hidup b ON a.id=b.id_penduduk WHERE b.id_status2 = 2 AND a.id_rt=1 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS mati_sum,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 1 AND b.id_status1 = 2 AND a.id_rt=1 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS pindah_pr,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 2 AND b.id_status1 = 2 AND a.id_rt=1 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS pindah_lk,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE b.id_status1 = 2 AND a.id_rt=1 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS pindah_sum,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 1 AND b.id_status1 = 3 AND a.id_rt=1 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun ) AS dtg_pr,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 2 AND b.id_status1 = 3 AND a.id_rt=1 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS dtg_lk,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE b.id_status1 = 3 AND a.id_rt=1 AND month(b.tgl)=$bulan AND year(b.tgl) = $tahun) AS dtg_sum,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl2' AND id_jk = 1 AND id_rt=1) AS akhir_pr,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl2' AND id_jk = 2 AND id_rt=1) AS akhir_lk,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl2' AND id_rt=1) AS akhir_sum,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_kk) = $bulan AND year(tgl_kk) = $tahun AND id_jk = 1 AND id_rt=1) AS kk_pr,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_kk) = $bulan AND year(tgl_kk) = $tahun AND id_jk = 2 AND id_rt=1) AS kk_lk,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_kk) = $bulan AND year(tgl_kk) = $tahun AND id_rt=1) AS kk_sum,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl' AND id_jk = 1 AND id_rt=2) AS awal_pr2,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl' AND id_jk = 2 AND id_rt=2) AS awal_lk2,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl' AND id_rt=2) AS awal_sum2,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_lahir) = $bulan AND year(tgl_lahir) = $tahun AND id_jk = 1 AND id_rt=2) AS lahir_pr2,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_lahir) = $bulan AND year(tgl_lahir) = $tahun AND id_jk = 2 AND id_rt=2) AS lahir_lk2,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_lahir) = $bulan AND year(tgl_lahir) = $tahun AND id_rt=2) AS lahir_sum2,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_hidup b ON a.id=b.id_penduduk WHERE a.id_jk = 1 AND b.id_status2 = 2 AND a.id_rt=2 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS mati_pr2,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_hidup b ON a.id=b.id_penduduk WHERE a.id_jk = 2 AND b.id_status2 = 2 AND a.id_rt=2 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS mati_lk2,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_hidup b ON a.id=b.id_penduduk WHERE b.id_status2 = 2 AND a.id_rt=2 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS mati_sum2,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 1 AND b.id_status1 = 2 AND a.id_rt=2 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS pindah_pr2,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 2 AND b.id_status1 = 2 AND a.id_rt=2 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS pindah_lk2,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE b.id_status1 = 2 AND a.id_rt=2 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS pindah_sum2,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 1 AND b.id_status1 = 3 AND a.id_rt=2 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun ) AS dtg_pr2,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 2 AND b.id_status1 = 3 AND a.id_rt=2 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS dtg_lk2,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE b.id_status1 = 3 AND a.id_rt=2 AND month(b.tgl)=$bulan AND year(b.tgl) = $tahun) AS dtg_sum2,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl2' AND id_jk = 1 AND id_rt=2) AS akhir_pr2,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl2' AND id_jk = 2 AND id_rt=2) AS akhir_lk2,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl2' AND id_rt=2) AS akhir_sum2,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_kk) = $bulan AND year(tgl_kk) = $tahun AND id_jk = 1 AND id_rt=2) AS kk_pr2,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_kk) = $bulan AND year(tgl_kk) = $tahun AND id_jk = 2 AND id_rt=2) AS kk_lk2,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_kk) = $bulan AND year(tgl_kk) = $tahun AND id_rt=2) AS kk_sum2,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl' AND id_jk = 1 AND id_rt=3) AS awal_pr3,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl' AND id_jk = 2 AND id_rt=3) AS awal_lk3,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl' AND id_rt=1) AS awal_sum3,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_lahir) = $bulan AND year(tgl_lahir) = $tahun AND id_jk = 1 AND id_rt=3) AS lahir_pr3,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_lahir) = $bulan AND year(tgl_lahir) = $tahun AND id_jk = 2 AND id_rt=3) AS lahir_lk3,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_lahir) = $bulan AND year(tgl_lahir) = $tahun AND id_rt=3) AS lahir_sum3,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_hidup b ON a.id=b.id_penduduk WHERE a.id_jk = 1 AND b.id_status2 = 2 AND a.id_rt=3 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS mati_pr3,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_hidup b ON a.id=b.id_penduduk WHERE a.id_jk = 2 AND b.id_status2 = 2 AND a.id_rt=3 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS mati_lk3,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_hidup b ON a.id=b.id_penduduk WHERE b.id_status2 = 2 AND a.id_rt=3 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS mati_sum3,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 1 AND b.id_status1 = 2 AND a.id_rt=3 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS pindah_pr3,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 2 AND b.id_status1 = 2 AND a.id_rt=3 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS pindah_lk3,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE b.id_status1 = 2 AND a.id_rt=3 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS pindah_sum3,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 1 AND b.id_status1 = 3 AND a.id_rt=3 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun ) AS dtg_pr3,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 2 AND b.id_status1 = 3 AND a.id_rt=3 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS dtg_lk3,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE b.id_status1 = 3 AND a.id_rt=3 AND month(b.tgl)=$bulan AND year(b.tgl) = $tahun) AS dtg_sum3,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl2' AND id_jk = 1 AND id_rt=3) AS akhir_pr3,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl2' AND id_jk = 2 AND id_rt=3) AS akhir_lk3,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl2' AND id_rt=3) AS akhir_sum3,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_kk) = $bulan AND year(tgl_kk) = $tahun AND id_jk = 1 AND id_rt=3) AS kk_pr3,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_kk) = $bulan AND year(tgl_kk) = $tahun AND id_jk = 2 AND id_rt=3) AS kk_lk3,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_kk) = $bulan AND year(tgl_kk) = $tahun AND id_rt=3) AS kk_sum3,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl' AND id_jk = 1 AND id_rt=4) AS awal_pr4,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl' AND id_jk = 2 AND id_rt=4) AS awal_lk4,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl' AND id_rt=4) AS awal_sum4,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_lahir) = $bulan AND year(tgl_lahir) = $tahun AND id_jk = 1 AND id_rt=4) AS lahir_pr4,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_lahir) = $bulan AND year(tgl_lahir) = $tahun AND id_jk = 2 AND id_rt=4) AS lahir_lk4,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_lahir) = $bulan AND year(tgl_lahir) = $tahun AND id_rt=4) AS lahir_sum4,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_hidup b ON a.id=b.id_penduduk WHERE a.id_jk = 1 AND b.id_status2 = 2 AND a.id_rt=4 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS mati_pr4,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_hidup b ON a.id=b.id_penduduk WHERE a.id_jk = 2 AND b.id_status2 = 2 AND a.id_rt=4 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS mati_lk4,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_hidup b ON a.id=b.id_penduduk WHERE b.id_status2 = 2 AND a.id_rt=4 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS mati_sum4,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 1 AND b.id_status1 = 2 AND a.id_rt=4 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS pindah_pr4,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 2 AND b.id_status1 = 2 AND a.id_rt=4 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS pindah_lk4,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE b.id_status1 = 2 AND a.id_rt=4 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS pindah_sum4,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 1 AND b.id_status1 = 3 AND a.id_rt=4 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun ) AS dtg_pr4,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 2 AND b.id_status1 = 3 AND a.id_rt=4 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS dtg_lk4,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE b.id_status1 = 3 AND a.id_rt=4 AND month(b.tgl)=$bulan AND year(b.tgl) = $tahun) AS dtg_sum4,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl2' AND id_jk = 1 AND id_rt=4) AS akhir_pr4,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl2' AND id_jk = 2 AND id_rt=4) AS akhir_lk4,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl2' AND id_rt=4) AS akhir_sum4,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_kk) = $bulan AND year(tgl_kk) = $tahun AND id_jk = 1 AND id_rt=4) AS kk_pr4,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_kk) = $bulan AND year(tgl_kk) = $tahun AND id_jk = 2 AND id_rt=4) AS kk_lk4,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_kk) = $bulan AND year(tgl_kk) = $tahun AND id_rt=4) AS kk_sum4,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl' AND id_jk = 1) AS awal_sumpr,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl' AND id_jk = 2) AS awal_sumlk,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl') AS awal_tot,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_lahir) = $bulan AND year(tgl_lahir) = $tahun AND id_jk = 1) AS lahir_sumpr,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_lahir) = $bulan AND year(tgl_lahir) = $tahun AND id_jk = 2) AS lahir_sumlk,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_lahir) = $bulan AND year(tgl_lahir) = $tahun) AS lahir_tot,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_hidup b ON a.id=b.id_penduduk WHERE a.id_jk = 1 AND b.id_status2 = 2 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS mati_sumpr,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_hidup b ON a.id=b.id_penduduk WHERE a.id_jk = 2 AND b.id_status2 = 2 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS mati_sumlk,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_hidup b ON a.id=b.id_penduduk WHERE b.id_status2 = 2 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS mati_tot,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 1 AND b.id_status1 = 2 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS pindah_sumpr,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 2 AND b.id_status1 = 2 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS pindah_sumlk,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE b.id_status1 = 2 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS pindah_tot,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 1 AND b.id_status1 = 3 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun ) AS dtg_sumpr,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE a.id_jk = 2 AND b.id_status1 = 3 AND month(b.tgl)= $bulan AND year(b.tgl) = $tahun) AS dtg_sumlk,
        ( SELECT COUNT(*) FROM penduduk a JOIN det_dom b ON a.id=b.id_penduduk WHERE b.id_status1 = 3 AND month(b.tgl)=$bulan AND year(b.tgl) = $tahun) AS dtg_tot,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl2' AND id_jk = 1) AS akhir_sumpr,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl2' AND id_jk = 2) AS akhir_sumlk,
        ( SELECT COUNT(*) FROM penduduk WHERE created <= '$tgl2') AS akhir_tot,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_kk) = $bulan AND year(tgl_kk) = $tahun AND id_jk = 1) AS kk_sumpr,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_kk) = $bulan AND year(tgl_kk) = $tahun AND id_jk = 2) AS kk_sumlk,
        ( SELECT COUNT(*) FROM penduduk WHERE month(tgl_kk) = $bulan AND year(tgl_kk) = $tahun) AS kk_tot";

        $res = $conn->query($sql);
        $data = $res->fetch_assoc();

        ?>       
           <tr>
                <td>1</td>
                <td>RT 01</td>
                <td><?php echo $data['awal_lk']; ?></td>
                <td><?php echo $data['awal_pr']; ?></td>
                <td><?php echo $data['awal_sum']; ?></td>
                <td><?php echo $data['lahir_lk']; ?></td>
                <td><?php echo $data['lahir_pr']; ?></td>
                <td><?php echo $data['lahir_sum']; ?></td>
                <td><?php echo $data['mati_lk']; ?></td>
                <td><?php echo $data['mati_pr']; ?></td>
                <td><?php echo $data['mati_sum']; ?></td>
                <td><?php echo $data['pindah_lk']; ?></td>
                <td><?php echo $data['pindah_pr']; ?></td>
                <td><?php echo $data['pindah_sum']; ?></td>
                <td><?php echo $data['dtg_lk']; ?></td>
                <td><?php echo $data['dtg_pr']; ?></td>
                <td><?php echo $data['dtg_sum']; ?></td>
                <td><?php echo $data['akhir_lk']; ?></td>
                <td><?php echo $data['akhir_pr']; ?></td>
                <td><?php echo $data['akhir_sum']; ?></td>
                <td><?php echo $data['kk_lk']; ?></td>
                <td><?php echo $data['kk_pr']; ?></td>
                <td><?php echo $data['kk_sum']; ?></td>
            </tr>

            <tr>
                <td>2</td>
                <td>RT 02</td>
                <td><?php echo $data['awal_lk2']; ?></td>
                <td><?php echo $data['awal_pr2']; ?></td>
                <td><?php echo $data['awal_sum2']; ?></td>
                <td><?php echo $data['lahir_lk2']; ?></td>
                <td><?php echo $data['lahir_pr2']; ?></td>
                <td><?php echo $data['lahir_sum2']; ?></td>
                <td><?php echo $data['mati_lk2']; ?></td>
                <td><?php echo $data['mati_pr2']; ?></td>
                <td><?php echo $data['mati_sum2']; ?></td>
                <td><?php echo $data['pindah_lk2']; ?></td>
                <td><?php echo $data['pindah_pr2']; ?></td>
                <td><?php echo $data['pindah_sum2']; ?></td>
                <td><?php echo $data['dtg_lk2']; ?></td>
                <td><?php echo $data['dtg_pr2']; ?></td>
                <td><?php echo $data['dtg_sum2']; ?></td>
                <td><?php echo $data['akhir_lk2']; ?></td>
                <td><?php echo $data['akhir_pr2']; ?></td>
                <td><?php echo $data['akhir_sum2']; ?></td>
                <td><?php echo $data['kk_lk2']; ?></td>
                <td><?php echo $data['kk_pr2']; ?></td>
                <td><?php echo $data['kk_sum2']; ?></td>
            </tr>

            <tr>
                <td>3</td>
                <td>RT 03</td>
                <td><?php echo $data['awal_lk3']; ?></td>
                <td><?php echo $data['awal_pr3']; ?></td>
                <td><?php echo $data['awal_sum3']; ?></td>
                <td><?php echo $data['lahir_lk3']; ?></td>
                <td><?php echo $data['lahir_pr3']; ?></td>
                <td><?php echo $data['lahir_sum3']; ?></td>
                <td><?php echo $data['mati_lk3']; ?></td>
                <td><?php echo $data['mati_pr3']; ?></td>
                <td><?php echo $data['mati_sum3']; ?></td>
                <td><?php echo $data['pindah_lk3']; ?></td>
                <td><?php echo $data['pindah_pr3']; ?></td>
                <td><?php echo $data['pindah_sum3']; ?></td>
                <td><?php echo $data['dtg_lk3']; ?></td>
                <td><?php echo $data['dtg_pr3']; ?></td>
                <td><?php echo $data['dtg_sum3']; ?></td>
                <td><?php echo $data['akhir_lk3']; ?></td>
                <td><?php echo $data['akhir_pr3']; ?></td>
                <td><?php echo $data['akhir_sum3']; ?></td>
                <td><?php echo $data['kk_lk3']; ?></td>
                <td><?php echo $data['kk_pr3']; ?></td>
                <td><?php echo $data['kk_sum3']; ?></td>
            </tr>

            <tr>
                <td>4</td>
                <td>RT 04</td>
                <td><?php echo $data['awal_lk4']; ?></td>
                <td><?php echo $data['awal_pr4']; ?></td>
                <td><?php echo $data['awal_sum4']; ?></td>
                <td><?php echo $data['lahir_lk4']; ?></td>
                <td><?php echo $data['lahir_pr4']; ?></td>
                <td><?php echo $data['lahir_sum4']; ?></td>
                <td><?php echo $data['mati_lk4']; ?></td>
                <td><?php echo $data['mati_pr4']; ?></td>
                <td><?php echo $data['mati_sum4']; ?></td>
                <td><?php echo $data['pindah_lk4']; ?></td>
                <td><?php echo $data['pindah_pr4']; ?></td>
                <td><?php echo $data['pindah_sum4']; ?></td>
                <td><?php echo $data['dtg_lk4']; ?></td>
                <td><?php echo $data['dtg_pr4']; ?></td>
                <td><?php echo $data['dtg_sum4']; ?></td>
                <td><?php echo $data['akhir_lk4']; ?></td>
                <td><?php echo $data['akhir_pr4']; ?></td>
                <td><?php echo $data['akhir_sum4']; ?></td>
                <td><?php echo $data['kk_lk4']; ?></td>
                <td><?php echo $data['kk_pr4']; ?></td>
                <td><?php echo $data['kk_sum4']; ?></td>
            </tr>
            <tr>
                <td colspan="2">Jumlah</td>
               
                <td><?php echo $data['awal_sumlk']; ?></td>
                <td><?php echo $data['awal_sumpr']; ?></td>
                <td><?php echo $data['awal_tot']; ?></td>
                <td><?php echo $data['lahir_sumlk']; ?></td>
                <td><?php echo $data['lahir_sumpr']; ?></td>
                <td><?php echo $data['lahir_tot']; ?></td>
                <td><?php echo $data['mati_sumlk']; ?></td>
                <td><?php echo $data['mati_sumpr']; ?></td>
                <td><?php echo $data['mati_tot']; ?></td>
                <td><?php echo $data['pindah_sumlk']; ?></td>
                <td><?php echo $data['pindah_sumpr']; ?></td>
                <td><?php echo $data['pindah_tot']; ?></td>
                <td><?php echo $data['dtg_sumlk']; ?></td>
                <td><?php echo $data['dtg_sumpr']; ?></td>
                <td><?php echo $data['dtg_tot']; ?></td>
                <td><?php echo $data['akhir_sumlk']; ?></td>
                <td><?php echo $data['akhir_sumpr']; ?></td>
                <td><?php echo $data['akhir_tot']; ?></td>
                <td><?php echo $data['kk_sumlk']; ?></td>
                <td><?php echo $data['kk_sumpr']; ?></td>
                <td><?php echo $data['kk_tot']; ?></td>
            </tr>

        </tbody>
    </table>
</div>
</div>

<?php
}  
// } 
else 
{?>
         <div class="row mt-4" style="margin-left: 40px; margin-right: 40px">
            <center>
            <h3>LAPORAN KEPENDUDUKAN</h3>
            <h4>KELURAHAN TANAH LAPANG</h4>
            <h4>BULAN TAHUN</h4>
            </center>
            <br>
        <div class="card-body">
        <form action="?p=penduduk.laporan-penduduk" id="defaultForm" method="post">
        <div class="row">
            <!-- div class="col-2">
                <label class="form-label">Jenis Laporan </label>
            </div>
            <div class="col-4">
                <select class="form-control" name="jenis" required>
                    <option value="<?php echo $jenis ?>" selected><?php echo $jenis ?></option>
                    <option value="Laporan kependudukan">Laporan kependudukan </option>
                    <option value="Laporan mutasi menurut golongan umur">Laporan mutasi menurut golongan umur</option>
                </select>
            </div> -->
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
                <select class="form-control" name="bulan" required>
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
                <button type="submit" name="cek" class="btn btn-xs float" style="background-color: #ff7f5c; color: #fff; font-size: 12px; font-weight: bold; border-radius: 10px;">Lihat</button>
            </div>
            <div class="col-3 d-flex bd-highlight mb-3">  
                <a hre="../../cetak.php?bulan=<?php echo $bulan; ?>&tahun=<?php echo $tahun; ?>" class="btn btn-xs btn-success float ms-auto p-2 bd-highlight" style="font-size: 12px; font-weight: bold; border-radius: 10px;">Cetak</a>
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
                <th>L</th>
                <th>P</th>
                <th>Jml</th>
                <th>L</th>
                <th>P</th>
                <th>Jml</th>
                <th>L</th>
                <th>P</th>
                <th>Jml</th>
                <th>L</th>
                <th>P</th>
                <th>Jml</th>
                <th>L</th>
                <th>P</th>
                <th>Jml</th>
                <th>L</th>
                <th>P</th>
                <th>Jml</th>
                <th>L</th>
                <th>P</th>
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
<?php } ?>
    <div class="d-grid gap-2 col-3 ms-4 mb-4 text-start">
        <a style="background-color: #ff7f5c; color: #fff; font-size: 14px; font-weight: bold; border-radius: 10px;" href="?p=penduduk.index" class="btn px-5 py-2" role="button">Kembali</a>
    </div>
</div>

</div>

</div>
</div>
</div>
                