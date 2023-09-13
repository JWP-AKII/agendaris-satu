<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    
    <h2>Edit</h2>

    <?php

        include '../conn.php';

        $id =$_GET['id'];
        $data =mysqli_query($conn, "select * from buku where id='$id'");
        while($d = mysqli_fetch_array($data)) { ?>

    <form method ="post" action="proses_edit.php">
        <table>
            <tr>
                <td>Nama Buku</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                    <input type="text" name="nama" value="<?php echo $d['nama']; ?>">
                </td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <input type="submit" value="SIMPAN">
                </td>
            </tr>
        </table>
    </form>

    <?php } ?>
    
</body>
</html>