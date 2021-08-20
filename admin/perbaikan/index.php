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
                            <h1 class="m-0 text-dark">Perbaikan ATM</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">Data Master</a></li> -->
                                <li class="breadcrumb-item active">Perbaikan ATM</li>
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
                                    <a href="tambah" class="btn bg-blue"><i class="fa fa-plus-circle"> Tambah Data</i></a>
                                    <a href="print" target="blank" class="btn bg-info"><i class="fa fa-print"> Cetak</i></a>
                                    <a href="#" data-toggle="modal" data-target="#modal_print" class="btn bg-info"><i class="fa fa-print"> Cetak Per/Petugas</i></a>
                                    <a href="#" data-toggle="modal" data-target="#modal_printatm" class="btn bg-info"><i class="fa fa-print"> Cetak Per/Sektor ATM</i></a>
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

                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead class="bg-blue">
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Sektor ATM</th>
                                                    <th>Petugas</th>
                                                    <th>Lokasi ATM</th>
                                                    <th>Tanggal Perbaikan</th>
                                                    <th>Status Perbaikan</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM perbaikan AS p 
                                            LEFT JOIN sektor_atm AS sa ON p.id_sektoratm = sa.id_sektoratm 
                                            LEFT JOIN barang AS b ON sa.kode_barang = b.kode_barang
                                            LEFT JOIN petugas AS ps ON p.id_petugas = ps.id_petugas
                                            ORDER BY p.id_perbaikan DESC");
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
                                                        <td align="center">
                                                            <a href="printdetail?id=<?= $row['id_perbaikan'] ?>" target="blank" class="btn btn-info btn-sm" title="detail"><i class="fa fa-print"></i></a>
                                                            <a href="edit?id=<?= $row['id_perbaikan'] ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                            <a href="hapus?id=<?= $row['id_perbaikan'] ?>" class="btn btn-danger btn-sm alert-hapus" title="Hapus"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            <?php } ?>
                                        </table>
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
    </script>

</body>

</html>


 <!-- MODAL Print -->
 <div id="modal_print" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cetak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
    <!-- Start content -->
        <div class="content">
            <div class="container"> 
                <div class="row">
                     <div class="col-sm-12">
                          <div class="card-box">
                                <form class="form-horizontal" action="printperbaikan" method="POST" target="blank">

                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Pilih Petugas </label>
                                            <div class="col-sm-12">
                                            <select class="form control select2" name="nama_petugas" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $sd = $koneksi->query("SELECT nama_petugas FROM perbaikan AS p
                                                    LEFT JOIN petugas AS ps ON p.id_petugas = ps.id_petugas
                                                    
                                                    GROUP BY nama_petugas");
                                                    foreach ($sd as $item) {
                                                    ?>
                                                        <option value="<?= $item['nama_petugas'] ?>"><?= $item['nama_petugas'] ?></option>
                                                        
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <input type="submit" name="print" class="btn btn-success" value="Print">

                                </form>
                                       
                                </div>
                            </div>                          
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>

 <!-- MODAL Print -->
 <div id="modal_printatm" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cetak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
    <!-- Start content -->
        <div class="content">
            <div class="container"> 
                <div class="row">
                     <div class="col-sm-12">
                          <div class="card-box">
                                <form class="form-horizontal" action="printperbaikanatm" method="POST" target="blank">

                                        <div class="form-group">
                                            <label class="col-sm-12 control-label">Pilih ATM </label>
                                            <div class="col-sm-12">
                                            <select class="form control select2" name="id_sektoratm" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $atm = $koneksi->query("SELECT * FROM sektor_atm AS sa 
                                                    LEFT JOIN barang AS b ON sa.kode_barang = b.kode_barang");
                                                    foreach ($atm as $item) {
                                                    ?>
                                                        <option value="<?= $item['id_sektoratm'] ?>"><?= $item['kode_barang'] ?> | <?= $item['nama_barang'] ?> | <?= $item['bank'] ?></option>
                                                        
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <hr>
                                        <input type="submit" name="print" class="btn btn-success" value="Print">

                                </form>
                                       
                                </div>
                            </div>                          
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
</div>