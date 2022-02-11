<!-- UPDATE -->
<?php
include ('../db/koneksi.php');
if (isset($_POST['buttonUbah'])) {
  $wilayah_id = $_POST['wilayah_id'];
  $wilayah_kecamatan = $_POST['wilayah_kecamatan'];
  $wilayah_updated = $_POST['wilayah_updated'];
  $wilayah_updated_by = $_POST['wilayah_updated_by'];

  $queryupdate = " UPDATE wilayah SET wilayah_kecamatan='$wilayah_kecamatan', wilayah_updated='$wilayah_updated', wilayah_updated_by='$wilayah_updated_by' WHERE wilayah_id=$wilayah_id;";

  if (mysqli_query($koneksi, $queryupdate)) {

    ?>
    <meta http-equiv="refresh" content="0;url=data_wilayah.php"/>
    <?php

  }else{
    echo "Anda gagal mengubah data";
  }
}
?>

<!-- Modal -->
<div class="modal fade" id="modalUbahWilayah<?php echo $row['wilayah_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php
      $id = $row['wilayah_id'];
      $queryselectedit = "SELECT * FROM wilayah WHERE wilayah_id=$id";
      $resultselectedit = mysqli_query($koneksi, $queryselectedit);
      $rowselectedit = mysqli_fetch_assoc ($resultselectedit);
      ?>

      <form method="POST">
       <div class="modal-body">
        <div class="form-group row" hidden>
          <label for="id_pegawai" class="col-sm-3 col-form-label">Id Wilayah</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="wilayah_id" name="wilayah_id" placeholder="ID wilayah" value="<?php echo $rowselectedit['wilayah_id']; ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Kecamatan</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="wilayah_kecamatan" name="wilayah_kecamatan" placeholder="Kecamatan" value="<?php echo $rowselectedit['wilayah_kecamatan']; ?>">
          </div>
        </div>
        <div class="form-group row" hidden>
          <label for="nama" class="col-sm-3 col-form-label">Tgl/Jam</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="wilayah_updated" name="wilayah_updated" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y-m-d H:i:s");  ?>" readonly>
          </div>
        </div>
        <div class="form-group row" hidden>
          <label for="nama" class="col-sm-3 col-form-label">Updated By</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="wilayah_updated_by" name="wilayah_updated_by" value="<?php echo $_SESSION['admin_nama']; ?>" required readonly>
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