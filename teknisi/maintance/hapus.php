<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM maintance WHERE id_maintance = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "Maintance ATM Berhasil dihapus";
   echo "<script>window.location.replace('../maintance/');</script>";
}
