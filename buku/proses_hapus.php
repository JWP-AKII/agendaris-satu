<?php

include '../conn.php';

$id = $_GET['id'];

mysqli_query($conn, "delete from buku where id='$id'");

header('location:index.php');