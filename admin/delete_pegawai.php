<!-- DELETE -->
<?php
include ('../db/koneksi.php');
if (isset($_GET['pegawai_id'])) {

  $pegawai_id = $_GET['pegawai_id'];

  $querydelete = "DELETE FROM pegawai WHERE pegawai_id=$pegawai_id;";

  if (mysqli_query($koneksi, $querydelete)) {
    ?>
    <meta http-equiv="refresh" content="0;url=data_pegawai.php"/>
    <?php
  }else{
    echo "Anda gagal menghapus data pegawai";
  }
}
?>