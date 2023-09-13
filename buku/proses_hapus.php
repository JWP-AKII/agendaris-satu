<?php

require_once('../conn.php');

$id = $_GET['id'];
$remove = mysqli_query($conn, "DELETE FROM buku WHERE id = '$id'");

// check info
if ($remove) {
   echo "<script>alert('Data berhasil dihapus :p'); window.location.href = 'index.php';</script>";
   exit;
} else {
   echo "<script>alert('Data gagal dihapus, cek kembali kode anda'); window.location.href = 'index.php';</script>";
   exit;
}