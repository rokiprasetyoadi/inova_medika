<!-- DELETE -->
<?php
include ('../db/koneksi.php');
if (isset($_GET['pp_id'])) {

  $pp_id = $_GET['pp_id'];

  $querydelete = "DELETE FROM pendaftaran_pasien WHERE pp_id=$pp_id;";

  if (mysqli_query($koneksi, $querydelete)) {
    ?>
    <meta http-equiv="refresh" content="0;url=data_pp.php"/>
    <?php
  }else{
    echo "Anda gagal menghapus data pendaftar";
  }
}
?>