<?php

include '../conn.php';

$nama =$_GET['nama'];

mysqli_query($conn, "insert into buku values('', '$nama', '')");

header('location:index.php');