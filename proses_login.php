<?php

require_once('conn.php');

if (isset($_POST['send'])) {
   // get from form
   $username = $_POST['username'];
   $password = $_POST['password'];

   $pass = sha1($password);
   $search = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$pass'");

   $row = mysqli_num_rows($search);

   if ($row > 0) {
      // fetch data
      $fetch = mysqli_fetch_object($search);
      $_SESSION['login'] = true;
      $_SESSION['id'] = $fetch->id;
      $_SESSION['nama'] = $fetch->nama;
      $_SESSION['username'] = $fetch->username;

      echo "<script>alert('Antum berhasil login'); window.location.href = 'dashboard';</script>";
      exit;
   } else {
      echo "<script>alert('Upss... Username / Password salah'); window.location.href = 'index.php';</script>";
      exit;
   }
}

?>