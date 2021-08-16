<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM petugas WHERE id_petugas = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "petugas Berhasil dihapus";
   echo "<script>window.location.replace('../petugas/');</script>";
}
