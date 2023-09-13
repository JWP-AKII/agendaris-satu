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
                            <input type="text" name="nomor_surat" class="form-control" id="exampleFormControlInput1" required placeholder="Nomor Surat">
                        </div>


                        <!-- tanggal surat -->
                        <div class="form-group">
                            <label for=""> Tanggal Surat :</label>
                            <input type="date" required name="tanggal_surat" class="form-control">
                        </div>

                        <!-- pengirim surat -->
                        <div class="form-group">
                            <label for=""> Pengirim :</label>
                            <input type="text" required name="pengirim" class="form-control">
                        </div>

                        <!-- penerima surat -->
                        <div class="form-group">

                            <label for=""> Penerima :</label>
                            <input type="text" required name="penerima" class="form-control">
                        </div>

                        <!-- nomor agenda -->
                        <div class="form-group">
                            <label for=""> Nomor Agenda :</label>
                            <input type="text" required name="nomor_agenda" class="form-control">
                        </div>

                        <!-- tanggal agenda -->
                        <div class="form-group">
                            <label for=""> Tanggal Agenda :</label>
                            <input type="date" required name="tanggal_agenda" class="form-control">
                        </div>

                        <!-- option buku -->
                        <div class="form-group">
                            <label for=""> Buku :</label>
                            <select name="buku" required class="custom-select custom-select-md">
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
                        </div>


                        <!-- pilihan status  -->
                        <div class="form-group">
                            <label for=""> Status :</label>
                            <select name="status" required class="custom-select custom-select-md">
                                <option value=""> --pilih status-- </option>
                                <option value="draft"> Draf </option>
                                <option value="proses"> proses </option>
                                <option value="selesai"> selesai </option>
                                <option value="tunda"> tunda </option>
                            </select>
                        </div>

                        <!-- pili tipe surat -->
                        <div class="form-group">
                            <label for="">Tipe Surat :</label>
                            <select name="tipe_surat" required class="custom-select custom-select-md">
                                <option value=""> --pilih tipe surat-- </option>
                                <option value="masuk"> masuk </option>
                                <option value="keluar"> keluar </option>
                            </select>
                        </div>

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
