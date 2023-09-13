<?php 

require_once "../conn.php";

$id = $_GET['id'];

$data= mysqli_query($conn, "DELETE FROM surat WHERE id=$id");

if ($data) {
    echo "<script>alert('Data Berhasil dihapus :p'); window.location.href = 'index.php';</script>";
    exit;
}else {
    echo "hapus gagal";
}
?>
