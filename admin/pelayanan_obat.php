<?php
include ('partials/header.php');
include ('../db/koneksi.php');
$transaksi_id = $_GET['transaksi_id'];
$query = "SELECT *FROM transaksi LEFT JOIN dtl_transaksi_obat ON transaksi.transaksi_id = dtl_transaksi_obat.dtl_obat_transaksi_id LEFT JOIN obat ON dtl_transaksi_obat.dtl_obat_obat_id = obat.obat_id LEFT JOIN dtl_transaksi_tindakan ON transaksi.transaksi_id = dtl_transaksi_tindakan.dtl_tindakan_transaksi_id LEFT JOIN tindakan ON tindakan.tindakan_id = dtl_transaksi_tindakan.dtl_tindakan_tindakan_id LEFT JOIN pegawai ON pegawai.pegawai_id = transaksi.transaksi_pegawai_id LEFT JOIN user ON user.user_id = transaksi.transaksi_user_id WHERE transaksi_id=$transaksi_id";
$result = mysqli_query($koneksi, $query);
$rowselectedit = mysqli_fetch_assoc($result);
?>

<!-- Page-header start -->
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4>Pelayanan Obat <?php echo $rowselectedit['user_nama']; ?></h4>
                    <span>Silahkan tambahkan data obat</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.php"> <i class="feather icon-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Transaksi</a>
                    </li>
                    <li class="breadcrumb-item"><a href="data_pelayanan.php">Pelayanan</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<div class="col-sm-12">
    <!-- Basic Form Inputs card start -->
    <div class="card">
        <div class="card-block">
            <form method="POST">
                <div class="form-group row" hidden>
                    <label class="col-sm-2 col-form-label">ID</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="dtl_obat_transaksi_id" value="<?php echo $rowselectedit['transaksi_id']; ?>" required readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Obat</label>
                    <div class="col-sm-10">
                        <select name="dtl_obat_obat_id" class="js-example-basic-single col-sm-12" required>
                            <option value="">-- PILIH SALAH SATU --</option>
                            <?php
                            $queryt = " SELECT * FROM obat";
                            $resultt = mysqli_query($koneksi, $queryt);
                            while ($tin = mysqli_fetch_array($resultt)){
                              ?>
                              <option value="<?php echo $tin['obat_id']; ?>|<?php echo $tin['obat_nama']; ?>|<?php echo $tin['obat_harga']; ?>"><?php echo $tin['obat_nama']; ?> | <?php echo $tin['obat_harga']; ?></option>
                          <?php } ?>
                      </select>
                  </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" min="0" name="dtl_obat_jumlah" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2"></label>
                <div class="col-sm-10">
                    <a href="data_pelayanan.php" class="btn btn-inverse" type="cancel">Kembali</a>
                    <button type="submit" name="buttonobat" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
</div>

<!-- Basic Form Inputs card end -->

<!-- Page-body start -->
<div class="page-body">
    <!-- DOM/Jquery table start -->
    <div class="card">
        <div class="card-block">
            <div style="float: right;">

            </div>
            <div class="table-responsive dt-responsive">
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Obat</th>
                            <th style="text-align: center;">Jumlah</th>
                            <th style="text-align: center;">Subtotal</th>
                            <th style="text-align: center;">Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $transaksi_id = $_GET['transaksi_id'];
                        $queryobat = "SELECT *FROM transaksi LEFT JOIN dtl_transaksi_obat ON transaksi.transaksi_id = dtl_transaksi_obat.dtl_obat_transaksi_id LEFT JOIN obat ON obat.obat_id = dtl_transaksi_obat.dtl_obat_obat_id WHERE transaksi_id=$transaksi_id";
                        $resulobat = mysqli_query($koneksi, $queryobat);
                        $i=1;
                        while ($tdk = mysqli_fetch_array($resulobat)){
                            ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $i++; ?></td>

                                <td style="text-align: center;"><?php echo $tdk['obat_nama']; ?></td>
                                <td style="text-align: center;"><?php echo $tdk['dtl_obat_jumlah']; ?></td>
                                <td style="text-align: center;"><?php echo $tdk['dtl_obat_subtotal']; ?></td>
                                <td style="text-align: center;"><a onclick="return confirm('Data yang dihapus tidak dapat dikembalikan. Yakin untuk melanjutkan?')" href="delete_dtl_obat.php?dtl_obat_id=<?php echo $tdk['dtl_obat_id']; ?>"><button class="btn btn-danger"><i class="feather icon-trash"></i></button></a></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- DOM/Jquery table end -->
</div>

<!-- Tombol SAVE obat -->
<?php
include ('../db/koneksi.php');
if (isset($_POST['buttonobat'])) {
  $dtl_obat_transaksi_id = $_POST['dtl_obat_transaksi_id'];
  $obat_harga = explode("|", $_POST['dtl_obat_obat_id']);
  $dtl_obat_obat_id = $obat_harga[0];
  $dtl_obat_jumlah = $_POST['dtl_obat_jumlah'];
  $dtl_obat_subtotal = $obat_harga[2]*$_POST['dtl_obat_jumlah'];

  if ($dtl_obat_transaksi_id=="") {
    ?>
    <div class="alert-danger" role="alert">
      Form tidak boleh ada yang kosong, pastikan semua field terisi
  </div>

  <?php
}else{
    $queryinsert = "INSERT INTO dtl_transaksi_obat (dtl_obat_id, dtl_obat_transaksi_id, dtl_obat_obat_id, dtl_obat_jumlah, dtl_obat_subtotal)
    VALUES ('$dtl_obat_id','$dtl_obat_transaksi_id','$dtl_obat_obat_id','$dtl_obat_jumlah','$dtl_obat_subtotal');";

    if (mysqli_query($koneksi, $queryinsert)) {
      ?>
      <meta http-equiv="refresh" content="0"/>
      <div class="alert alert-primary" role="alert">
        Anda berhasil menambahkan data obat
    </div>

    <?php
}else{
  ?>
  <div class="alert-danger" role="alert">
    Anda gagal menambahkan data obat
    <?php
}
}
}
?>

<?php
include ('partials/footer.php');
?>