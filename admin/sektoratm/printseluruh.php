<?php 
    include '../../config/config.php';
    include '../../config/koneksi.php';

    $no = 1;


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
  <title>LAPORAN DATA SEKTOR ATM</title>
</head>
<body>

    
    <h3><center><br>
      LAPORAN DATA SEKTOR ATM<br> 
    </center></h3><br><br>
                  <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <table border="1" cellspacing="0" width="100%">
                            <thead class="bg-blue">
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Kode Barang</th>
                                                    <th>Bank</th>
                                                    <th>Kecamatan</th>
                                                    <th>Lokasi ATM</th>
                                                    <th>Link Gmaps</th>
                                                    <th>Tanggal Peletakan</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM sektor_atm AS sa 
                                            LEFT JOIN barang AS b ON sa.kode_barang = b.kode_barang");
                                            while ($row = $data->fetch_array()) {
                                            ?>
                                                <tbody style="background-color: white">
                                                    <tr>
                                                        <td align="center"><?= $no++ ?></td>
                                                        <td><?= $row['kode_barang'] ?></td>
                                                        <td><?= $row['bank'] ?></td>
                                                        <td><?= $row['kecamatan'] ?></td>
                                                        <td><?= $row['lokasi_atm'] ?></td>
                                                        <td align="center"><a href="<?= $row['link_gmap'] ?>" target="blank" class="fa fa-map-marked-alt"> Lihat Map</a></td>
                                                        <td><?= $row['tgl_peletakan'] ?></td>
                                                        <td><?= $row['status'] ?></td>
                                                    </tr>
                                                </tbody>
                                            <?php } ?>
                            
                            </table>

                        </div>
                    </div>
                </div>
<br>
<!-- <label>Jumlah Pegawai : <?php echo "<b>".$jumlah.' Pegawai'."</b>"; ?></label> -->
<br>

<br>
</div> 


</body>
</html>