<?php require_once('../template/head.php') ?>

<?php require_once('../template/menu.php') ?>



<?php
$id = $_GET['id'];

$sql = "SELECT * FROM surat WHERE id=$id";
$data = mysqli_query($conn, $sql);
$result = mysqli_fetch_assoc($data);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Surat</h1>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <!-- form edit surat-->
                    <form action="proses_edit.php?id=<?php echo $id ?>" method="post">

                        <div class="form-group">
                            <label for="nomor_surat">Nomor Surat</label>
                            <input type="text" name="nomor_surat" required class="form-control" value="<?php echo $result['nomor_surat'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_surat">tanggal_surat</label>
                            <input type="date" name="tanggal_surat" required class="form-control" value="<?php echo $result['tanggal_surat'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="pengirim">pengirim</label>
                            <input type="text" name="pengirim" required class="form-control" value="<?php echo $result['pengirim'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="penerima">penerima</label>
                            <input type="text" name="penerima" required class="form-control" value="<?php echo $result['penerima'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="nomor_agenda">Nomor Agenda</label>
                            <input type="text" name="nomor_agenda" required class="form-control" value="<?php echo $result['nomor_agenda'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_agenda">Tanggal Agenda</label>
                            <input type="date" name="tanggal_agenda" required class="form-control" value="<?php echo $result['tanggal_agenda'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="buku_id">Buku</label>
                            <select name="buku_id" class="form-control" required>

                                <?php
                                $sql = "SELECT * FROM buku";
                                $data = mysqli_query($conn, $sql);
                                while ($tampil = mysqli_fetch_assoc($data)) {
                                ?>
                                    <option <?php echo ($result['buku_id'] == $tampil['id']) ? 'selected' : ''; ?> value="<?php echo $tampil['id'] ?>"> <?php echo $tampil['nama'] ?></option>
                                <?php
                                }
                                ?>

                            </select>
                        </div>

                        <div class="form-group-option">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>

                                <option value="draft">Draft</option>
                                <option value="proses">Proses</option>
                                <option value="selesai">Selesai</option>
                                <option value="tunda">Tunda</option>

                            </select>
                        </div>
                        <br>
                        <label for="tipe_surat">Tipe Surat</label>
                        <div class="form-group-option">
                            <select name="tipe_surat" class="form-control" required>
                                <option value="masuk">Masuk</option>
                                <option value="keluar">Keluar</option>
                            </select>
                            <br>
                        </div>
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                    <!-- end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->



<?php require_once('../template/foot.php') ?>

<?php

require_once "../conn.php";
