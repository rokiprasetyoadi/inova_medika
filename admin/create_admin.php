        <!-- CREATE -->
        <?php
        if (isset($_POST['buttoninsert'])) {
          $admin_nama = $_POST['admin_nama'];
          $admin_telp = $_POST['admin_telp'];
          $admin_alamat = $_POST['admin_alamat'];
          $admin_username = $_POST['admin_username'];
          $admin_password = md5($_POST['admin_password']);

          if ($admin_nama=="" || $admin_username=="" || $admin_password=="") {
            ?>
            <div class="alert-danger" role="alert">
              Form tidak boleh ada yang kosong, pastikan semua field terisi
            </div>

            <?php
          }else{
            $queryinsert = "INSERT INTO admin (admin_nama, admin_telp, admin_alamat, admin_username, admin_password)
            VALUES ('$admin_nama','$admin_telp','$admin_alamat','$admin_username','$admin_password');";

            if (mysqli_query($koneksi, $queryinsert)) {
              ?>
              <meta http-equiv="refresh" content="0;url=data_admin.php"/>
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
        <div class="modal fade" id="modalInsertAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <input type="text" class="form-control" id="admin_nama" name="admin_nama" placeholder="Nama" required minlength="2">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-8">
                    <textarea style="height: 100px;" class="form-control" id="admin_alamat" name="admin_alamat" placeholder="Alamat"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Telepon</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="admin_telp" name="admin_telp" placeholder="Telepon" minlength="11">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="admin_username" name="admin_username" placeholder="Username" required minlength="2">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="password" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="Password" required minlength="6">
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