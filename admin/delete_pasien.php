<!-- DELETE -->
<?php
include ('../db/koneksi.php');
if (isset($_GET['user_id'])) {

  $user_id = $_GET['user_id'];

  $querydelete = "DELETE FROM user WHERE user_id=$user_id;";

  if (mysqli_query($koneksi, $querydelete)) {
    ?>
    <meta http-equiv="refresh" content="0;url=data_pasien.php"/>
    <?php
  }else{
    echo "Anda gagal menghapus data pasien";
  }
}
?>