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
                            <h1 class="m-0 text-dark">Progres Perbaikan ATM</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">Data Master</a></li> -->
                                <li class="breadcrumb-item active">Progres Perbaikan ATM</li>
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
                                    <!-- <a href="print" target="blank" class="btn bg-white"><i class="fa fa-print"> Cetak</i></a> -->
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
                                                    <th>Foto Sebelum Perbaikan</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM perbaikan AS p 
                                            LEFT JOIN sektor_atm AS sa ON p.id_sektoratm = sa.id_sektoratm 
                                            LEFT JOIN barang AS b ON sa.kode_barang = b.kode_barang
                                            LEFT JOIN petugas AS ps ON p.id_petugas = ps.id_petugas
                                            WHERE sa.status = 'Tidak Aktif' AND p.id_petugas = '$_SESSION[id_petugas]' ORDER BY p.id_perbaikan DESC");
                                            while ($row = $data->fetch_array()) {
                                            ?>
                                                <tbody style="background-color: white">
                                                    <tr>
                                                        <td align="center"><?= $no++ ?></td>
                                                        <td>
                                                            <ul>
                                                            <li>Kode ATM : <b><?= $row['kode_barang'] ?></b></li>
                                                            <li>ATM : <b><?= $row['bank'] ?></b></li>
                                                            <li>Nama ATM : <b><?= $row['nama_barang'] ?></b></li>
                                                            <li>Tanggal Peletakan : <b><?= $row['tgl_peletakan'] ?></b></li>
                                                            <li>Status Engine : <b><?= $row['status'] ?></b></li>
                                                            </ul>
                                                        </td>
                                                        <td><?= $row['nama_petugas'] ?></td>
                                                        <td>
                                                            <ul>
                                                            <li><?= $row['lokasi_atm'] ?></li>
                                                            <li>Kecamatan : <b><?= $row['kecamatan'] ?></b></li>
                                                            <li><a href="<?= $row['link_gmap'] ?>" target="blank" class="fa fa-map-marked-alt"> Lihat Map</a></li>
                                                            </ul>
                                                        </td>
                                                        <td><?= $row['tanggal_perbaikan'] ?></td>
                                                        <td><a href="<?= base_url() ?>/filependukung/<?= $row['foto_sebelum'] ?>" data-toggle="lightbox" data-title="Foto Sebelum Perbaikan"><i class="fa fa-images"></i> Foto Sebelum</a></td>
                                                        <td align="center">
                                                            <a href="edit?id=<?= $row['id_perbaikan'] ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                            <!-- <a href="hapus?id=<?= $row['id_perbaikan'] ?>" class="btn btn-danger btn-sm alert-hapus" title="Hapus"><i class="fa fa-trash"></i></a> -->
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