<?php
include '../../config/config.php';
include '../../config/koneksi.php';

$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM sektor_atm AS sa 
LEFT JOIN barang AS b ON sa.kode_barang = b.kode_barang WHERE sa.id_sektoratm = '$id'");
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
    <title>Detail Sektor ATM</title>
</head>

<body>

    <!-- Kop Here ! -->
    <h3>
        <center><br>
            Data Detail Sektor ATM<br>
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
                                        <th width="40%">Kode Barang </th>
                                        <th><?php echo $row['kode_barang'] ?></th>
                                    </p>
                                </tr>

                                <tr>
                                    <p>
                                        <th>Bank</th>
                                        <th><?php echo $row['bank'] ?></th>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <th>Kecamatan</th>
                                        <th><?php echo $row['kecamatan'] ?></th>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <th>Lokasi ATM</th>
                                        <th><?php echo $row['lokasi_atm'] ?></th>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <th>Link Gmaps</th>
                                        <th><a href="<?= $row['link_gmap'] ?>" target="blank" class="fa fa-map-marked-alt"> Lihat Map</a></th>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <th>Tanggal Peletakan</th>
                                        <th><?php echo $row['tgl_peletakan'] ?></th>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <th>Status </th>
                                        <th><?php echo $row['status'] ?></th>
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