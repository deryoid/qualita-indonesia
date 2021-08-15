<?php
include_once "config/config.php";

// if($_SESSION['id_masyarakat']){
//     header("location:javascript://history.go(-1)");
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>E-Lok | Banjarmasin Utara</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?= base_url() ?>/assets/img/logo-bjm.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/template/login-user/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/template/login-user/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/template/login-user/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/template/login-user/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/template/login-user/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/template/login-user/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/plugins/toastr/toastr.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/template/login-user/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/template/login-user/css/main.css">
    <!--===============================================================================================-->

    <style type="text/css">
        .loading-halaman::before {
            content: " ";
            display: block;
            position: fixed;
            z-index: 10;
            height: 3px;
            width: 100%;
            top: 0;
            left: 0;
            background-color: #ff0505;
            -webkit-animation: load-halaman ease-out 2s;
            animation: load-halaman ease-out 2s;
        }

        @-webkit-keyframes load-halaman {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        @keyframes load-halaman {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('<?= base_url() ?>/assets/bg-cover/kantor1.jpg');">
            <div class="wrap-login100 p-b-30">
                <form class="login100-form validate-form" action="" method="POST">
                    <!-- <div class="login100-form-avatar">
                        <img src="images/avatar-01.jpg" alt="AVATAR">
                    </div> -->

                    <span class="login100-form-title p-b-45">
                        LOGIN MASYARAKAT
                    </span>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="NIK Tidak Boleh Kosong">
                        <input class="input100" type="text" name="nik" placeholder="NIK">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate="Password Tidak Boleh Kosong">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="g-recaptcha" style="text-align: center; padding-left: 45px; justify-content: center;" data-sitekey="6LeKrb4ZAAAAAC5zORPJNdM2kIRORQ8FiWMI-MzX"></div>

                    <div class="container-login100-form-btn p-t-10">
                        <button class="login100-form-btn m-b-5" type="submit" name="login">
                            Login
                        </button>

                        <a href="<?= base_url('regis') ?>" class="login100-form-btn" style="background-color: #228B22;">
                            Registrasi
                        </a>

                        <div class="text-center w-full p-t-10">
                            <span class="txt1">
                                Lupa Password ?
                                <a href="#" data-toggle="modal" data-target="#modal-lupa-password" style="color: yellow;">Klik Disini</a>
                            </span>
                        </div>
                    </div>

                    <div class="text-center w-full p-t-25">
                        <span class="txt1">
                            <a href="<?= base_url('dashboard') ?>" class="txt1">
                                <i class="fa fa-arrow-left">
                                    Kembali Ke Dashboard
                                </i>
                            </a>
                        </span>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="<?= base_url() ?>/template/login-user/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>/template/login-user/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url() ?>/template/login-user/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>/template/login-user/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>/assets/plugins/toastr/toastr.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url() ?>/template/login-user/js/main.js"></script>
    <!-- Link javascript untuk api reCAPTCHA -->
    <script src='https://www.google.com/recaptcha/api.js'></script>


    <!-- Modal -->
    <div class="modal fade" id="modal-lupa-password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lupa Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="number" class="form-control" name="nik" maxlength="18" required placeholder="Masukkan NIK KTP Anda">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" required placeholder="Masukkan Email Anda">
                        </div>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="submit" name="lupa_password" class="btn btn-primary url_loader">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var links = document.getElementsByClassName("url_loader"),
            i = 0,
            l = links.length,
            body = document.body;

        for (; i < l; i++) {
            links[i].addEventListener("click", function() {
                body.className = "loading-halaman";
                setTimeout(function() {
                    body.className = "";
                }, 30000);
            }, false);
        }
    </script>

    <?php
    if (isset($_POST['lupa_password'])) {
        $nik   = $_POST['nik'];
        $email = $_POST['email'];

        $cek = $koneksi->query("SELECT nik, nama, email, password FROM masyarakat WHERE nik = '$nik' AND email = '$email'")->fetch_array();
        if (!$cek) {
            echo "
                    <script type='text/javascript'>
                        toastr.error('NIK atau Email Tidak Ditemukan');  
                    </script>";
        } else {
            $nama  = $cek['nama'];
            $email = $cek['email'];
            $pass  = $cek['password'];

            require_once('assets/phpmail/class.phpmailer.php');
            require_once('assets/phpmail/class.smtp.php');
            $mail = new PHPMailer();

            $body = "Klik link berikut untuk reset Password akun Elok Anda, <a href='http://localhost/layanan-kecamatan/reset_password.php?reset=$pass&key=$email'>$pass<a>";

            // $mail->CharSet =  "utf-8";
            $mail->IsSMTP();
            // enable SMTP authentication
            $mail->SMTPDebug  = 1;
            $mail->SMTPAuth = true;
            // GMAIL username
            $mail->Username = "elok.utara@gmail.com";
            // GMAIL password
            $mail->Password = "AdminElokUtara123";
            $mail->SMTPSecure = "ssl";
            // sets GMAIL as the SMTP server
            $mail->Host = "smtp.gmail.com";
            // set the SMTP port for the GMAIL server
            $mail->Port = "465";
            $mail->From = 'elok.utara@gmail.com';
            $mail->FromName = 'Admin Elok Kecamatan Banjarmasin Utara';

            $email = $_POST['email'];

            $mail->AddAddress($email, $nama);
            $mail->Subject  =  'Reset Password';
            $mail->IsHTML(true);
            $mail->MsgHTML($body);
            if ($mail->Send()) {
                echo "<script> 
                            toastr.success('Link reset password telah dikirim ke email anda, Cek email untuk melakukan reset'); 
                            window.location.replace = '" . base_url() . "'; 
                        </script>"; //jika pesan terkirim

            } else {
                echo "<script> 
                            toastr.error('Mail Error - > " . $mail->ErrorInfo . "'); 
                            window.location = 'index.html'; 
                        </script>";
            }
        }
    }
    ?>

    <?php
    if (isset($_POST['login'])) {
        $nik     = mysqli_real_escape_string($koneksi, $_POST['nik']);
        $pass    = mysqli_real_escape_string($koneksi, $_POST['password']);
        $captcha = $_POST['g-recaptcha-response'];

        $secretKey    = "6LeKrb4ZAAAAACxHcpT2kHPYxmVaNTTDbHaKud2b";
        $ip           = $_SERVER['REMOTE_ADDR'];
        $response     = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $captcha . "&remoteip=" . $ip);
        $responseKeys = json_decode($response, true);

        // echo "<pre>";
        // var_dump($responseKeys);
        // die;

        if (intval($responseKeys["success"]) == false) {
            echo "
            <script type='text/javascript'>
                setTimeout(function () {    
                    toastr.error('Captcha Belum Dicentang !');      
                },30);  
                window.setTimeout(function(){ 
                    window.location.replace = '" . base_url() . "'; 
                } ,3000);  
            </script>";
        } else {

            $query = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE nik = '$nik'");

            // CEK USERNAME
            if (mysqli_num_rows($query) === 1) {

                // CEK PASSWORD
                $data = mysqli_fetch_array($query);
                if (password_verify($pass, $data["password"])) {

                    $id_masyarakat = $data['id_masyarakat'];
                    $nama          = $data['nama'];
                    $_SESSION['id_masyarakat'] = $id_masyarakat;
                    $_SESSION['nama']          = $nama;

                    // log
                    $ket  = "Login Masyarakat -> NIK = " . $data['nik'];
                    $koneksi->query("INSERT INTO log VALUES(null, '$ket', CURRENT_TIME(), '$nama', null, null)");
                    // --Log

                    echo "
                    <script type='text/javascript'>
                    setTimeout(function () {    
                        toastr.success('Login Berhasil');     
                    },10);
                    window.setTimeout(function(){ 
                        window.location.replace('" . base_url('dashboard') . "');
                    } ,1800);   
                    </script>";
                } else {
                    echo "
                <script type='text/javascript'>
                    toastr.error('NIK atau Password Tidak Ditemukan');  
                </script>";
                }
            } else {
                echo "
                <script type='text/javascript'>
                    toastr.error('NIK atau Password Tidak Ditemukan');  
                </script>";
            }
        }
    }
    ?>

</body>

</html>