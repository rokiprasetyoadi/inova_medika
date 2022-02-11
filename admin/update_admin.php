<!-- UPDATE -->
      <?php
      include ('../db/koneksi.php');
      if (isset($_POST['buttonUbah'])) {
        $admin_id = $_POST['admin_id'];
        $admin_nama = $_POST['admin_nama'];
        $admin_telp = $_POST['admin_telp'];
        $admin_alamat = $_POST['admin_alamat'];
        $admin_username = $_POST['admin_username'];
        $admin_password = md5($_POST['admin_password']);

        $queryupdate = " UPDATE admin SET admin_nama='$admin_nama', admin_telp='$admin_telp', admin_alamat='$admin_alamat', admin_username='$admin_username', admin_password='$admin_password' WHERE admin_id=$admin_id;";

        if (mysqli_query($koneksi, $queryupdate)) {

          ?>
          <meta http-equiv="refresh" content="0;url=data_admin.php"/>
          <?php

        }else{
          echo "Anda gagal mengubah data";
        }
      }
      ?>

      <!-- Modal -->
      <div class="modal fade" id="modalUbahAdmin<?php echo $row['admin_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalCenterTitle">Edit Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <?php
            $id = $row['admin_id'];
            $queryselectedit = "SELECT * FROM admin WHERE admin_id=$id";
            $resultselectedit = mysqli_query($koneksi, $queryselectedit);
            $rowselectedit = mysqli_fetch_assoc ($resultselectedit);
            ?>

            <form method="POST">
             <div class="modal-body">
              <div class="form-group row" hidden>
                <label for="id_admin" class="col-sm-3 col-form-label">Id Admin</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="admin_id" name="admin_id" placeholder="ID Admin" value="<?php echo $rowselectedit['admin_id']; ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">nama</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="admin_nama" name="admin_nama" placeholder="Nama" value="<?php echo $rowselectedit['admin_nama']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Telepon</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="admin_telp" name="admin_telp" placeholder="Telepon" value="<?php echo $rowselectedit['admin_telp']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="nama" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="admin_alamat" name="admin_alamat" placeholder="Alamat" value="<?php echo $rowselectedit['admin_alamat']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="admin_username" name="admin_username" placeholder="Username" value="<?php echo $rowselectedit['admin_username']; ?>">
                </div>
              </div>
              <div class="form-group row" hidden>
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="admin_password" name="admin_password" placeholder="password" value="<?php echo $rowselectedit['admin_password']; ?>" readonly>
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