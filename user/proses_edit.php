<?php

    include '../conn.php';

    $id=$_POST['id'];

    $username=$_POST['username'];
    $password=$_POST['password'];
    $jabatan=$_POST['jabatan'];

    mysqli_query($conn, "update user set username = '$username', password = '$password', jabatan='$jabatan' where id='$id'");

    header('location:index.php');

?>