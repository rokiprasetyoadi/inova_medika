<!-- DELETE -->
<?php
include ('../db/koneksi.php');
if (isset($_GET['admin_id'])) {

  $admin_id = $_GET['admin_id'];

  $querydelete = "DELETE FROM admin WHERE admin_id=$admin_id;";

  if (mysqli_query($koneksi, $querydelete)) {
    ?>
    <meta http-equiv="refresh" content="0;url=data_admin.php"/>
    <?php
  }else{
    echo "Anda gagal menghapus data admin";
  }
}
?>