<?php

require_once('../conn.php');

if (empty($_GET['id'])) {
   echo "<script>window.location.href = 'index.php';</script>";
   exit;
}

$id = $_GET['id'];

if(isset($_POST['save'])) {
   $status = $_POST['status'];
   $user = $_POST['user'];
   $disposisi = $_POST['disposisi'];
   // update status surat
   $upd = mysqli_query($conn, "UPDATE surat SET status = '$status' WHERE id = '$id'");
   
   if($upd) {
      $idx = $_SESSION['id'];
      // jika sukses, lanjut ke disposisi
      mysqli_query($conn, "INSERT INTO disposisi_surat(user_id,surat_id,disposisi) VALUES('$idx', '$id', '$disposisi')");
      $dispo = mysqli_query($conn, "INSERT INTO disposisi_surat(user_id,surat_id,disposisi) VALUES('$user', '$id', '-')");

      if($dispo) {
         header("location: detail.php?id=$id");
      } else {
         echo "gagal submit disposisi";
      }
   } else {
      echo "gagal update status";
   }
}

?>