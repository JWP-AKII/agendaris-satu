

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
        include '../conn.php';

        $id =$_GET['id'];
        $data=mysqli_query($conn, "select * from user where id='$id'");
        
        while($d=mysqli_fetch_array($data)) { ?>

    <form action="proses_edit.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $d['id']; ?>">
                    <input type="text" name="username" value="<?php echo $d['username']; ?>">
                </td>
            </tr>

            <tr>
                <td>Password</td>
                <td>
                    <input type="text" name="password" value="<?php echo $d['password']; ?>">
                </td>
            </tr>

            <tr>
                <td>Jabatan</td>
                <td>
                    <input type="text" name="jabatan" value="<?php echo $d['jabatan']; ?>">
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