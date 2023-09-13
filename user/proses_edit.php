<?php

    include '../conn.php';

    $id=$_GET['id'];

    $username=$_POST['username'];
    $password=sha1($_POST['password']);
    $jabatan=$_POST['jabatan'];

    if(empty($_POST['password'])) {
    mysqli_query($conn, "UPDATE user SET username = '$username', jabatan='$jabatan' WHERE id='$id'");
    } else {
    mysqli_query($conn, "UPDATE user SET username = '$username', password = '$password', jabatan='$jabatan' WHERE id='$id'");
    }

    header('location:index.php');

?>