        <!-- CREATE -->
        <?php
        if (isset($_POST['buttoninsert'])) {
          $pp_user_id = $_POST['pp_user_id'];
          $pp_keluhan = $_POST['pp_keluhan'];
          $pp_tgl = $_POST['pp_tgl'];
          $pp_status = $_POST['pp_status'];
          $pp_tgl_pertemuan = $_POST['pp_tgl_pertemuan'];
          $pp_poli = $_POST['pp_poli'];
          $pp_pegawai_id = $_POST['pp_pegawai_id'];
          $pp_admin_by = $_POST['pp_admin_by'];

          if ($pp_user_id=="" || $pp_pegawai_id=="" || $pp_admin_by=="") {
            ?>
            <div class="alert-danger" role="alert">
              Form tidak boleh ada yang kosong, pastikan semua field terisi
            </div>

            <?php
          }else{
            $queryinsert = "INSERT INTO pendaftaran_pasien (pp_user_id, pp_keluhan, pp_tgl, pp_status, pp_tgl_pertemuan, pp_poli, pp_pegawai_id, pp_admin_by)
            VALUES ('$pp_user_id','$pp_keluhan','$pp_tgl','$pp_status','$pp_tgl_pertemuan','$pp_poli','$pp_pegawai_id','$pp_admin_by');";

            if (mysqli_query($koneksi, $queryinsert)) {
              ?>
              <meta http-equiv="refresh" content="0;url=data_pp.php"/>
              <div class="alert alert-primary" role="alert">
                Anda berhasil menambahkan data pendaftaran
              </div>

              <?php
            }else{
              ?>
              <div class="alert-danger" role="alert">
                Anda gagal menambahkan data pendaftaran
              </div>
              <?php
            }
          }
        }
        ?>

        <!-- Modal -->
        <div class="modal fade" id="modalInsertPP" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form method="POST">
               <div class="modal-body">
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Pasien</label>
                  <div class="col-sm-8">
                    <div class="controls">
                      <select name="pp_user_id" class="form-control">
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
                    <textarea style="height: 100px;" name="pp_keluhan" class="form-control" placeholder="Keluhan"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Tanggal Pesan</label>
                  <div class="col-sm-8">
                    <input type="datetime-local" class="form-control" id="pp_tgl" name="pp_tgl" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Status Pesanan</label>
                  <div class="col-sm-8">
                    <div class="controls">
                      <select name="pp_status" required class="form-control">
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
                    <input type="datetime-local" class="form-control" id="pp_tgl_pertemuan" name="pp_tgl_pertemuan">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">POLI</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="pp_poli" name="pp_poli">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Dokter</label>
                  <div class="col-sm-8">
                    <div class="controls">
                      <select name="pp_pegawai_id" class="form-control">
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
                  <label for="nama" class="col-sm-3 col-form-label">admin By</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="pp_admin_by" name="pp_admin_by" value="<?php echo $_SESSION['admin_nama']; ?>" required readonly>
                  </div>
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" name="buttoninsert">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>