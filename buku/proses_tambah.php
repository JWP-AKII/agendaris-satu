<?php

require_once('../conn.php');

if (isset($_POST['save'])) {
   $nama = $_POST['nama'];

   $execute = mysqli_query($conn, "INSERT INTO buku(nama) VALUES('$nama')");

   if ($execute) {
      echo "<script>alert('Data Berhasil disimpan :p'); window.location.href = 'index.php';</script>";
      exit;
   } else {
      echo "<script>alert('Upss... Data gagal disimpan'); window.location.href = 'index.php';</script>";
      exit;
   }
}