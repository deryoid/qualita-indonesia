<?php
include '../../config/config.php';
include '../../config/koneksi.php';

$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM perusahaan WHERE id_perusahaan = '$id'");
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
    <title>ReportL</title>
</head>

<body>
<img src="<?=base_url('assets/dist/img/logo_pln.jpg')?>" align="left" width="90" height="90">
  <p align="center"><b>
    <font size="7">PT. GERAI INDAH MARABAHAN</font> <br> <br> <br> <br>
    <hr size="2px" color="black">
    <center><font size="2">Alamat : Jl. AES Nasution, Marabahan Kota, Marabahan Kabupaten Barito Kuala Kalimantan Selatan </font></center>
    <hr size="2px" color="black">
  </b></p>
    <!-- Kop Here ! -->
    <h3>
        <center><br>
            Data Perusahaan<br>
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
                                        <th width="40%">Nama Perusahaan </th>
                                        <th><?php echo $row['nama_perusahaan'] ?></th>
                                    </p>
                                </tr>

                                <tr>
                                    <p>
                                        <th>Bidang Perusahaan </th>
                                        <th><?php echo $row['bidang_perusahaan'] ?></th>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <th>Alamat</th>
                                        <th><?php echo $row['alamat_perusahaan'] ?></th>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <th>Tahun Berdiri </th>
                                        <th><?php echo $row['tahun_berdiri'] ?></th>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <th>Pimpinan/Kepala </th>
                                        <th><?php echo $row['nama_pimpinan'] ?></th>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <th>No. Telp Perusahaan </th>
                                        <th><?php echo $row['no_telp'] ?></th>
                                    </p>
                                </tr>
                                <tr>
                                    <p>
                                        <th>Email Perusahaan </th>
                                        <th><?php echo $row['email'] ?></th>
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