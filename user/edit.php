<?php require_once('../template/head.php') ?>

<?php require_once('../template/menu.php') ?>

<?php

$id = $_GET['id'];

$dataQuery = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
$data = mysqli_fetch_object($dataQuery);

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah User</h1>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form action="proses_edit.php?id=<?= $id ?>" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="name" name="nama" value="<?= $data->nama ?>" required class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="name" name="username" value="<?= $data->username ?>" required class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password (Opsional)</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="name" name="jabatan" value="<?= $data->jabatan ?>" required class="form-control" id="jabatan">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php require_once('../template/foot.php') ?>