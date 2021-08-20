<?php
require '../config/config.php';
require '../config/koneksi.php';
require '../config/tglindo.php';
?>
<!DOCTYPE html>
<html>
<?php
include '../templates/head.php';
$pengumuman = $koneksi->query("SELECT * FROM perbaikan AS p 
LEFT JOIN sektor_atm AS sa ON p.id_sektoratm = sa.id_sektoratm 
LEFT JOIN barang AS b ON sa.kode_barang = b.kode_barang
LEFT JOIN petugas AS ptg ON p.id_petugas = ptg.id_petugas 
WHERE sa.status = 'Tidak Aktif' AND p.id_petugas = '$_SESSION[id_petugas]' ORDER BY p.id_perbaikan DESC");

?>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php
    include '../templates/navbar.php';
    ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php
    include '../templates/sidebar.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <div class="content-header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Catatan User</h1>
            </div>

            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard </li>
              </ol>
            </div>

          </div>
        </div>
      </div>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Small boxes (Stat box) -->

          <div class="alert alert-info" role="alert">
            <h5><b>
                <i class="fa fa-info-circle"></i>
                "Melayani Dengan Sungguh Sungguh"
              </b></h5>
          </div>

          <div class="row">
           <!-- /.col -->
           <?php foreach ($pengumuman as $p) { ?>
          <div class="col-md-12">
            
          
            <!-- Box Comment -->
            <div class="card card-widget" >
              <div class="card-header" style="background-color:dodgerblue;">
                <div class="user-block">
                  <img class="img-circle" src="<?= base_url() ?>/assets/dist/img/logo.jpeg" alt="User Image">
                  <span class="username" ><a href="#" style="color:white;">Qualita Indonesia</a></span>
                  <span class="description" style="color:white;">Tanggal Perbaikan <?php echo tgl_indo($p['tanggal_perbaikan']);?></span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                  <!-- <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                    <i class="far fa-circle"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button> -->
                </div>
                <!-- /.card-tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- post text -->
                <h3>Perbaikan ATM</h3>
                <hr>
                <p>
                <tbody style="background-color: white">
                    <tr>
                            <ul>
                            <li>Kode ATM : <?= $p['kode_barang'] ?></li>
                            <li>Nama ATM : <?= $p['nama_barang'] ?></li>
                            <li>Tanggal Peletakan : <?= $p['tgl_peletakan'] ?></li>
                            <li>Status Engine : <?= $p['status'] ?></li>
                            
                            <li><?= $p['lokasi_atm'] ?></li>
                            <li><a href="<?= $p['link_gmap'] ?>" target="blank" class="fa fa-map-marked-alt"> Lihat Map</a></li>
                            <li><?= $p['tanggal_perbaikan'] ?></li>
                            <li><?= $p['status_perbaikan'] ?></li>
                            </ul>
                </tbody>
                </p>
                
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
          </div>
          <?php }?>

          </div>
          <!-- /.row -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->
    <?php
    include '../templates/footer.php';
    ?>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- Script -->
  <?php
  include '../templates/script.php';
  ?>
</body>

</html>

