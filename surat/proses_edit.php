<?php 

require_once "../conn.php";

$id = $_GET['id'];

if (isset($_POST['simpan'])) {
    $nosurat= $_POST['nomor_surat'];
    $tasurat= $_POST['tanggal_surat'];
    $pengirim= $_POST['pengirim'];
    $penerima= $_POST['penerima'];
    $noagenda= $_POST['nomor_agenda'];
    $taagenda= $_POST['tanggal_agenda'];
    $bukuid= $_POST['buku_id'];
    $status= $_POST['status'];
    $tisurat= $_POST['tipe_surat'];

    $sql= "UPDATE surat 
            SET nomor_surat='$nosurat',
            tanggal_surat='$tasurat',
            pengirim='$pengirim',
            penerima='$penerima',
            nomor_agenda='$noagenda',
            tanggal_agenda='$taagenda',
            buku_id='$bukuid',
            status='$status',
            tipe_surat='$tisurat' WHERE id=$id";

    $data= mysqli_query($conn, $sql);

    if ($data) {
        echo "<script>alert('Data Berhasil diubah :p'); window.location.href = 'index.php';</script>";
        exit;
    } else {
        echo "perubahan gagal";
    }
}

?>
