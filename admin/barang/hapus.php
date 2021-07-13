<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM barang WHERE kode_barang = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "Barang Berhasil dihapus";
   echo "<script>window.location.replace('../barang/');</script>";
}
