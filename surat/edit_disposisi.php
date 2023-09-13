<?php require_once('../template/head.php') ?>

<?php require_once('../template/menu.php') ?>

<?php
$id = $_GET['id'];
$dataGet = mysqli_query($conn, "SELECT * FROM disposisi_surat WHERE id = '$id'");
$data = mysqli_fetch_object($dataGet);

?>

<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- Page Heading -->
   <h1 class="h3 mb-4 text-gray-800">Edit Disposisi</h1>

   <div class="card">
      <div class="card-body">
         <div class="row">
            <div class="col-md-12">
               <form action="proses_edit_disposisi.php?id=<?= $id ?>" method="post">
                  <div class="form-group">
                     <label for="nama">Disposisi</label>
                     <textarea class="form-control" required name="disposisi" id="disposisi" rows="5"><?= $data->disposisi ?></textarea>
                  </div>
                  <div class="form-group">
                     <button class="btn btn-success" name="update" type="submit">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

</div>

<!-- /.container-fluid -->

<?php require_once('../template/foot.php') ?>