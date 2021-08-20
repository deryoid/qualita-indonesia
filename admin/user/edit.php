<?php
require '../../config/config.php';
require '../../config/koneksi.php';
?>
<!DOCTYPE html>
<html>
<?php
include '../../templates/head.php';

$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM user  WHERE id_user = '$id'");
$row = $data->fetch_array();
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
                            <h1 class="m-0 text-dark">User</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Data Master</li>
                                <li class="breadcrumb-item active">User</li>
                                <li class="breadcrumb-item active">Tambah Data</li>
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
                                        <h3 class="card-title">Petugas</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <div class="card-body" style="background-color: white;">
                                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Username</label>
                        <div class="col-sm-4">
                        <input type="text" class="form-control" name="username" required="" value="<?= $row['username'] ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Password</label>
                        <div class="col-sm-4">
                        <input type="password" class="form-control form-pass" name="password">
                        <div class="border-checkbox-group border-checkbox-group-primary">
                          <small>
                            <input class="border-checkbox form-cek" type="checkbox" id="checkbox1">
                            <label class="border-checkbox-label" for="checkbox1">Tampilkan Password</label>
                            </small>
                        </div>
                        </div>
                        <label style="color: red; font-style: italic; font-size: 12px;">* Kosongkan Password Jika Tidak Diubah</label>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-1 col-form-label">Role</label>
                        <div class="col-sm-3">
                            <select class="form-control select2" data-placeholder="Pilih Role" id="role" name="role" required="">
                                    <option value="Administator" <?php if ($row['role'] == "Administator") {
                                                              echo "selected";
                                                            } ?>>Administator</option>
                                    <option value="Teknisi" <?php if ($row['role'] == "Teknisi") {
                                                                echo "selected";
                                                              } ?>>Teknisi</option>
                            </select>
                        </div>
                    </div>

  
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer" style="background-color: white;">
                                        <a href="<?= base_url('admin/user/') ?>" class="btn bg-gradient-secondary float-right"><i class="fa fa-arrow-left"> Batal</i></a>
                                        <button type="submit" name="submit" class="btn bg-gradient-primary float-right mr-2"><i class="fa fa-save"> Simpan</i></button>
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
    <script>
  $(document).ready(function(){       
        $('.form-cek').click(function(){
            if($(this).is(':checked')){
                $('.form-pass').attr('type','text');
            }else{
                $('.form-pass').attr('type','password');
            }
        });

        $('#role').on('change', function() {
            if ( this.value == '7'){
            $("#lembaga").slideDown("fast");
          }else{
            $("#lembaga").slideUp("fast");
        }
       
    });

    });
</script>

<?php 
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];

        if (!empty($_POST['password'])) {
           $password = md5($_POST['password']);
        }else{
            $password = $row['password'];
        }
        $role  = $_POST['role'];


    $submit = $koneksi->query("UPDATE user SET username = '$username', password = '$password', role = '$role' WHERE id_user = '$id'");


    if ($submit) {
        $_SESSION['pesan'] = "Data Berhasil Diubah";
        echo "<script>window.location.replace('../user/');</script>";
    }
}

?>
</body>

</html>