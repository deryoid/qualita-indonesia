<?php
require '../config/config.php';
?>
<!DOCTYPE html>
<html>
<?php
include '../templates/head.php';
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
              <h1 class="m-0 text-dark">Dashboard</h1>
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


          <div class="info-box bg-info">
              <span class="info-box-icon"><i class="far fa-file-alt"></i></span>

              <div class="info-box-content">
                <h3><span class="info-box-text">"Selamat Datang Di PT. QUALITA INDONESIA"</span></h3>
                <!-- <span class="info-box-number">41,410</span> -->

                <div class="progress">
                  <!-- <div class="progress-bar" style="width: 70%"></div> -->
                </div>
                <span class="progress-description">
                  <!-- 70% Increase in 30 Days -->
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>


          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <center>
                    <!-- <img src="<?= base_url() ?>/assets/dist/img/logo.jpeg" height="600" width="850"> -->
                    <iframe width="100%" height="432" src="https://www.youtube.com/embed/z7Ao_h3ytP0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </center>
                </div>
              </div>
            </div>
          </div>


          <div class="col-md-12">

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