        <!-- CREATE -->
        <?php
        if (isset($_POST['buttoninsert'])) {
          $wilayah_kecamatan = $_POST['wilayah_kecamatan'];
          $wilayah_created_by = $_POST['wilayah_created_by'];

          if ($wilayah_kecamatan=="") {
            ?>
            <div class="alert-danger" role="alert">
              Form tidak boleh ada yang kosong, pastikan semua field terisi
            </div>

            <?php
          }else{
            $queryinsert = "INSERT INTO wilayah (wilayah_kecamatan, wilayah_created_by)
            VALUES ('$wilayah_kecamatan', '$wilayah_created_by');";

            if (mysqli_query($koneksi, $queryinsert)) {
              ?>
              <meta http-equiv="refresh" content="0;url=data_wilayah.php"/>
              <div class="alert alert-primary" role="alert">
                Anda berhasil menambahkan data wilayah
              </div>

              <?php
            }else{
              ?>
              <div class="alert-danger" role="alert">
                Anda gagal menambahkan data wilayah
              </div>
              <?php
            }
          }
        }
        ?>

        <!-- Modal -->
        <div class="modal fade" id="modalInsertWilayah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                  <label for="nama" class="col-sm-3 col-form-label">Wilayah</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="wilayah_kecamatan" name="wilayah_kecamatan" placeholder="Nama Wilayah" required minlength="2">
                  </div>
                </div>
                <div class="form-group row" hidden>
                  <label for="nama" class="col-sm-3 col-form-label">Created By</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="wilayah_created_by" name="wilayah_created_by" value="<?php echo $_SESSION['admin_nama']; ?>" required readonly>
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