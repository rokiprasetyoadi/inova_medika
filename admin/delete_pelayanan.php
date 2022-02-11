<!-- DELETE -->
<?php
include ('../db/koneksi.php');
if (isset($_GET['transaksi_id'])) {

  $transaksi_id = $_GET['transaksi_id'];

  $querydelete = "DELETE FROM transaksi WHERE transaksi_id=$transaksi_id;";

  if (mysqli_query($koneksi, $querydelete)) {
    ?>
    <meta http-equiv="refresh" content="0;url=data_pelayanan.php"/>
    <?php
  }else{
    echo "Anda gagal menghapus data transaksi";
  }
}
?>