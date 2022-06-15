<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tanah Lapang</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="css/UIstyle.css" />
</head>
<style>


</style>
  <!-- navbar -->
                    
        <?php
                
               require ('./connect.php');
                $bulan = $_GET['bulan'];
                 $tahun = $_GET['tahun'];
      

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

                <div class="row mt-4" style="margin-left: 40px; margin-right: 40px;font-family: 'Times New Roman';">
                    <center>
                    <h3>LAPORAN KEPENDUDUKAN KELURAHAN TANAH LAPANG</h4>
                    <h3>KEADAAN BULAN <?php echo $nama[$bulan]; ?> TAHUN <?php echo $tahun; ?></h4>
                    </center>
                    <br>
                <div class="card-body">
                
            


                <table class="table table-bordered ">
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
                        <td>1</td>
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
                        <td>2</td>
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
                        <td>3</td>
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
                        <td>4</td>
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

	<div>
		<div style="float:right">
			Sawahlunto, <?php echo date("d"); ?> <?php echo	$nama[$bulan]; ?> <?php echo date("Y"); ?>

			<br/><strong>LURAH TANAH LAPANG</strong>
			<br>
			<br><br><br><br>
			<strong>ISWANDI, S.Pd</strong><br/><p>NIP. 19690602 199403 1 006</p>
	</div>
		<div style="clear:both">
		</div>
	</div>
        </div>
    </div>

    <?php
   
    // } 
    ?>
    <script>
 window.print();
 </script>
</html>
