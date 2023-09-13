<?php
require_once '../conn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Surat</title>
</head>
<body>

<form action="proses_tambah.php" method="post">

    <!-- nomor surat -->
    <label for=""> Nomor Surat :</label>
    <input type="text" name="nomor_surat">
    <br>

    <!-- tanggal surat -->
    <label for=""> Tanggal Surat :</label>
    <input type="date" name="tanggal_surat">
    <br>

    <!-- pengirim surat -->
    <label for=""> Pengirim :</label>
    <input type="text" name="pengirim">
    <br>

    <!-- penerima surat -->
    <label for=""> Penerima :</label>
    <input type="text" name="penerima">
    <br>

    <!-- nomor agenda -->
    <label for=""> Nomor Agenda :</label>
    <input type="text" name="nomor_agenda">
    <br>

    <!-- tanggal agenda -->
    <label for=""> Tanggal Agenda :</label>
    <input type="date" name="tanggal_agenda">
    <br>

    <!-- option buku -->
    <select name="buku" id="">
        <option value="">--pilih buku--</option>
        
        <!-- pengulangan untuk opsi pemilihan buku -->
        <?php
         $datax = "SELECT * FROM buku";
         $pilih = mysqli_query($conn, $datax);

         foreach ($pilih as $key ) :?>
         
         <option value="<?= $key['id'] ?>"> <?= $key['nama'] ?> </option>

         <!-- akhir pengulangan -->
         <?php endforeach ?>
    </select>

    <?php if (!$pilih) {
        echo "data gagal terkoneksi";
    } ?>
    <br>

    <!-- pilihan status  -->
    <select name="status" id="">
        <option value=""> --pilih status-- </option>
        <option value="proses"> proses </option>
        <option value="selesai"> selesai </option>
        <option value="tunda"> tunda </option>
    </select>

    <!-- pili tipe surat -->
    <select name="tipe_surat" id="">
        <option value=""> --pilih tipe surat-- </option>
        <option value="masuk"> masuk </option>
        <option value="keluar"> keluar </option>
    </select>

        <!-- tombol tambah data -->
    <button type="submit" name="tambah"> Tambah Data </button>

</form>



</body>
</html>