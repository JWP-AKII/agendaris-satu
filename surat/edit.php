<?php

require_once "../conn.php";

$id= $_GET['id'];

$sql= "SELECT * FROM surat WHERE id=$id";
$data= mysqli_query($conn, $sql);
$result= mysqli_fetch_assoc($data);
var_dump($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>

<h1>Edit Data</h1>

<form action="proses_edit.php?id=<?php echo $id?>" method="post">

<label for="nomor_surat">Nomor Surat</label>
<input type="text" name="nomor_surat" id="nomor_surat" value="<?php echo $result['nomor_surat']?>">
<br> 
<label for="tanggal_surat">tanggal_surat</label>
<input type="text" name="tanggal_surat" id="tanggal_surat" value="<?php echo $result['tanggal_surat']?>">
<br>
<label for="pengirim">pengirim</label>
<input type="text" name="pengirim" id="pengirim" value="<?php echo $result['pengirim']?>">
<br>
<label for="penerima">penerima</label>
<input type="text" name="penerima" id="penerima" value="<?php echo $result['penerima']?>">
<br>
<label for="nomor_agenda">Nomor Agenda</label>
<input type="text" name="nomor_agenda" id="nomor_agenda" value="<?php echo $result['nomor_agenda']?>">
<br>
<label for="tanggal_agenda">Tanggal Agenda</label>
<input type="text" name="tanggal_agenda" id="tanggal_agenda" value="<?php echo $result['tanggal_agenda']?>">
<br>
<label for="buku_id">Buku</label>
<input type="text" name="buku_id" id="buku_id" value="<?php echo $result['buku_id']?>">
<br>
<label for="status">Status</label>
<select name="status" id="status">

    <option value="draft">Draft</option>
    <option value="proses">Proses</option>
    <option value="selesai">Selesai</option>
    <option value="tunda">Tunda</option>

</select>
<br>
<select name="tipe_surat" id="tipe_surat">
    <option value="masuk">Masuk</option>
    <option value="keluar">Keluar</option>
</select>
<br>
<button type="submit" name="simpan">Simpan Perubahan</button>

</form>

    
</body>
</html>