        <!-- CREATE -->
        <?php
        if (isset($_POST['buttoninsert'])) {
          $user_ktp_id = $_POST['user_ktp_id'];
          $user_nama = $_POST['user_nama'];
          $user_jenkel = $_POST['user_jenkel'];
          $user_tgl_lahir = $_POST['user_tgl_lahir'];
          $user_telp = $_POST['user_telp'];
          $user_alamat = $_POST['user_alamat'];
          $user_wilayah_id = $_POST['user_wilayah_id'];
          $user_username = $_POST['user_username'];
          $user_password = md5($_POST['user_password']);

          if ($user_nama=="" || $user_jenkel=="" || $user_telp=="") {
            ?>
            <div class="alert-danger" role="alert">
              Form tidak boleh ada yang kosong, pastikan semua field terisi
            </div>

            <?php
          }else{
            $queryinsert = "INSERT INTO user (user_ktp_id, user_nama, user_jenkel, user_tgl_lahir, user_telp, user_alamat, user_wilayah_id, user_username, user_password)
            VALUES ('$user_ktp_id','$user_nama','$user_jenkel','$user_tgl_lahir','$user_telp','$user_alamat', '$user_wilayah_id','$user_username','$user_password');";

            if (mysqli_query($koneksi, $queryinsert)) {
              ?>
              <meta http-equiv="refresh" content="0;url=data_pasien.php"/>
              <div class="alert alert-primary" role="alert">
                Anda berhasil menambahkan data pasien
              </div>

              <?php
            }else{
              ?>
              <div class="alert-danger" role="alert">
                Anda gagal menambahkan data pasien
              </div>
              <?php
            }
          }
        }
        ?>

        <!-- Modal -->
        <div class="modal fade" id="modalInsertPasien" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                  <label for="nama" class="col-sm-3 col-form-label">ID KTP</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" id="user_ktp_id" name="user_ktp_id" placeholder="Nomor Kartu Tanda Penduduk">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="user_nama" name="user_nama" placeholder="Nama" required minlength="2">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                  <div class="col-sm-8">
                    <div class="controls">
                      <select name="user_jenkel" class="form-control">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" id="user_tgl_lahir" name="user_tgl_lahir" required>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Telepon / WA</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="user_telp" name="user_telp" placeholder="Nomor Telp / WA" required minlength="12">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Alamat</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" style="height: 100px;" name="user_alamat" placeholder="Alamat"></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Kecamatan</label>
                  <div class="col-sm-8">
                    <div class="controls">
                      <select name="user_wilayah_id" class="form-control">
                        <?php
                        $queryw = " SELECT * FROM wilayah";
                        $resultselect = mysqli_query($koneksi, $queryw);
                        while ($w = mysqli_fetch_array($resultselect)){
                          ?>
                          <option value="<?php echo $w['wilayah_id']; ?>"><?php echo $w['wilayah_kecamatan']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Username</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="user_username" name="user_username" placeholder="Username" required minlength="2">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Password</label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="user_password" name="user_password" placeholder="Password" required minlength="6">
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