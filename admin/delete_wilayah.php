<!-- DELETE -->
<?php
include ('../db/koneksi.php');
if (isset($_GET['wilayah_id'])) {

  $wilayah_id = $_GET['wilayah_id'];

  $querydelete = "DELETE FROM wilayah WHERE wilayah_id=$wilayah_id;";

  if (mysqli_query($koneksi, $querydelete)) {
    ?>
    <meta http-equiv="refresh" content="0;url=data_wilayah.php"/>
    <?php
  }else{
    echo "Anda gagal menghapus data wilayah";
  }
}
?>