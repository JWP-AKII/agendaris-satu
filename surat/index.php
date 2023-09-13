<?php require_once('../template/head.php') ?>

<?php require_once('../template/menu.php') ?>




<?php
$sql = "SELECT surat.id as ide, nomor_surat, tanggal_surat, pengirim, penerima, nomor_agenda, tanggal_agenda, buku_id, buku.nama, status, tipe_surat FROM surat 
        INNER JOIN buku ON surat.buku_id=buku.id WHERE tipe_surat = 'masuk' ORDER BY ide DESC";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);

$sql2 = "SELECT surat.id as ide, nomor_surat, tanggal_surat, pengirim, penerima, nomor_agenda, tanggal_agenda, buku_id, buku.nama, status, tipe_surat FROM surat 
        INNER JOIN buku ON surat.buku_id=buku.id WHERE tipe_surat = 'keluar' ORDER BY ide DESC";
$result2 = mysqli_query($conn, $sql2);
$count2 = mysqli_num_rows($result2);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Surat</h1>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
                    <a href="tambah.php" class="btn btn-primary mb-3">Tambah</a>
                </div>
            </div>
            <ul class="nav nav-pills nav-fill" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"><b>SURAT MASUK</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"><b>SURAT KELUAR</b></a>
                </li>
            </ul><!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table display text-nowrap table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>
                                            <center>Aksi</center>
                                        </th>
                                        <th>Nomor Surat</th>
                                        <th>Tanggal Surat </th>
                                        <th>Pengirim </th>
                                        <th>Penerima </th>
                                        <th>Nomor Agenda </th>
                                        <th>Tamggal Agenda </th>
                                        <th>Nama Buku </th>
                                        <th>Status</th>
                                        <th>Tipe Surat</th>
                                    </thead>

                                    <tbody>

                                    <?php if($count > 0) { ?>
                                        <?php foreach ($result as $key => $data) : ?>
                                            <tr>
                                                <td><?php echo $key + 1 ?></td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="detail.php?id=<?php echo $data['ide'] ?>" class="btn btn-secondary mr-2"> Detail </a>
                                                        <a href="edit.php?id=<?php echo $data['ide'] ?>" class="btn btn-warning mr-2"> Edit </a>
                                                        <a href="proses_hapus.php?id=<?php echo $data['ide'] ?>" class="btn btn-danger"> Hapus </a>
                                                    </div>
                                                </td>
                                                <td><?php echo $data['nomor_surat'] ?></td>
                                                <td><?php echo $data['tanggal_surat'] ?></td>
                                                <td><?php echo $data['pengirim'] ?></td>
                                                <td><?php echo $data['penerima'] ?></td>
                                                <td><?php echo $data['nomor_agenda'] ?></td>
                                                <td><?php echo $data['tanggal_agenda'] ?></td>
                                                <td><?php echo $data['nama'] ?></td>
                                                <td><?php echo $data['status'] ?></td>
                                                <td><?php echo $data['tipe_surat'] ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td colspan="11"><b>
                                                        <center>Tidak ada data</center>
                                                    </b></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tabs-2" role="tabpanel">
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table display text-nowrap table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>
                                            <center>Aksi</center>
                                        </th>
                                        <th>Nomor Surat</th>
                                        <th>Tanggal Surat </th>
                                        <th>Pengirim </th>
                                        <th>Penerima </th>
                                        <th>Nomor Agenda </th>
                                        <th>Tamggal Agenda </th>
                                        <th>Nama Buku </th>
                                        <th>Status</th>
                                        <th>Tipe Surat</th>
                                    </thead>

                                    <tbody>

                                        <?php if ($count2 > 0) { ?>
                                            <?php foreach ($result2 as $key => $data) : ?>
                                                <tr>
                                                    <td><?php echo $key + 1 ?></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="detail.php?id=<?php echo $data['ide'] ?>" class="btn btn-secondary mr-2"> Detail </a>
                                                            <a href="edit.php?id=<?php echo $data['ide'] ?>" class="btn btn-warning mr-2"> Edit </a>
                                                            <a href="proses_hapus.php?id=<?php echo $data['ide'] ?>" class="btn btn-danger"> Hapus </a>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $data['nomor_surat'] ?></td>
                                                    <td><?php echo $data['tanggal_surat'] ?></td>
                                                    <td><?php echo $data['pengirim'] ?></td>
                                                    <td><?php echo $data['penerima'] ?></td>
                                                    <td><?php echo $data['nomor_agenda'] ?></td>
                                                    <td><?php echo $data['tanggal_agenda'] ?></td>
                                                    <td><?php echo $data['nama'] ?></td>
                                                    <td><?php echo $data['status'] ?></td>
                                                    <td><?php echo $data['tipe_surat'] ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php } else { ?>
                                            <tr>
                                                <td colspan="11"><b>
                                                        <center>Tidak ada data</center>
                                                    </b></td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- /.container-fluid -->

<?php require_once('../template/foot.php') ?>