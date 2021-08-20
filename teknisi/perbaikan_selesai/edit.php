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
                                            <?php
                                                    $sd = $koneksi->query("SELECT * FROM sektor_atm AS sa 
                                                    LEFT JOIN barang AS b ON sa.kode_barang = b.kode_barang WHERE sa.status = 'Tidak Aktif'")->fetch_array();
                                                    ?>
                                            <input type="text" class="form-control"  value="<?= $sd['kode_barang'] ?><?= $sd['nama_barang'] ?>" readonly>
                                           
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Petugas</label>
                                            <div class="col-sm-10">
                                            <?php
                                                    $sd = $koneksi->query("SELECT * FROM petugas WHERE id_petugas = '$_SESSION[id_petugas]'")->fetch_array();
                                                    ?>
                                            <input type="text" class="form-control"  value="<?= $sd['nama_petugas'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Tanggal Perbaikan</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" value="<?= $row['tanggal_perbaikan'] ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 500px; height: 250px;">
                                                        <img src="<?= base_url() ?>/filependukung/<?= $row['foto_sebelum']?>" alt="">
                                                    </div>
                                                   
                                                    
                                                </div>
                                            </div>
                                        </div> 

                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tanggal_selesai"  value="<?= $row['tanggal_selesai'] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                                    <div class="fileupload-new thumbnail" style="width: 500px; height: 250px;">
                                                        <img src="<?= base_url() ?>/filependukung/<?= $row['foto_sesudah']?>" alt="">
                                                    </div>
                                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 500px; max-height: 250px; line-height: 20px;"></div>
                                                    <div>
                                                        <span class="btn btn btn-success btn-file">
                                                            <span class="fileupload-new">
                                                                <i class="fa fa-images"> Upload Foto</i>
                                                            </span>
                                                            <span class="fileupload-exists">
                                                                <i class="fa fa-images"> Ubah Foto</i>
                                                            </span>
                                                            <input type="file" name="foto_sesudah" >
                                                        </span>
                                                        <a href="#" class="btn btn-danger fileupload-exists btn-light-grey" data-dismiss="fileupload">
                                                            <i class="fa fa-times"></i> Hapus
                                                        </a>
                                                    </div>
                                                </div>
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
                                        <a href="<?= base_url('teknisi/perbaikan_selesai/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
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
        $tanggal_selesai     = $_POST['tanggal_selesai'];
        $status_perbaikan    = $_POST['status_perbaikan'];

        
// upload slip bayar
       $es = "";
// CEK APAKAH FOTO DIGANTI
        if (!empty($_FILES['foto_sesudah']['name'])) {
            $foto_sesudahlama = $row['foto_sesudah'];

            // UPLOAD FOTO PEMOHON
            $foto_sesudah      = $_FILES['foto_sesudah']['name'];
            $x_foto_sesudah    = explode('.', $foto_sesudah);
            $ext_foto_sesudah  = end($x_foto_sesudah);
            $nama_foto_sesudah = rand(1, 99999) . '.' . $ext_foto_sesudah;
            $size_foto_sesudah = $_FILES['foto_sesudah']['size'];
            $tmp_foto_sesudah  = $_FILES['foto_sesudah']['tmp_name'];
            $dir_foto_sesudah  = '../../filependukung/';
            $allow_ext        = array('png', 'jpg', 'jpeg');
            $allow_size       = 1024 * 1024 * 1;
            // var_dump($nama_foto); die();

            if (in_array($ext_foto_sesudah, $allow_ext) === true) {
                if ($size_foto_sesudah <= $allow_size) {
                    move_uploaded_file($tmp_foto_sesudah, $dir_foto_sesudah . $nama_foto_sesudah);
                    if (file_exists($dir_foto_sesudah . $foto_sesudahlama)) {
                        unlink($dir_foto_sesudah . $foto_sesudahlama);
                    }
                    $es .= "Upload Success"; 
                } else {
                    echo "
                <script type='text/javascript'>
                setTimeout(function () {    
                    swal({
                        title: '',
                        text:  'Ukuran Foto  Terlalu Besar, Maksimal 1 Mb',
                        type: 'warning',
                        timer: 3000,
                        showConfirmButton: true
                    });     
                },10);  
                window.setTimeout(function(){ 
                    window.history.back();
                } ,2000);   
                </script>";
                }
            } else {
                echo "
            <script type='text/javascript'>
            setTimeout(function () {    
                swal({
                    title: 'Format File Tidak Didukung',
                    text:  'Format File Harus Berupa PNG atau JPG',
                    type: 'warning',
                    timer: 3000,
                    showConfirmButton: true
                });     
            },10);  
            window.setTimeout(function(){ 
                window.history.back();
            } ,2000);   
            </script>";
            }
        } else {    
            $nama_foto_sesudah = $row['foto_sesudah']; 
            $es .= "Upload Success!"; 
        }

if (!empty($es)) {

        $submit = $koneksi->query("UPDATE perbaikan SET  
                            tanggal_selesai = '$tanggal_selesai',
                            foto_sesudah = '$nama_foto_sesudah',
                            status_perbaikan = '$status_perbaikan'
                            WHERE 
                            id_perbaikan = '$id'");
// var_dump($submit, $koneksi->error); die();
if ($submit) {
    $koneksi->query("UPDATE sektor_atm SET  
            status = 'Aktif'
            WHERE 
            id_sektoratm = '$row[id_sektoratm]'");
    
    
            $_SESSION['pesan'] = "Data Perbaikan Ditambahkan";
            echo "<script>window.location.replace('../perbaikan_selesai/');</script>";
        }
    }
}
    ?>

</body>

</html>