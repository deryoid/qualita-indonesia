<?php
require '../../config/config.php';
require '../../config/koneksi.php';
$id   = $_GET['id'];
$data = $koneksi->query("SELECT * FROM maintance WHERE id_maintance  = '$id'");
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
                            <h1 class="m-0 text-dark">Ubah Pemeliharaan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Pemeliharaan</li>
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
                                        <h3 class="card-title">Sektor ATM</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">

                                    
                                    <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Sektor Atm</label>
                                            <div class="col-sm-10">
                                            <select class="form control select2" name="id_sektoratm" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $sd = $koneksi->query("SELECT * FROM sektor_atm ORDER BY id_sektoratm DESC");
                                                    foreach ($sd as $item) {
                                                    ?>
                                                        <option value="<?= $item['id_sektoratm'] ?>"><?= $item['id_sektoratm'] ?><?= $item['kode_barang'] ?></option>
                                                        
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Status Maintance</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control"  value="Preventive Maintenance" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Petugas</label>
                                            <div class="col-sm-10">
                                            <select class="form control select2" name="id_petugas" data-placeholder="Pilih" style="width: 100%;" required>
                                                    <option value=""></option>
                                                    <?php
                                                    $sd = $koneksi->query("SELECT * FROM petugas ORDER BY id_petugas DESC");
                                                    foreach ($sd as $item) {
                                                    ?>
                                                        <option value="<?= $item['id_petugas'] ?>"><?= $item['nama_petugas'] ?></option>
                                                        
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Tanggal Pemeliharaan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tgl_maintance">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Keterangan</label>
                                            <div class="col-sm-10">
                                            <textarea type="text" class="form-control" name="keterangan"></textarea>
                                            </div>
                                        </div>
                                      
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Status Pemeliharaan</label>
                                            <div class="col-sm-10">
                                            <select class="form-control select2" data-placeholder="Pilih" id="status_pemeliharaan" name="status_pemeliharaan">
                                                    <option value="Proses Pemeliharaan" <?php if ($row['status_pemeliharaan'] == "Proses Pemeliharaan") {
                                                                            echo "selected";
                                                                            } ?>>Proses Pemeliharaan</option>
                                                    <option value="Pemeliharaan Selesai" <?php if ($row['status_pemeliharaan'] == "Pemeliharaan Selesai") {
                                                                                echo "selected";
                                                                            } ?>>Pemeliharaan Selesai</option>
                                            </select>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/maintance/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
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
        $status_maintance         = $_POST['status_maintance'];
        $id_petugas          = $_POST['id_petugas'];
        $tgl_maintance      = $_POST['tgl_maintance'];
        $keterangan      = $_POST['keterangan'];
        $status_pemeliharaan      = $_POST['status_pemeliharaan'];

        $submit = $koneksi->query("UPDATE maintance SET  
                            id_sektoratm = '$id_sektoratm',
                            status_maintance = '$status_maintance',
                            id_petugas = '$id_petugas',
                            tgl_maintance = '$tgl_maintance',
                            keterangan = '$keterangan',
                            status_pemeliharaan = '$status_pemeliharaan'
                            WHERE 
                            id_maintance = '$id'");

        if ($submit) {
            $_SESSION['pesan'] = "Data Pemeliharaan Ditambahkan";
            echo "<script>window.location.replace('../maintance/');</script>";
        }
    }

    ?>

</body>

</html>