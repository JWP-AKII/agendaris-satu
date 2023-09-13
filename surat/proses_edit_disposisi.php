<?php

require_once('../conn.php');

// update data
if (isset($_POST['update'])) {
   $id = $_GET['id'];
   $disposisi = $_POST['disposisi'];

   $execute = mysqli_query($conn, "UPDATE disposisi_surat SET disposisi = '$disposisi' WHERE id = '$id'");

   if ($execute) {
      echo "<script>alert('Data Berhasil diubah :p'); window.location.href = 'index.php';</script>";
      exit;
   } else {
      echo "<script>alert('Upss... Data gagal diubah'); window.location.href = 'index.php';</script>";
      exit;
   }
}
