<aside class="main-sidebar sidebar-light-green elevation-2" >
  <!-- dark-primary  -->
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?= base_url() ?>/assets/dist/img/logo.jpeg" style="width: 50px;" alt="#" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-light"><b>Qualita</b></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() ?>/assets/dist/img/avatar1.png" class="img-circle elevation-1" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">
          <i>
            <?php
            if ($_SESSION['role'] == "Administrator") {
              echo "Administrator";
            } elseif ($_SESSION['role'] == "Teknisi") {
              echo "Teknisi";
            }
            ?>
          </i>
        </a>
      </div>
    </div>




    <?php if ($_SESSION['role'] == "Administrator") { ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('admin/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sitemap"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/barang') ?>" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>data master</p>
                </a>
              </li>
            </ul>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->



    <?php } elseif ($_SESSION['role'] == "Teknisi") { ?>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
              with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= base_url('teknisi/index') ?>" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->

    <?php } ?>
  </div>
  <!-- /.sidebar -->
</aside>