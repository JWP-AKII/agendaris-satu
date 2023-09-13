

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Daftar Buku</h1>
    <br>
    <a href="tambah.php">+ Tambah buku</a>
    <table border="1">
    <thead>
        <th>No</th>
        <th>Nama buku</th>
        <th>Created At</th>
        <th>Opsi</th>
    </thead>

    <?php

    include '../conn.php';
    $no =1;
    $data = mysqli_query($conn, "select * from buku");
    while($d = mysqli_fetch_array($data)) {

    ?>

    <tbody>
        <td><?php echo $no++; ?></td>
        <td><?php echo $d['nama']; ?></td>
        <td><?php echo $d['created_at']; ?></td>
        <td>
            <a href="edit.php?id=<?php echo $d['id'];?>">edit</a>
            <a href="proses_hapus.php?id=<?php echo $d['id'];?>">hapus</a>
        </td>
    </tbody>

    <?php } ?>
    </table>
</body>
</html>