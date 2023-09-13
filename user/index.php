<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>User</h1>
    <br>
    <a href="tambah.php">+ Tambah User</a>
    <table border=1px>
        <thead>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Jabatan</th>
            <th>Created At</th>
            <th>Opsi</th>
        </thead>

        <?php
        
        include '../conn.php';
        $data =mysqli_query($conn, "select * from user");
        $no=1;
        while($d =mysqli_fetch_array($data)) { ?>
        
        <tbody>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['username']; ?></td>
            <td><?php echo $d['password']; ?></td>
            <td><?php echo $d['jabatan']; ?></td>
            <td><?php echo $d['created_at']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $d['id']?>">Edit</a>
                <a href="proses_hapus.php?id=<?php echo $d['id']?>">Hapus</a>
            </td>
        </tbody>

        <?php } ?>

    </table>
</body>
</html>