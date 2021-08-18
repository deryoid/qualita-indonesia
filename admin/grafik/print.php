<?php
include '../../config/config.php';
include '../../config/koneksi.php';


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
<script type="text/javascript" src="<?= base_url()?>/assets/chartjs/Chart.js"></script>
<style type="text/css">
	body{
		font-family: roboto;
	}

	table{
		margin: 0px auto;
	}
	</style>
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
            <font size="5">Grafik Perbaikan dan Maintance</font> <br>
            <hr size="2px" color="black">
        </b></p>

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead class="bg-white">
                        <tr align="center">
                            <th>Perbaikan</th>
                            <th>Maintance</th>
                        </tr>
                    </thead>
                    <tbody style="background-color: white">
                        <tr>
                            <td align="center"><?php 
                            $jumlah_perbaikan = mysqli_query($koneksi,"SELECT * FROM perbaikan");
                            echo mysqli_num_rows($jumlah_perbaikan);
                            ?></td>
                            <td align="center"><?php 
                            $jumlah_maintance = mysqli_query($koneksi,"SELECT * FROM maintance");
                            echo mysqli_num_rows($jumlah_maintance);
                            ?></td>
                        </tr>                 
                    </tbody>

                </table>
                <div style="width: 800px;margin: 0px auto;">
                                            <canvas id="myChart"></canvas>
                                        </div>
            </div>
        </div>
    </div>
    <br>

    </div>

    </div>


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
    
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'pie',
			data: {
				labels: ["Perbaikan", "Maintance"],
				datasets: [{
					label: '',
					data: [
					<?php 
					$jumlah_perbaikan = mysqli_query($koneksi,"SELECT * FROM perbaikan");
					echo mysqli_num_rows($jumlah_perbaikan);
					?>, 
					<?php 
					$jumlah_maintance = mysqli_query($koneksi,"SELECT * FROM maintance");
					echo mysqli_num_rows($jumlah_maintance);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
</script>