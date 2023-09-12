<?php require_once('../template/head.php') ?>

<?php require_once('../template/menu.php') ?>

<?php
if (empty($_GET['id'])) {
   echo "<script>window.location.href = 'index.php';</script>";
   exit;
}

$id = $_GET['id'];
$dataQuery = mysqli_query($conn, "SELECT * FROM surat JOIN buku ON buku.id = surat.buku_id WHERE surat.id = '$id'");
$data = mysqli_fetch_object($dataQuery);

$dataDispo = mysqli_query($conn, "SELECT * FROM disposisi_surat JOIN user ON user.id = disposisi_surat.user_id WHERE surat_id = '$id' ORDER BY disposisi_surat.id DESC");
$count = mysqli_num_rows($dataDispo);

$no = 1;
?>

<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800">Detail Surat</h1>
   <a href="index.php" class="btn btn-primary mb-3"><i class="fas fa-arrow-left"></i> Kembali</a>
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6">
                     <ul class="list-group">
                        <li class="list-group-item">
                           Nomor Surat : <br>
                           <b><?= $data->nomor_surat ?></b>
                        </li>
                        <li class="list-group-item">
                           Tanggal Surat : <br>
                           <b><?= $data->tanggal_surat ?></b>
                        </li>
                        <li class="list-group-item">
                           Pengirim : <br>
                           <b><?= $data->pengirim ?></b>
                        </li>
                        <li class="list-group-item">
                           Penerima : <br>
                           <b><?= $data->penerima ?? '-' ?></b>
                        </li>
                        <li class="list-group-item">
                           Tipe Surat : <br>
                           <b><?= strtoupper($data->tipe_surat) ?></b>
                        </li>
                     </ul>
                  </div>
                  <div class="col-md-6">
                     <ul class="list-group">
                        <li class="list-group-item">
                           Nomor Agenda : <br>
                           <b><?= $data->nomor_agenda ?></b>
                        </li>
                        <li class="list-group-item">
                           Tanggal Agenda : <br>
                           <b><?= $data->tanggal_agenda ?></b>
                        </li>
                        <li class="list-group-item">
                           Buku : <br>
                           <b><?= $data->nama ?></b>
                        </li>
                        <li class="list-group-item">
                           Status : <br>
                           <b><?= strtoupper($data->status) ?></b>
                        </li>
                        <li class="list-group-item">
                           Tanggal Data Dibuat : <br>
                           <b><?= $data->created_at ?></b>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <table class="table table-hover table-striped">
                  <thead>
                     <tr>
                        <th>No.</th>
                        <th>Pengguna</th>
                        <th>Disposisi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if ($count > 0) { ?>
                        <?php while ($row = mysqli_fetch_object($dataDispo)) : ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $row->nama ?? $row->username ?></td>
                              <td><?= $row->disposisi ?></td>
                           </tr>
                        <?php endwhile; ?>
                     <?php } else { ?>
                        <tr>
                           <td colspan="3" align="center">-- Belum ada disposisi --</td>
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