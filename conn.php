<?php

session_start();
error_reporting(2);
date_default_timezone_set('Asia/Makassar');

// conn DB
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "latihan_surat";

$conn = mysqli_connect($host, $user, $pass, $dbname);

// cek apakah koneksi benar atau salah
if(!$conn) {
   echo "<script>alert('Koneksi gagal, perhatikan config nya!'); window.location.reload()</script>";
   exit();
}

?>