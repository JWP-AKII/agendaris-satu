<?php require_once('../template/head.php') ?>

<?php require_once('../template/menu.php') ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Buku</h1>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="proses_tambah.php" method="post">
                        <div class="form-group">
                            <label for="nama">Nama Buku</label>
                            <input type="text" required name="nama" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" name="save" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- /.container-fluid -->

<?php require_once('../template/foot.php') ?>