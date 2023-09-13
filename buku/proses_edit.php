<?php

include '../conn.php';

$id =$_POST['id'];
$nama =$_POST['nama'];

mysqli_query($conn, "update buku set nama ='$nama' where id='$id'");

header('location:index.php');