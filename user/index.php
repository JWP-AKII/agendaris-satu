<?php require_once('../template/head.php') ?>

<?php require_once('../template/menu.php') ?>

<?php
$no = 1;
$data = mysqli_query($conn, "SELECT * FROM user ORDER BY id DESC");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data User</h1>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <a class="btn btn-primary" href="tambah.php">Tambah Data</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <th>No</th>
                            <th>Nama User</th>
                            <th>Username</th>
                            <th>Jabatan</th>
                            <th>Opsi</th>
                        </thead>

                        <tbody>
                            <?php while ($d = mysqli_fetch_array($data)) { ?>

                                <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['nama']; ?></td>
                                    <td><?php echo $d['username']; ?></td>
                                    <td><?php echo $d['jabatan']; ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-warning mr-2" href="edit.php?id=<?php echo $d['id']; ?>">Edit</a>
                                            <a class="btn btn-danger" href="proses_hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>
                                        </div>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

<?php require_once('../template/foot.php') ?>