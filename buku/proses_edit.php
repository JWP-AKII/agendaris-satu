<?php

require_once('../conn.php');

// update data
if (isset($_POST['update'])) {
   $id = $_GET['id'];
   $nama = $_POST['nama'];

   $execute = mysqli_query($conn, "UPDATE buku SET nama = '$nama' WHERE id = '$id'");

   if ($execute) {
      echo "<script>alert('Data Berhasil diubah :p'); window.location.href = 'index.php';</script>";
      exit;
   } else {
      echo "<script>alert('Upss... Data gagal diubah'); window.location.href = 'index.php';</script>";
      exit;
   }
}