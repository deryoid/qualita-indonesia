<?php
include '../../config/config.php';
include '../../config/koneksi.php';

$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM perbaikan AS p 
LEFT JOIN sektor_atm AS sa ON p.id_sektoratm = sa.id_sektoratm 
LEFT JOIN barang AS b ON sa.kode_barang = b.kode_barang
LEFT JOIN petugas AS ps ON p.id_petugas = ps.id_petugas
WHERE 
 p.id_perbaikan = '$id'");
$row  = $data->fetch_array();

$bln = array(
    '01' => 'Januari',
    '02' => 'Februari',
    '03' => 'Maret',
    '04' => 'April',
    '05' => 'Mei',
    '06' => 'Juni',
    '07' => 'Juli',
    '08' => 'Agustus',
    '09' => 'September',
    '10' => 'Oktober',
    '11' => 'November',
    '12' => 'Desember'
);
?>

<script type="text/javascript">
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title>Detail Perbaikan</title>
</head>

<body>

    <!-- Kop Here ! -->
    <h3>
        <center><br>
            Data Detail Perbaikan<br>
        </center>
    </h3><br><br>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box" align="left">
                <div class="table-responsive text-center">
                    <table border="1" cellspacing="0" width="100%" style="text-align: left">
                        <thead>
                            <b>
                                <tr>
                                    <p>
                                        <th width="40%">SEKTOR ATM </th>
                                        <th>
                                        <ul>
                                            <li>Kode ATM : <?= $row['kode_barang'] ?></li>
                                            <li>Nama ATM : <?= $row['nama_barang'] ?></li>
                                            <li>Tanggal Peletakan : <?= $row['tgl_peletakan'] ?></li>
                                            <li>Status Engine : <?= $row['status'] ?></li>
                                            </ul>
                                        </th>
                                    </p>
                                </tr>

                                <tr>
                                    <p>
                                        <th>Nama Petugas </th>
                                        <th>
                                            <ul>
                                                <li><?= $row['nama_petugas'] ?></li>
                                            </ul>
                                            
                                        </th>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <th>Alamat</th>
                                        <th>
                                            <ul>
                                                <li><?= $row['lokasi_atm'] ?></li>
                                                <li><a href="<?= $row['link_gmap'] ?>" target="blank" class="fa fa-map-marked-alt"> Lihat Map</a></li>
                                                </ul>
                                            </th>
                                    </p>
                                </tr>
                                <tr>
                                    
                                    <p>
                                        <th>Sebelum Perbaikan </th>
                                        <th>
                                            <ul>
                                                <li><?= $row['tanggal_perbaikan'] ?></li>
                                                <li><img src="<?= base_url() ?>/filependukung/<?= $row['foto_sebelum'] ?>" width="100px"></li>
                                            </ul>
                                        </th>
                                    </p>
                                </tr>
                                <tr>
                                    
                                    <p>
                                        <th>Sesudah Perbaikan </th>
                                        <th>
                                            <ul>
                                                <li><?= $row['tanggal_selesai'] ?></li>
                                                <li><img src="<?= base_url() ?>/filependukung/<?= $row['foto_sesudah'] ?>" width="100px"></li>
                                            </ul>
                                        </th>
                                    </p>
                                </tr>
                               
                            </b>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>

    <?php
    function tgl_indo($tanggal)
    {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
    }

    // echo tgl_indo(date('Y-m-d')); // 21 Oktober 2017

    // echo "<br/>";
    // echo "<br/>";

    // echo tgl_indo("1994-02-15"); // 15 Februari 1994
    ?>


</div>
    <div style="text-align: center; display: inline-block; float: right;">
  <h5>
    Banjarmasin , <?php echo tgl_indo(date('Y-m-d')); ?><br>
    
    <br><br><br><br>
    Pimpinan
  </h5>

</div>
</body>

</html>