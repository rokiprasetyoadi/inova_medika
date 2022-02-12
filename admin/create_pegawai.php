        <!-- CREATE -->
        <?php
        if (isset($_POST['buttoninsert'])) {
          $pegawai_nama = $_POST['pegawai_nama'];
          $pegawai_spesialis = $_POST['pegawai_spesialis'];
          $pegawai_telp = $_POST['pegawai_telp'];
          $pegawai_email = $_POST['pegawai_email'];
          $pegawai_username = $_POST['pegawai_username'];
          $pegawai_password = md5($_POST['pegawai_password']);
          $pegawai_created_by = $_POST['pegawai_created_by'];

          if ($pegawai_nama=="" || $pegawai_username=="" || $pegawai_password=="") {
            ?>
            <div class="alert-danger" role="alert">
              Form tidak boleh ada yang kosong, pastikan semua field terisi
            </div>

            <?php
          }else{
            $queryinsert = "INSERT INTO pegawai (pegawai_nama, pegawai_spesialis, pegawai_telp, pegawai_email, pegawai_username, pegawai_password, pegawai_created_by)
            VALUES ('$pegawai_nama','$pegawai_spesialis','$pegawai_telp','$pegawai_email','$pegawai_username','$pegawai_password','$pegawai_created_by');";

            if (mysqli_query($koneksi, $queryinsert)) {
              ?>
              <meta http-equiv="refresh" content="0;url=data_pegawai.php"/>
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
        <div class="modal fade" id="modalInsertPegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                  <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="pegawai_nama" name="pegawai_nama" placeholder="Nama" required minlength="2">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Spesialis</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="pegawai_spesialis" name="pegawai_spesialis" placeholder="Spesialis" required minlength="2">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Telepon</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="pegawai_telp" name="pegawai_telp" placeholder="Telepon" minlength="11">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="pegawai_email" name="pegawai_email" placeholder="Email" required minlength="2">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="pegawai_username" name="pegawai_username" placeholder="Username" required minlength="2">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="pegawai_password" name="pegawai_password" placeholder="Password" required minlength="6">
                  </div>
                </div>
                <div class="form-group row" hidden>
                  <label for="nama" class="col-sm-3 col-form-label">Created By</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="pegawai_created_by" name="pegawai_created_by" value="<?php echo $_SESSION['admin_nama']; ?>" required readonly>
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