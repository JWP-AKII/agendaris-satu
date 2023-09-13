<?php require_once('../template/head.php') ?>

<?php require_once('../template/menu.php') ?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="proses_tambah.php" method="post">

                        <!-- nomor surat -->
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nomor Surat</label>
                            <input type="text" name="nomor_surat" class="form-control" id="exampleFormControlInput1" placeholder="Nomor Surat">
                        </div>


                        <!-- tanggal surat -->
                        <div class="form-group">
                            <label for=""> Tanggal Surat :</label>
                            <input type="date" name="tanggal_surat" class="form-control">
                        </div>

                        <!-- pengirim surat -->
                        <div class="form-group">
                            <label for=""> Pengirim :</label>
                            <input type="text" name="pengirim" class="form-control">
                        </div>

                        <!-- penerima surat -->
                        <div class="form-group">

                            <label for=""> Penerima :</label>
                            <input type="text" name="penerima" class="form-control">
                        </div>

                        <!-- nomor agenda -->
                        <div class="form-group">
                            <label for=""> Nomor Agenda :</label>
                            <input type="text" name="nomor_agenda" class="form-control">
                        </div>

                        <!-- tanggal agenda -->
                        <div class="form-group">
                            <label for=""> Tanggal Agenda :</label>
                            <input type="date" name="tanggal_agenda" class="form-control">
                        </div>

                        <!-- option buku -->
                        <select name="buku" class="custom-select custom-select-lg mb-3">
                            <option value="">--pilih buku--</option>

                            <!-- pengulangan untuk opsi pemilihan buku -->
                            <?php
                            $datax = "SELECT * FROM buku";
                            $pilih = mysqli_query($conn, $datax);

                            foreach ($pilih as $key) : ?>

                                <option value="<?= $key['id'] ?>"> <?= $key['nama'] ?> </option>

                                <!-- akhir pengulangan -->
                            <?php endforeach ?>
                        </select>


                        <!-- pilihan status  -->
                        <select name="status" class="custom-select custom-select-lg mb-3">
                            <option value=""> --pilih status-- </option>
                            <option value="proses"> proses </option>
                            <option value="selesai"> selesai </option>
                            <option value="tunda"> tunda </option>
                        </select>

                        <!-- pili tipe surat -->
                        <select name="tipe_surat" class="custom-select custom-select-lg mb-3">
                            <option value=""> --pilih tipe surat-- </option>
                            <option value="masuk"> masuk </option>
                            <option value="keluar"> keluar </option>
                        </select>

                        <!-- tombol tambah data -->
                        <button type="submit" name="tambah" class="btn btn-primary"> Tambah Data </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- /.container-fluid -->

<?php require_once('../template/foot.php') ?>



</body>

</html>