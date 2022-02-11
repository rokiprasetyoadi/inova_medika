<!-- UPDATE -->
<?php
include ('../db/koneksi.php');
if (isset($_POST['buttonUbah'])) {
  $obat_id = $_POST['obat_id'];
  $obat_nama = $_POST['obat_nama'];
  $obat_deskripsi = $_POST['obat_deskripsi'];
  $obat_harga = $_POST['obat_harga'];
  $obat_updated = $_POST['obat_updated'];
  $obat_updated_by = $_POST['obat_updated_by'];

  $queryupdate = " UPDATE obat SET obat_nama='$obat_nama', obat_deskripsi='$obat_deskripsi', obat_harga='$obat_harga', obat_updated='$obat_updated', obat_updated_by='$obat_updated_by' WHERE obat_id=$obat_id;";

  if (mysqli_query($koneksi, $queryupdate)) {

    ?>
    <meta http-equiv="refresh" content="0;url=data_obat.php"/>
    <?php

  }else{
    echo "Anda gagal mengubah data";
  }
}
?>

<!-- Modal -->
<div class="modal fade" id="modalUbahObat<?php echo $row['obat_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php
      $id = $row['obat_id'];
      $queryselectedit = "SELECT * FROM obat WHERE obat_id=$id";
      $resultselectedit = mysqli_query($koneksi, $queryselectedit);
      $rowselectedit = mysqli_fetch_assoc ($resultselectedit);
      ?>

      <form method="POST">
       <div class="modal-body">
        <div class="form-group row" hidden>
          <label for="id_pegawai" class="col-sm-3 col-form-label">Id Obat</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="obat_id" name="obat_id" placeholder="ID Obat" value="<?php echo $rowselectedit['obat_id']; ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama Obat</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="obat_nama" name="obat_nama" placeholder="Nama Obat" value="<?php echo $rowselectedit['obat_nama']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Deskripsi</label>
          <div class="col-sm-8">
            <textarea style="height: 100px;" class="form-control" name="obat_deskripsi" minlength="2" required><?php echo $rowselectedit['obat_deskripsi']; ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Harga</label>
          <div class="col-sm-8">
            <input type="number" class="form-control" id="obat_harga" name="obat_harga" placeholder="Harga" value="<?php echo $rowselectedit['obat_harga']; ?>" min="0">
          </div>
        </div>
        <div class="form-group row" hidden>
          <label for="nama" class="col-sm-3 col-form-label">Tgl/Jam</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="obat_updated" name="obat_updated" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y-m-d H:i:s");  ?>" readonly>
          </div>
        </div>
        <div class="form-group row" hidden>
          <label for="nama" class="col-sm-3 col-form-label">Updated By</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="obat_updated_by" name="obat_updated_by" value="<?php echo $_SESSION['admin_nama']; ?>" required readonly>
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