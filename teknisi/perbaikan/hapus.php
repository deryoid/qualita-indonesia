<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM perbaikan WHERE id_perbaikan = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "Perbaikan Berhasil dihapus";
   echo "<script>window.location.replace('../perbaikan/');</script>";
}
