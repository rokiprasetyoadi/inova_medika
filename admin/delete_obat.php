<!-- DELETE -->
<?php
include ('../db/koneksi.php');
if (isset($_GET['obat_id'])) {

  $obat_id = $_GET['obat_id'];

  $querydelete = "DELETE FROM obat WHERE obat_id=$obat_id;";

  if (mysqli_query($koneksi, $querydelete)) {
    ?>
    <meta http-equiv="refresh" content="0;url=data_obat.php"/>
    <?php
  }else{
    echo "Anda gagal menghapus data obat";
  }
}
?>