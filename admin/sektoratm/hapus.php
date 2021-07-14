<?php

require '../../config/config.php';
require '../../config/koneksi.php';

$id    = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM sektor_atm WHERE id_sektoratm = '$id'");

if ($hapus) {
   $_SESSION['pesan'] = "Sektor ATM Berhasil dihapus";
   echo "<script>window.location.replace('../sektoratm/');</script>";
}
