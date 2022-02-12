<!-- DELETE -->
<?php
include ('../db/koneksi.php');
if (isset($_GET['dtl_obat_id'])) {

  $dtl_obat_id = $_GET['dtl_obat_id'];

  $querydelete = "DELETE FROM dtl_transaksi_obat WHERE dtl_obat_id=$dtl_obat_id;";

  if (mysqli_query($koneksi, $querydelete)) {
  	header('Location: ' . $_SERVER['HTTP_REFERER']);
    ?>
    <?php
  }else{
    echo "Anda gagal menghapus data obat";
  }
}
?>