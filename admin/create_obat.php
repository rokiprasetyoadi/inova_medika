        <!-- CREATE -->
        <?php
        if (isset($_POST['buttoninsert'])) {
          $obat_nama = $_POST['obat_nama'];
          $obat_deskripsi = $_POST['obat_deskripsi'];
          $obat_harga = $_POST['obat_harga'];
          $obat_created_by = $_POST['obat_created_by'];

          if ($obat_nama=="" || $obat_deskripsi=="" || $obat_harga=="") {
            ?>
            <div class="alert-danger" role="alert">
              Form tidak boleh ada yang kosong, pastikan semua field terisi
            </div>

            <?php
          }else{
            $queryinsert = "INSERT INTO obat (obat_nama, obat_deskripsi, obat_harga, obat_created_by)
            VALUES ('$obat_nama','$obat_deskripsi','$obat_harga','obat_created_by');";

            if (mysqli_query($koneksi, $queryinsert)) {
              ?>
              <meta http-equiv="refresh" content="0;url=data_obat.php"/>
              <div class="alert alert-primary" role="alert">
                Anda berhasil menambahkan data admin
              </div>

              <?php
            }else{
              ?>
              <div class="alert-danger" role="alert">
                Anda gagal menambahkan data admin
              </div>
              <?php
            }
          }
        }
        ?>

        <!-- Modal -->
        <div class="modal fade" id="modalInsertObat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                  <label for="nama" class="col-sm-3 col-form-label">Nama Obat</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="obat_nama" name="obat_nama" placeholder="Nama Obat" required minlength="2">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Deskripsi</label>
                  <div class="col-sm-8">
                    <textarea style="height: 100px;" class="form-control" placeholder="Deskripsi" name="obat_deskripsi" minlength="2" required></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Harga (Rp.)</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="obat_harga" name="obat_harga" required min="0">
                  </div>
                </div>
                <div class="form-group row" hidden>
                  <label for="nama" class="col-sm-3 col-form-label">Created By</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="obat_created_by" name="obat_created_by" value="<?php echo $_SESSION['admin_nama']; ?>" required readonly>
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