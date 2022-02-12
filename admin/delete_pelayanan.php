<!-- DELETE -->
<?php
include ('../db/koneksi.php');
if (isset($_GET['transaksi_id'])) {

  $transaksi_id = $_GET['transaksi_id'];

  $querydelete = "DELETE transaksi, dtl_transaksi_obat, dtl_transaksi_tindakan FROM transaksi LEFT JOIN dtl_transaksi_obat ON transaksi.transaksi_id = dtl_transaksi_obat.dtl_obat_transaksi_id LEFT JOIN dtl_transaksi_tindakan ON transaksi.transaksi_id = dtl_transaksi_tindakan.dtl_tindakan_transaksi_id WHERE transaksi.transaksi_id=$transaksi_id";

  if (mysqli_query($koneksi, $querydelete)) {
    ?>
    <meta http-equiv="refresh" content="0;url=data_pelayanan.php"/>
    <?php
  }else{
    echo "Anda gagal menghapus data transaksi";
  }
}
?>