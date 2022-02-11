<!-- UPDATE -->
<?php
include ('../db/koneksi.php');
if (isset($_POST['buttonUbah'])) {
  $tindakan_id = $_POST['tindakan_id'];
  $tindakan_nama = $_POST['tindakan_nama'];
  $tindakan_deskripsi = $_POST['tindakan_deskripsi'];
  $tindakan_harga = $_POST['tindakan_harga'];
  $tindakan_updated = $_POST['tindakan_updated'];
  $tindakan_updated_by = $_POST['tindakan_updated_by'];

  $queryupdate = " UPDATE tindakan SET tindakan_nama='$tindakan_nama', tindakan_deskripsi='$tindakan_deskripsi', tindakan_harga='$tindakan_harga', tindakan_updated='$tindakan_updated', tindakan_updated_by='$tindakan_updated_by' WHERE tindakan_id=$tindakan_id;";

  if (mysqli_query($koneksi, $queryupdate)) {

    ?>
    <meta http-equiv="refresh" content="0;url=data_tindakan.php"/>
    <?php

  }else{
    echo "Anda gagal mengubah data";
  }
}
?>

<!-- Modal -->
<div class="modal fade" id="modalUbahTindakan<?php echo $row['tindakan_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php
      $id = $row['tindakan_id'];
      $queryselectedit = "SELECT * FROM tindakan WHERE tindakan_id=$id";
      $resultselectedit = mysqli_query($koneksi, $queryselectedit);
      $rowselectedit = mysqli_fetch_assoc ($resultselectedit);
      ?>

      <form method="POST">
       <div class="modal-body">
        <div class="form-group row" hidden>
          <label for="id_pegawai" class="col-sm-3 col-form-label">Id Tindakan</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="tindakan_id" name="tindakan_id" placeholder="ID tindakan" value="<?php echo $rowselectedit['tindakan_id']; ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama Tindakan</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="tindakan_nama" name="tindakan_nama" placeholder="Nama tindakan" value="<?php echo $rowselectedit['tindakan_nama']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Deskripsi</label>
          <div class="col-sm-8">
            <textarea style="height: 100px;" class="form-control" placeholder="Tindakan" name="tindakan_deskripsi" minlength="2" required><?php echo $rowselectedit['tindakan_deskripsi']; ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Harga</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" id="tindakan_harga" name="tindakan_harga" placeholder="Harga" value="<?php echo $rowselectedit['tindakan_harga']; ?>" min="0">
          </div>
        </div>
        <div class="form-group row" hidden>
          <label for="nama" class="col-sm-3 col-form-label">Tgl/Jam</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="tindakan_updated" name="tindakan_updated" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y-m-d H:i:s");  ?>" readonly>
          </div>
        </div>
        <div class="form-group row" hidden>
          <label for="nama" class="col-sm-3 col-form-label">Updated By</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="tindakan_updated_by" name="tindakan_updated_by" value="<?php echo $_SESSION['admin_nama']; ?>" required readonly>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary" name="buttonUbah">Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>