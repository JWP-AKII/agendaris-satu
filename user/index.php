<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th>Jabatan</th>
            <th>Created At</th>
        </thead>

        <?php
        
        include '../conn.php';
        $data =mysqli_query($conn, "select * from user");
        $no=1;
        while($d =mysqli_fetch_array($data)) { ?>
        
        <tbody>
            <td><?php $no++; ?></td>
            <td><?php $d['username']; ?></td>
            <td><?php $d['password']; ?></td>
            <td><?php $d['jabatan']; ?></td>
            <td><?php $d['created_at']; ?></td>
        </tbody>

        <?php } ?>

    </table>
</body>
</html>