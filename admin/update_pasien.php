<!-- UPDATE -->
<?php
include ('../db/koneksi.php');
if (isset($_POST['buttonUbah'])) {
  $user_id = $_POST['user_id'];
  $user_ktp_id = $_POST['user_ktp_id'];
  $user_nama = $_POST['user_nama'];
  $user_jenkel = $_POST['user_jenkel'];
  $user_tgl_lahir = $_POST['user_tgl_lahir'];
  $user_telp = $_POST['user_telp'];
  $user_alamat = $_POST['user_alamat'];
  $user_wilayah_id = $_POST['user_wilayah_id'];
  $user_username = $_POST['user_username'];
  $user_password = md5($_POST['user_password']);
  $user_updated = $_POST['user_updated'];
  $user_updated_by = $_POST['user_updated_by'];

  $queryupdate = " UPDATE user SET user_ktp_id='$user_ktp_id', user_nama='$user_nama', user_jenkel='$user_jenkel', user_tgl_lahir='$user_tgl_lahir', user_telp='$user_telp', user_alamat='$user_alamat', user_wilayah_id='$user_wilayah_id', user_username='$user_username', user_password='$user_password',  user_updated='$user_updated', user_updated_by='$user_updated_by' WHERE user_id=$user_id;";

  if (mysqli_query($koneksi, $queryupdate)) {

    ?>
    <meta http-equiv="refresh" content="0;url=data_pasien.php"/>
    <?php

  }else{
    echo "Anda gagal mengubah data";
  }
}
?>

<!-- Modal -->
<div class="modal fade" id="modalUbahPasien<?php echo $row['user_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php
      $id = $row['user_id'];
      $queryselectedit = "SELECT * FROM user LEFT JOIN wilayah ON user.user_wilayah_id=wilayah.wilayah_id WHERE user_id=$id";
      $resultselectedit = mysqli_query($koneksi, $queryselectedit);
      $rowselectedit = mysqli_fetch_assoc ($resultselectedit);
      ?>

      <form method="POST">
       <div class="modal-body">
        <div class="form-group row" hidden>
          <label for="id_user" class="col-sm-3 col-form-label">Id Pasien</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="user_id" name="user_id" placeholder="ID Pasien" value="<?php echo $rowselectedit['user_id']; ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="id_user" class="col-sm-3 col-form-label">Id KTP</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="user_ktp_id" name="user_ktp_id" placeholder="ID KTP" value="<?php echo $rowselectedit['user_ktp_id']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Nama</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="user_nama" name="user_nama" placeholder="Nama" value="<?php echo $rowselectedit['user_nama']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="Jenis Kelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
          <div class="col-sm-8">
          <div class="controls">
              <select name="user_jenkel" class="form-control" required>
                <option value="<?php echo $rowselectedit['user_jenkel'] ?>"><?php echo $rowselectedit['user_jenkel'] ?></option>
                <option value="">--> Ubah Jenis Kelamin <--</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Tgl Lahir</label>
          <div class="col-sm-8">
            <input type="date" class="form-control" id="user_tgl_lahir" name="user_tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $rowselectedit['user_tgl_lahir']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Telepon</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="user_telp" name="user_telp" placeholder="Telepon" value="<?php echo $rowselectedit['user_telp']; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Alamat</label>
          <div class="col-sm-8">
            <textarea class="form-control" style="height: 100px;" name="user_alamat" placeholder="Alamat"><?php echo $rowselectedit['user_alamat']; ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Kecamatan</label>
          <div class="col-sm-8">
            <div class="controls">
              <select name="user_wilayah_id" class="form-control">
                <option value="<?php echo $rowselectedit['user_wilayah_id'] ?>"><?php echo $rowselectedit['wilayah_kecamatan'] ?></option>
                <option value="">--> Ubah Kecamatan <--</option>
                <?php
                $queryw = " SELECT * FROM wilayah";
                $result = mysqli_query($koneksi, $queryw);
                  while ($row = mysqli_fetch_array($result)){
                ?>
                <option value="<?php echo $row['wilayah_id']; ?>"><?php echo $row['wilayah_kecamatan']; ?></option>
              <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="username" class="col-sm-3 col-form-label">Username</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="user_username" name="user_username" placeholder="Username" value="<?php echo $rowselectedit['user_username']; ?>">
          </div>
        </div>
        <div class="form-group row" hidden>
          <label for="password" class="col-sm-3 col-form-label">Password</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="user_password" name="user_password" placeholder="password" value="<?php echo $rowselectedit['user_password']; ?>" readonly>
          </div>
        </div>
        <div class="form-group row" hidden>
          <label for="nama" class="col-sm-3 col-form-label">Tgl/Jam</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="user_updated" name="user_updated" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y-m-d H:i:s");  ?>" readonly>
          </div>
        </div>
        <div class="form-group row" hidden>
          <label for="nama" class="col-sm-3 col-form-label">Updated By</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="user_updated_by" name="user_updated_by" value="<?php echo $_SESSION['admin_nama']; ?>" required readonly>
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