<!-- DELETE -->
<?php
include ('../db/koneksi.php');
if (isset($_GET['tindakan_id'])) {

  $tindakan_id = $_GET['tindakan_id'];

  $querydelete = "DELETE FROM tindakan WHERE tindakan_id=$tindakan_id;";

  if (mysqli_query($koneksi, $querydelete)) {
    ?>
    <meta http-equiv="refresh" content="0;url=data_tindakan.php"/>
    <?php
  }else{
    echo "Anda gagal menghapus data tindakan";
  }
}
?>