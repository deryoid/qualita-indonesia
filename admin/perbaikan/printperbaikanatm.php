<?php
include '../../config/config.php';
include '../../config/koneksi.php';

$no = 1;
$id_sektoratm   = $_POST['id_sektoratm'];

$seat = $koneksi->query("SELECT * FROM sektor_atm  AS sa
LEFT JOIN barang AS b ON sa.kode_barang = b.kode_barang
WHERE sa.id_sektoratm = '$id_sektoratm'")->fetch_array();

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
            <font size="5">LAPORAN PERBAIKAN</font> <br>
            <font size="3">Sektor ATM : <?= $seat['kode_barang'].", ".$seat['nama_barang'].", ".$seat['bank']; ?></font> <br>
            
            <hr size="2px" color="black">
        </b></p>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                <thead class="bg-blue">
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Sektor ATM</th>
                                                    <th>Petugas</th>
                                                    <th>Lokasi ATM</th>
                                                    <th>Tanggal Perbaikan</th>
                                                    <th>Status Perbaikan</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM perbaikan AS p 
                                            LEFT JOIN sektor_atm AS sa ON p.id_sektoratm = sa.id_sektoratm 
                                            LEFT JOIN barang AS b ON sa.kode_barang = b.kode_barang
                                            LEFT JOIN petugas AS ps ON p.id_petugas = ps.id_petugas
                                            WHERE sa.id_sektoratm = '$id_sektoratm'");
                                            $jumlah = mysqli_num_rows($data);
                                            while ($row = $data->fetch_array()) {
                                            ?>
                                                <tbody style="background-color: white">
                                                    <tr>
                                                        <td align="center"><?= $no++ ?></td>
                                                        <td>
                                                            <ul>
                                                            <li>Kode ATM : <?= $row['kode_barang'] ?></li>
                                                            <li>Nama ATM : <?= $row['nama_barang'] ?></li>
                                                            <li>Tanggal Peletakan : <?= $row['tgl_peletakan'] ?></li>
                                                            <li>Status Engine : <?= $row['status'] ?></li>
                                                            </ul>
                                                        </td>
                                                        <td><?= $row['nama_petugas'] ?></td>
                                                        <td>
                                                            <ul>
                                                            <li><?= $row['lokasi_atm'] ?></li>
                                                            <li><a href="<?= $row['link_gmap'] ?>" target="blank" class="fa fa-map-marked-alt"> Lihat Map</a></li>
                                                            </ul>
                                                        </td>
                                                        <td><?= $row['tanggal_perbaikan'] ?></td>
                                                        <td><?= $row['status_perbaikan'] ?></td>
                                                    </tr>
                                                </tbody>
                                            <?php } ?>

                </table>

            </div>
        </div>
    </div>
    <br>
    <label>Jumlah Daftar Perbaikan : <?php echo "<b>".$jumlah.' Sektor'."</b>"; ?></label>
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