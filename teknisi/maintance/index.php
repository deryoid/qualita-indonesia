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
                            <h1 class="m-0 text-dark">Pemeliharaan ATM</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <!-- <li class="breadcrumb-item"><a href="#">Data Master</a></li> -->
                                <li class="breadcrumb-item active">Pemeliharaan ATM</li>
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
                                                    <th>Sektor Barang</th>
                                                    <th>Status</th>
                                                    <th>Petugas</th>
                                                    <th>Tanggal Pemeliharaan</th>
                                                    <th>Keterangan</th>
                                                    <th>Status</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <?php
                                            $no = 1;
                                            $data = $koneksi->query("SELECT * FROM maintance AS m
                                            LEFT JOIN sektor_atm AS sa ON m.id_sektoratm = sa.id_sektoratm
                                            LEFT JOIN barang AS b ON sa.kode_barang = b.kode_barang
                                            LEFT JOIN petugas AS p ON m.id_petugas = p.id_petugas
                                            WHERE  p.id_petugas = '$_SESSION[id_petugas]' ORDER BY m.id_maintance DESC");
                                            while ($row = $data->fetch_array()) {
                                            ?>
                                                <tbody style="background-color: white">
                                                    <tr>
                                                        <td align="center"><?= $no++ ?></td>
                                                        <td>
                                                            <ul>
                                                                <li>Kode Barang : <?= $row['kode_barang'] ?></li>
                                                                <li>Lokasi Atm : <?= $row['lokasi_atm'] ?></li>
                                                                <li>Link : <a href="<?= $row['link_gmap'] ?>" target="blank" class="fa fa-map-marked-alt">Lihat Map</a> </li>
                                                                <li>Tanggal Peletakan :<?= $row['tgl_peletakan'] ?></li>
                                                            </ul>
                                                       </td>
                                                        <td><?= $row['status_maintance'] ?></td>
                                                        <td><?= $row['nama_petugas'] ?></td>
                                                        <td><?= $row['tgl_maintance'] ?></td>
                                                        <td><?= $row['keterangan'] ?></td>
                                                        <td><?= $row['status_pemeliharaan'] ?></td>
                                                        <td align="center">
                                                            <a href="edit?id=<?= $row['id_maintance'] ?>" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                            
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
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

        $data = $koneksi->query("SELECT * FROM maintance AS m
        LEFT JOIN sektor_atm AS sa ON m.id_sektoratm = sa.id_sektoratm
        LEFT JOIN barang AS b ON sa.kode_barang = b.kode_barang
        LEFT JOIN petugas AS p ON m.id_petugas = p.id_petugas
        WHERE id_maintance = '$id'
        ")->fetch_array();
// var_dump($data);die();
        
            $email = $data['email'];
            $kode_barang = $data['kode_barang'];
            $lokasi_atm = $data['lokasi_atm'];
            $link_gmap = $data['link_gmap'];
            $tgl_maintance = $data['tgl_maintance'];

            require_once('../../assets/phpmail/class.phpmailer.php');
            require_once('../../assets/phpmail/class.smtp.php');
            $mail = new PHPMailer();

            $body = "Pemberitahuan Maintance untuk Sektor ".$data['kode_barang']." ".$data['lokasi_atm']." ".$data['link_gmap']." ".$data['tgl_maintance'];

            // $mail->CharSet =  "utf-8";
            $mail->IsSMTP();
            // enable SMTP authentication
            $mail->SMTPDebug  = 1;
            $mail->SMTPAuth = true;
            // GMAIL username
            $mail->Username = "qualita.indonesia.test@gmail.com";
            // GMAIL password
            $mail->Password = "qiindonesiatest123";
            $mail->SMTPSecure = "ssl";
            // sets GMAIL as the SMTP server
            $mail->Host = "smtp.gmail.com";
            // set the SMTP port for the GMAIL server
            $mail->Port = "465";
            $mail->From = 'qualita.indonesia.test@gmail.com';
            $mail->FromName = 'Admin Maintance PT.Qualita Indonesia';


            $mail->AddAddress($email);
            $mail->Subject  =  'Maintance';
            $mail->IsHTML(true);
            $mail->MsgHTML($body);
            if ($mail->Send()) {
                $_SESSION['pesan'] = "Maintance Dikirimkan";
                echo "<script> 
                window.location.replace('../maintance/');
                </script>"; //jika pesan terkirim

            } else {
                $_SESSION['pesan'] = "Gagal".$mail->ErrorInfo;
                echo "<script> 
                            window.location = 'index'; 
                        </script>";
            }
        }
    
    ?>

    

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
                                <form class="form-horizontal" action="printmaintance" method="POST" target="blank">

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