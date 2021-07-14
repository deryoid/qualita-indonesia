<?php
require '../../config/config.php';
require '../../config/koneksi.php';
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM perbaikan WHERE id_perbaikan = '$id'");
$row  = $data->fetch_array();
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
                            <h1 class="m-0 text-dark">Ubah Perbaikan ATM</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Perbaikan ATM</li>
                                <li class="breadcrumb-item active">Ubah Data</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- left column -->
                    <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12">
                                <!-- Horizontal Form -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Perbaikan ATM</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">

                                    <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Kode Barang</label>
                                            <div class="col-sm-10">
                                            <select class="form control select2" name="id_sektoratm" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $sd = $koneksi->query("SELECT * FROM sektor_atm AS sa 
                                                    LEFT JOIN barang AS b ON sa.kode_barang = b.kode_barang WHERE sa.status = 'Tidak Aktif'");
                                                    foreach ($sd as $item) {
                                                    ?>
                                                       <option value="<?= $item['id_sektoratm'] ?>" <?php if ($item['id_sektoratm'] == $item['id_sektoratm']) {
                                                                            echo 'selected';
                                                                        } ?>><?= $item['kode_barang'] ?><?= $item['nama_barang'] ?></option>
                                                        
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Tanggal Perbaikan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tanggal_perbaikan" value="<?= $row['tanggal_perbaikan'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tanggal_selesai"  value="<?= $row['tanggal_selesai'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Status Perbaikan</label>
                                            <div class="col-sm-10">
                                            <select class="form-control select2" data-placeholder="Pilih" id="status_perbaikan" name="status_perbaikan">
                                                    <option value="Sedang Diperbaiki" <?php if ($row['status_perbaikan'] == "Sedang Diperbaiki") {
                                                                            echo "selected";
                                                                            } ?>>Sedang Diperbaiki</option>
                                                    <option value="Perbaikan Selesai" <?php if ($row['status_perbaikan'] == "Perbaikan Selesai") {
                                                                                echo "selected";
                                                                            } ?>>Perbaikan Selesai</option>
                                            </select>
                                            </div>
                                        </div>
                                       

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/perbaikan/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
                                        <button type="submit" name="submit" class="btn bg-gradient-primary float-right mr-2"><i class="fa fa-save"> Ubah</i></button>
                                    </div>
                                    <!-- /.card-footer -->

                                </div>

                            </div>
                            <!--/.col (left) -->
                        </div>

                    </form>

                </div><!-- /.container-fluid -->
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


    <?php
    if (isset($_POST['submit'])) {
        $id_sektoratm        = $_POST['id_sektoratm'];
        $tanggal_perbaikan   = $_POST['tanggal_perbaikan'];
        $tanggal_selesai     = $_POST['tanggal_selesai'];
        $status_perbaikan    = $_POST['status_perbaikan'];

        $submit = $koneksi->query("UPDATE perbaikan SET  
                            id_sektoratm = '$id_sektoratm',
                            tanggal_perbaikan = '$tanggal_perbaikan',
                            tanggal_selesai = '$tanggal_selesai',
                            status_perbaikan = '$status_perbaikan'
                            WHERE 
                            id_perbaikan = '$id'");

        if ($submit) {
            $_SESSION['pesan'] = "Data Perbaikan Ditambahkan";
            echo "<script>window.location.replace('../perbaikan/');</script>";
        }
    }

    ?>

</body>

</html>