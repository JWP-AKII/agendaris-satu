<?php 

require_once "../conn.php";

$id = $_GET['id'];

$data= mysqli_query($conn, "DELETE FROM surat WHERE id=$id");

if ($data) {
    echo "hapus berhasil";
    header ('location:index.php');
}else {
    echo "hapus gagal";
}
?>
