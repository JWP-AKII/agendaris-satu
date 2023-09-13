 <?php

   include '../conn.php';

   $nama = $_POST['nama'];
   $username = $_POST['username'];
   $password = sha1($_POST['password']);
   $jabatan = $_POST['jabatan'];

   mysqli_query($conn, "INSERT INTO user(nama,username,password,jabatan) VALUES('$nama', '$username', '$password', '$jabatan')");

   header('location:index.php');

   ?>