<!-- UPDATE -->
<?php
include ('../db/koneksi.php');
if (isset($_POST['buttonUbah'])) {
  $pegawai_id = $_POST['pegawai_id'];
  $pegawai_nama = $_POST['pegawai_nama'];
  $pegawai_spesialis = $_POST['pegawai_spesialis'];
  $pegawai_telp = $_POST['pegawai_telp'];
  $pegawai_email = $_POST['pegawai_email'];
  $pegawai_username = $_POST['pegawai_username'];
  $pegawai_password = md5($_POST['pegawai_password']);
  $pegawai_updated = $_POST['pegawai_updated'];
  $pegawai_updated_by = $_POST['pegawai_updated_by'];

  $queryupdate = " UPDATE pegawai SET pegawai_nama='$pegawai_nama', pegawai_spesialis='$pegawai_spesialis', pegawai_telp='$pegawai_telp', pegawai_email='$pegawai_email', pegawai_username='$pegawai_username', pegawai_password='$pegawai_password', pegawai_updated='$pegawai_updated', pegawai_updated_by='$pegawai_updated_by' WHERE pegawai_id=$pegawai_id;";

  if (mysqli_query($koneksi, $queryupdate)) {

    ?>
    <meta http-equiv="refresh" content="0;url=data_pegawai.php"/>
    <?php

  }else{
    echo "Anda gagal mengubah data";
  }
}
?>

<!-- Modal -->
<div class="modal fade" id="modalUbahPegawai<?php echo $row['pegawai_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php
      $id = $row['pegawai_id'];
      $queryselectedit = "SELECT * FROM pegawai WHERE pegawai_id=$id";
      $resultselectedit = mysqli_query($koneksi, $queryselectedit);
      $rowselectedit = mysqli_fetch_assoc ($resultselectedit);
      ?>

      <form method="POST">
       <div class="modal-body">
        <div class="form-group row" hidden>
          <label for="id_pegawai" class="col-sm-3 col-form-label">Id Pegawai</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="pegawai_id" name="pegawai_id" placeholder="ID pegawai" value="<?php echo $rowselectedit['pegawai_id']; ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="pegawai_nama" name="pegawai_nama" placeholder="Nama" value="<?php echo $rowselectedit['pegawai_nama']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Spesialis</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="pegawai_spesialis" name="pegawai_spesialis" placeholder="Spesialis" value="<?php echo $rowselectedit['pegawai_spesialis']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Telepon</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="pegawai_telp" name="pegawai_telp" placeholder="Telepon" value="<?php echo $rowselectedit['pegawai_telp']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="username" class="col-sm-3 col-form-label">Username</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="pegawai_username" name="pegawai_username" placeholder="Username" value="<?php echo $rowselectedit['pegawai_username']; ?>">
          </div>
        </div>
        <div class="form-group row" hidden>
          <label for="password" class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="pegawai_password" name="pegawai_password" placeholder="password" value="<?php echo $rowselectedit['pegawai_password']; ?>" readonly>
          </div>
        </div>
        <div class="form-group row" hidden>
          <label for="nama" class="col-sm-3 col-form-label">Tgl/Jam</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="pegawai_updated" name="pegawai_updated" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y-m-d H:i:s");  ?>" readonly>
          </div>
        </div>
        <div class="form-group row" hidden>
          <label for="nama" class="col-sm-3 col-form-label">Updated By</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="pegawai_updated_by" name="pegawai_updated_by" value="<?php echo $_SESSION['admin_nama']; ?>" required readonly>
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