<?php 
require_once('../conn.php');

if (isset($_POST['tambah'])) {
    $nomor_surat = $_POST['nomor_surat'];
    $tanggal_surat = $_POST['tanggal_surat'];
    $pengirim = $_POST['pengirim'];
    $penerima = $_POST['penerima'];
    $nomor_agenda = $_POST['nomor_agenda'];
    $tanggal_agenda = $_POST['tanggal_agenda'];
    $buku = $_POST['buku'];
    $status = $_POST['status'];
    $tipe_surat = $_POST['tipe_surat'];
    $date = date('Y-m-d H:i:s');



    $sql = "INSERT INTO surat VALUES
            (NULL, '$nomor_surat', '$tanggal_surat', '$pengirim', '$penerima', '$nomor_agenda', '$tanggal_agenda', '$buku', '$status', '$tipe_surat', '$date')";

    $result = mysqli_query($conn, $sql);
    
    if ($result) {
        echo "<script>alert('Data Berhasil ditambah :p'); window.location.href = 'index.php';</script>";
        exit;
    } else{
        echo mysqli_error($conn);
    }
}

