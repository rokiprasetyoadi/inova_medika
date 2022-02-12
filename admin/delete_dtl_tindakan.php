<!-- DELETE -->
<?php
include ('../db/koneksi.php');
if (isset($_GET['dtl_tindakan_id'])) {

  $dtl_tindakan_id = $_GET['dtl_tindakan_id'];

  $querydelete = "DELETE FROM dtl_transaksi_tindakan WHERE dtl_tindakan_id=$dtl_tindakan_id;";

  if (mysqli_query($koneksi, $querydelete)) {
  	header('Location: ' . $_SERVER['HTTP_REFERER']);
    ?>
    <?php
  }else{
    echo "Anda gagal menghapus data tindakan";
  }
}
?>