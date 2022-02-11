<!-- UPDATE -->
<?php
include ('../db/koneksi.php');
if (isset($_POST['buttonUbah'])) {
  $pp_id = $_POST['pp_id'];
  $pp_user_id = $_POST['pp_user_id'];
  $pp_keluhan = $_POST['pp_keluhan'];
  $pp_tgl = $_POST['pp_tgl'];
  $pp_status = $_POST['pp_status'];
  $pp_tgl_pertemuan = $_POST['pp_tgl_pertemuan'];
  $pp_poli = $_POST['pp_poli'];
  $pp_pegawai_id = $_POST['pp_pegawai_id'];
  $pp_admin_updated = $_POST['pp_admin_updated'];

  $queryupdate = " UPDATE pendaftaran_pasien SET pp_user_id='$pp_user_id', pp_keluhan='$pp_keluhan', pp_tgl='$pp_tgl', pp_status='$pp_status', pp_tgl_pertemuan='$pp_tgl_pertemuan', pp_poli='$pp_poli', pp_pegawai_id='$pp_pegawai_id', pp_admin_updated='$pp_admin_updated' WHERE pp_id=$pp_id;";

  if (mysqli_query($koneksi, $queryupdate)) {

    ?>
    <meta http-equiv="refresh" content="0;url=data_pp.php"/>
    <?php

  }else{
    echo "Anda gagal mengubah data";
  }
}
?>

<!-- Modal -->
<div class="modal fade" id="modalUbahPP<?php echo $row['pp_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php
      $id = $row['pp_id'];
      $queryselectedit = "SELECT * FROM pendaftaran_pasien LEFT JOIN user ON pendaftaran_pasien.pp_user_id = user.user_id LEFT JOIN pegawai ON pendaftaran_pasien.pp_pegawai_id = pegawai.pegawai_id WHERE pp_id=$id";
      $resultselectedit = mysqli_query($koneksi, $queryselectedit);
      $rowselectedit = mysqli_fetch_assoc ($resultselectedit);
      ?>

      <form method="POST">
       <div class="modal-body">
        <div class="form-group row" hidden>
          <label for="id_pp" class="col-sm-3 col-form-label">Id</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="pp_id" name="pp_id" placeholder="ID" value="<?php echo $rowselectedit['pp_id']; ?>" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label for="id_pp" class="col-sm-3 col-form-label">Pasien</label>
          <div class="col-sm-8">
            <div class="controls">
              <select name="pp_user_id">
                <option value="<?php echo $rowselectedit['pp_user_id'] ?>"><?php echo $rowselectedit['user_nama'] ?></option>
                <option value="">--> Ubah Pasien <--</option>
                <?php
                  $queryselect = " SELECT * FROM user";
                  $resultselect = mysqli_query($koneksi, $queryselect);
                    while ($row = mysqli_fetch_array($resultselect)){
                  ?>
                  <option value="<?php echo $row['user_id']; ?>"><?php echo $row['user_nama']; ?> | <?php echo $row['user_ktp_id']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Keluhan</label>
          <div class="col-sm-8">
            <textarea style="height: 100px;" name="pp_keluhan" class="form-control" placeholder="Keluhan"><?php echo $rowselectedit['pp_keluhan']; ?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Tanggal Pesan</label>
          <div class="col-sm-8">
            <input type="datetime" value="<?php echo $rowselectedit['pp_tgl']; ?>" class="form-control" id="pp_tgl" name="pp_tgl" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Status Pesanan</label>
          <div class="col-sm-8">
            <div class="controls">
              <select name="pp_status" required>
                <option value="<?php echo $rowselectedit['pp_status'] ?>"><?php echo $rowselectedit['pp_status'] ?></option>
                <option value="">--> Ubah Status <--</option>
                <option value="Pendaftaran Terkirim">Pendaftaran Terkirim</option>
                <option value="Pendaftaran Diterima">Pendaftaran Diterima</option>
                <option value="Pendaftaran Dibatalkan">Pendaftaran Dibatalkan</option>
                <option value="Pendaftaran Ditolak">Pendaftaran Ditolak</option>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Jadwal Pertemuan</label>
          <div class="col-sm-8">
            <input type="datetime" class="form-control" value="<?php echo $rowselectedit['pp_tgl_pertemuan']; ?>" id="pp_tgl_pertemuan" name="pp_tgl_pertemuan">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">POLI</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="pp_poli" value="<?php echo $rowselectedit['pp_poli']; ?>" name="pp_poli">
          </div>
        </div>
        <div class="form-group row">
          <label for="nama" class="col-sm-3 col-form-label">Dokter</label>
          <div class="col-sm-8">
            <div class="controls">
              <select name="pp_pegawai_id">
                <option value="<?php echo $rowselectedit['pp_pegawai_id'] ?>"><?php echo $rowselectedit['pegawai_nama'] ?> | <?php echo $rowselectedit['pegawai_spesialis'] ?></option>
                <option value="">--> Ubah Dokter <--</option>
                <?php
                  $query = " SELECT * FROM pegawai";
                  $results = mysqli_query($koneksi, $query);
                  while ($dok = mysqli_fetch_array($results)){
                ?>
                <option value="<?php echo $dok['pegawai_id']; ?>"><?php echo $dok['pegawai_nama']; ?> | <?php echo $dok['pegawai_spesialis']; ?></option>
              <?php } ?>
              </select>
            </div>
          </div>
        </div>
        <div class="form-group row" hidden>
          <label for="nama" class="col-sm-3 col-form-label">Tgl/Jam</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="pp_admin_updated" name="pp_admin_updated" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y-m-d H:i:s");  ?>" readonly>
          </div>
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