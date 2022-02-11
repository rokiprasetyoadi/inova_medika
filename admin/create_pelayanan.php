        <!-- CREATE -->
        <?php
        if (isset($_POST['buttonAdd'])) {
          $transaksi_user_id = $_POST['transaksi_user_id'];
          $transaksi_pegawai_id = $_POST['transaksi_pegawai_id'];
          $transaksi_keluhan = $_POST['transaksi_keluhan'];
          $transaksi_tgl = $_POST['transaksi_tgl'];
          $transaksi_poli = $_POST['transaksi_poli'];
          $transaksi_deposit = $_POST['transaksi_deposit'];
          $transaksi_admin_by = $_POST['transaksi_admin_by'];

          if ($transaksi_user_id=="" || $transaksi_admin_by=="") {
            ?>
            <div class="alert-danger" role="alert">
              Form tidak boleh ada yang kosong, pastikan semua field terisi
            </div>

            <?php
          }else{
            $queryinsert = "INSERT INTO transaksi (transaksi_user_id, transaksi_pegawai_id, transaksi_keluhan, transaksi_tgl, transaksi_poli, transaksi_deposit, transaksi_admin_by)
            VALUES ('$transaksi_user_id','$transaksi_pegawai_id','$transaksi_keluhan','$transaksi_tgl','$transaksi_poli','$transaksi_deposit','$transaksi_admin_by');";

            if (mysqli_query($koneksi, $queryinsert)) {
              ?>
              <meta http-equiv="refresh" content="0;url=data_pelayanan.php"/>
              <div class="alert alert-primary" role="alert">
                Anda berhasil menambahkan data transaksi
              </div>

              <?php
            }else{
              ?>
              <div class="alert-danger" role="alert">
                Anda gagal menambahkan data transaksi
              </div>
              <?php
            }
          }
        }
        ?>

        <!-- Modal -->
        <div class="modal fade" id="modalService<?= $row['pp_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data</h5>
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
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Pasien</label>
                  <div class="col-sm-8" hidden>
                    <input type="text" class="form-control" value="<?php echo $rowselectedit['pp_user_id']; ?>" name="transaksi_user_id" readonly>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo $rowselectedit['user_nama']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Dokter</label>
                  <div class="col-sm-8" hidden>
                    <input type="text" class="form-control" value="<?php echo $rowselectedit['pp_pegawai_id']; ?>" name="transaksi_pegawai_id" readonly>
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo $rowselectedit['pegawai_nama']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Keluhan</label>
                  <div class="col-sm-8">
                    <textarea style="height: 100px;" name="transaksi_keluhan" class="form-control" placeholder="Keluhan"><?php echo $rowselectedit['pp_keluhan']; ?></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Tanggal Pesan</label>
                  <div class="col-sm-8">
                    <input type="datetime" value="<?php echo $rowselectedit['pp_tgl_pertemuan']; ?>" class="form-control" name="transaksi_tgl" required readonly>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">POLI</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" value="<?php echo $rowselectedit['pp_poli']; ?>" name="transaksi_poli" readonly>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Deposit</label>
                  <div class="col-sm-8">
                    <input type="number" class="form-control" name="transaksi_deposit" min="10000" required>
                  </div>
                </div>
                <div class="form-group row" hidden>
                  <label for="nama" class="col-sm-3 col-form-label">admin By</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="transaksi_admin_by" name="transaksi_admin_by" value="<?php echo $_SESSION['admin_nama']; ?>" required readonly>
                  </div>
                </div>
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" name="buttonAdd">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>