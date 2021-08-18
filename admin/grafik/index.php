<?php
require '../../config/config.php';
require '../../config/koneksi.php';
require '../../config/day.php';
?>
<!DOCTYPE html>
<html>
<?php
include '../../templates/head.php';
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
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php
        include '../../templates/navbar.php';
        ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php
        include '../../templates/sidebar.php';
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Grafik Perbaikan dan Maintance</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">Data Master</a></li> -->
                                <li class="breadcrumb-item active">Grafik Perbaikan dan Maintance</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary card-outline">
                                <div class="card-header">
                                    <!-- <a href="tambah" class="btn bg-blue"><i class="fa fa-plus-circle"> Tambah Data</i></a> -->
                                    <a href="print" target="blank" class="btn bg-info"><i class="fa fa-print"> Cetak</i></a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <?php
                                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                                    ?>
                                        <div class="alert alert-info alertinfo" role="alert">
                                            <i class="fa fa-check-circle"> <?= $_SESSION['pesan']; ?></i>
                                        </div>
                                    <?php
                                        $_SESSION['pesan'] = '';
                                    }
                                    ?>

                                   <div class="row">
                                   
                                        <table class="table table-bordered table-striped">
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
                                    
                                    <br>
                                    <br>

                                        <div style="width: 800px;margin: 0px auto;">
                                            <canvas id="myChart"></canvas>
                                        </div>
                                   </div>

                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <?php include_once "../../templates/footer.php"; ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <?php include_once "../../templates/script.php"; ?>

    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

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
</body>

</html>