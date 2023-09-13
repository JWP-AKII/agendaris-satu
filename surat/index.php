<?php require_once('../template/head.php') ?>

<?php require_once('../template/menu.php') ?>




<?php 
$sql = "SELECT surat.id as ide, nomor_surat, tanggal_surat, pengirim, penerima, nomor_agenda, tanggal_agenda, buku_id, buku.nama, status, tipe_surat FROM surat 
        INNER JOIN buku ON surat.buku_id=buku.id";
$result = mysqli_query($conn, $sql);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800">Data Surat</h1>

   <div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
            <a href="tambah.php" class="btn btn-primary">Tambah</a>

<table class="table table-striped">
    <thead>
        <th>No</th>
        <th>Nomor Surat</th>
        <th>Tanggal Surat </th>
        <th>Pengirim </th>
        <th>Penerima </th>
        <th>Nomor Agenda </th>
        <th>Tamggal Agenda </th>
        <th>Nama Buku </th>
        <th>Status</th>
        <th>Tipe Surat</th>
        <th>Aksi</th>
    </thead>

    <tbody>

        <?php foreach ($result as $key => $data) :?>
        <tr>
            <td><?php echo $key + 1 ?></td>
            <td><?php echo $data['nomor_surat'] ?></td>
            <td><?php echo $data['tanggal_surat'] ?></td>
            <td><?php echo $data['pengirim'] ?></td>
            <td><?php echo $data['penerima'] ?></td>
            <td><?php echo $data['nomor_agenda'] ?></td>
            <td><?php echo $data['tanggal_agenda'] ?></td>
            <td><?php echo $data['nama'] ?></td>
            <td><?php echo $data['status'] ?></td>
            <td><?php echo $data['tipe_surat'] ?></td>
            <td>
                <a href="edit.php?id=<?php echo $data['ide'] ?>" class="btn btn-warning"> Edit </a>
                <a href="proses_hapus.php?id=<?php echo $data['ide'] ?>" class="btn btn-danger"> Hapus </a>
            </td>
        </tr>
        <?php endforeach ?>

    </tbody>

</table>
            </div>
        </div>
    </div>
   </div>

</div>

<!-- /.container-fluid -->

<?php require_once('../template/foot.php') ?>