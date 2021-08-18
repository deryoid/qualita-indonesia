<?php
include '../../config/config.php';
include '../../config/koneksi.php';

$no = 1;

$nama_petugas = $_POST['nama_petugas'];

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
    <title>LAPORAN DATA </title>
</head>

<body>

    <p align="center"><b>
            <font size="5">Laporan Pemeliharaan Oleh <?= $nama_petugas; ?></font> <br>
            <hr size="2px" color="black">
        </b></p>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                <thead class="bg-blue">
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Sektor Barang</th>
                                                    <th>Status</th>
                                                    <th>Petugas</th>
                                                    <th>Tanggal Maintance</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM maintance AS m
                                            LEFT JOIN sektor_atm AS sa ON m.id_sektoratm = sa.id_sektoratm
                                            LEFT JOIN barang AS b ON sa.kode_barang = b.kode_barang
                                            LEFT JOIN petugas AS p ON m.id_petugas = p.id_petugas
                                            WHERE nama_petugas = '$nama_petugas'");
                                            while ($row = $data->fetch_array()) {
                                            ?>
                                                <tbody style="background-color: white">
                                                    <tr>
                                                        <td align="center"><?= $no++ ?></td>
                                                        <td>
                                                            <ul>
                                                                <li>Kode Barang : <?= $row['kode_barang'] ?></li>
                                                                <li>Lokasi Atm : <?= $row['lokasi_atm'] ?></li>
                                                                <li>Link : <a href="<?= $row['link_gmap'] ?>" target="blank" class="fa fa-map-marked-alt">Lihat Map</a> </li>
                                                                <li>Tanggal Peletakan :<?= $row['tgl_peletakan'] ?></li>
                                                            </ul>
                                                       </td>
                                                        <td><?= $row['status_maintance'] ?></td>
                                                        <td><?= $row['nama_petugas'] ?></td>
                                                        <td><?= $row['tgl_maintance'] ?></td>
                                                        <td><?= $row['keterangan'] ?></td>
                                                    </tr>
                                                </tbody>
                                            <?php } ?>

                </table>

            </div>
        </div>
    </div>
    <br>

    </div>

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

<script>
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

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
    }

    ?>
</script>