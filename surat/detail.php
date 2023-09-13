<?php require_once('../template/head.php') ?>

<?php require_once('../template/menu.php') ?>

<?php

use Carbon\Carbon;

if (empty($_GET['id'])) {
   echo "<script>window.location.href = 'index.php';</script>";
   exit;
}

$id = $_GET['id'];
$dataQuery = mysqli_query($conn, "SELECT * FROM surat JOIN buku ON buku.id = surat.buku_id WHERE surat.id = '$id'");
$data = mysqli_fetch_object($dataQuery);

$dataDispo = mysqli_query($conn, "SELECT *, disposisi_surat.id AS ide FROM disposisi_surat JOIN user ON user.id = disposisi_surat.user_id WHERE surat_id = '$id' ORDER BY disposisi_surat.id DESC");
$count = mysqli_num_rows($dataDispo);

$dataUser = mysqli_query($conn, "SELECT * FROM user ORDER BY id DESC");

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
                           <b><?= Carbon::parse($data->tanggal_surat)->locale('id')->isoFormat('dddd, Do MMMM YYYY') ?></b>
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
                           <b><?= Carbon::parse($data->tanggal_agenda)->locale('id')->isoFormat('dddd, Do MMMM YYYY') ?></b>
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
                           <b><?= Carbon::parse($data->created_at)->locale('id')->isoFormat('dddd, Do MMMM YYYY') ?></b>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <?php if ($data->status != 'draft') { ?>
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <div class="d-flex justify-content-end mb-3">
                     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAdd">
                        Tambah Disposisi
                     </button>
                  </div>
                  <table class="table table-hover table-striped">
                     <thead>
                        <tr>
                           <th>No.</th>
                           <th>Pengguna</th>
                           <th>Jabatan</th>
                           <th>Disposisi</th>
                           <th>Aksi</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if ($count > 0) { ?>
                           <?php while ($row = mysqli_fetch_object($dataDispo)) : ?>
                              <tr>
                                 <td><?= $no++ ?></td>
                                 <td><?= $row->nama ?? $row->username ?></td>
                                 <td><?= $row->jabatan ?></td>
                                 <td><?= ($row->disposisi != '-') ? $row->disposisi : "<i class='text-danger'>Belum ada respon</i>" ?></td>
                                 <td>
                                    <div class="d-flex">
                                       <?php if ($row->user_id == $_SESSION['id']) { ?>
                                          <a href="edit_disposisi.php?id=<?= $row->ide ?>" class="btn btn-success mr-2"><i class="fas fa-pen"></i></a>
                                          <a onclick="return confirm('Apakah yakin ingin menghapus ini?')" class="btn btn-danger" href="proses_hapus_disposisi.php?idx=<?= $row->ide ?>"><i class="fas fa-trash"></i></a>
                                       <?php } ?>
                                    </div>
                                 </td>
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
   <?php } ?>

   <div class="modal fade" id="modalAdd" tabindex="-1" aria-labelledby="modalAddLabel" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="modalAddLabel">Tambah Disposisi</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <form action="proses_tambah_disposisi.php?id=<?= $id ?>" method="post">
                  <input type="hidden" name="id" value="<?= $id ?>">
                  <div class="form-group">
                     <label for="userInput1">Teruskan ke</label>
                     <select class="form-control" required name="user" id="userInput1">
                        <option value="">-- Pilih User --</option>
                        <?php while ($a = mysqli_fetch_object($dataUser)) { ?>
                           <option value="<?= $a->id ?>"><?= $a->nama ?></option>
                        <?php } ?>
                     </select>
                  </div>

                  <div class="form-group">
                     <label for="status">Status</label>
                     <select class="form-control" required name="status" id="status">
                        <option value="">-- Pilih Status --</option>
                        <option value="proses">PROSES</option>
                        <option value="selesai">SELESAI</option>
                        <option value="tunda">TUNDA</option>
                     </select>
                  </div>

                  <div class="form-group">
                     <label for="disposisi">Disposisi</label>
                     <textarea class="form-control" required name="disposisi" id="disposisi" rows="5"></textarea>
                  </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
               <button type="submit" name="save" class="btn btn-primary">Submit</button>
               </form>
            </div>

         </div>
      </div>
   </div>

</div>
<!-- /.container-fluid -->

<?php require_once('../template/foot.php') ?>