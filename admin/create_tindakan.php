        <!-- CREATE -->
        <?php
        if (isset($_POST['buttoninsert'])) {
          $tindakan_nama = $_POST['tindakan_nama'];
          $tindakan_deskripsi = $_POST['tindakan_deskripsi'];
          $tindakan_harga = $_POST['tindakan_harga'];
          $tindakan_created_by = $_POST['tindakan_created_by'];

          if ($tindakan_nama=="" || $tindakan_deskripsi=="" || $tindakan_harga=="") {
            ?>
            <div class="alert-danger" role="alert">
              Form tidak boleh ada yang kosong, pastikan semua field terisi
            </div>

            <?php
          }else{
            $queryinsert = "INSERT INTO tindakan (tindakan_nama, tindakan_deskripsi, tindakan_harga, tindakan_created_by)
            VALUES ('$tindakan_nama','$tindakan_deskripsi','$tindakan_harga','tindakan_created_by');";

            if (mysqli_query($koneksi, $queryinsert)) {
              ?>
              <meta http-equiv="refresh" content="0;url=data_tindakan.php"/>
              <div class="alert alert-primary" role="alert">
                Anda berhasil menambahkan data tindakan
              </div>

              <?php
            }else{
              ?>
              <div class="alert-danger" role="alert">
                Anda gagal menambahkan data tindakan
              </div>
              <?php
            }
          }
        }
        ?>

        <!-- Modal -->
        <div class="modal fade" id="modalInsertTindakan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                  <label for="nama" class="col-sm-3 col-form-label">Nama tindakan</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="tindakan_nama" name="tindakan_nama" placeholder="Nama tindakan" required minlength="2">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Deskripsi</label>
                  <div class="col-sm-8">
                    <textarea style="height: 100px;" class="form-control" placeholder="Deskripsi" name="tindakan_deskripsi" minlength="2" required></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Harga (Rp.)</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="tindakan_harga" name="tindakan_harga" required min="0">
                  </div>
                </div>
                <div class="form-group row" hidden>
                  <label for="nama" class="col-sm-3 col-form-label">Created By</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="tindakan_created_by" name="tindakan_created_by" value="<?php echo $_SESSION['admin_nama']; ?>" required readonly>
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