<?php
include '../conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <tr>
        <td>Username</td>
        <td>
            <input type="hidden" name="id" value="">
            <input type="text" name="username" value="">
        </td>
    </tr>

    <tr>
        <td>Password</td>
        <td>
            <input type="text" name="password" value="">
        </td>
    </tr>

    <tr>
        <td>Jabatan</td>
        <td>
            <input type="text" name="jabatan" value="">
        </td>
    </tr>

    <tr>
        <td></td>
        <td>
            <input type="submit" value="simpan">
        </td>
    </tr>
</body>
</html>