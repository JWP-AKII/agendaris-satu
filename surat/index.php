<?php 
require_once('../conn.php');

$sql = "SELECT surat.id as ide, nomor_surat, tanggal_surat, pengirim, penerima, nomor_agenda, tanggal_agenda, buku_id, buku.nama, status, tipe_surat FROM surat 
        INNER JOIN buku ON surat.buku_id=buku.id";
$result = mysqli_query($conn, $sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat</title>
</head>
<body>


<div class="container">
    <a href="tambah.php">Tambah Data</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <th>No</th>
            <th>Nomor Surat</th>
            <th>Tanggal Surat </th>
            <th>Pengirim </th>
            <th>Penerima </th>
            <th>Nomor Agenda </th>
            <th>Tamggal Agenda </th>
            <th>Nama Buku </th>
            <th>Status</th>
            <th>Tipe Surat</th>
            <th>Aksi</th>
        </thead>

        <tbody>

            <?php foreach ($result as $key => $data) :?>
            <tr>
                <td><?php echo $key + 1 ?></td>
                <td><?php echo $data['nomor_surat'] ?></td>
                <td><?php echo $data['tanggal_surat'] ?></td>
                <td><?php echo $data['pengirim'] ?></td>
                <td><?php echo $data['penerima'] ?></td>
                <td><?php echo $data['nomor_agenda'] ?></td>
                <td><?php echo $data['tanggal_agenda'] ?></td>
                <td><?php echo $data['nama'] ?></td>
                <td><?php echo $data['status'] ?></td>
                <td><?php echo $data['tipe_surat'] ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $data['ide'] ?>"> Edit </a>
                    <a href="proses_hapus.php?id=<?php echo $data['ide'] ?>"> Hapus </a>
                </td>
            </tr>
            <?php endforeach ?>

        </tbody>
</div>













</table>



</body>
</html>