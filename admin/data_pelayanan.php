<?php
include ('partials/header.php');
include ('../db/koneksi.php');
$queryselect = " SELECT *FROM transaksi LEFT JOIN dtl_transaksi_obat ON transaksi.transaksi_id = dtl_transaksi_obat.dtl_obat_transaksi_id LEFT JOIN obat ON dtl_transaksi_obat.dtl_obat_obat_id = obat.obat_id LEFT JOIN dtl_transaksi_tindakan ON transaksi.transaksi_id = dtl_transaksi_tindakan.dtl_tindakan_transaksi_id LEFT JOIN tindakan ON tindakan.tindakan_id = dtl_transaksi_tindakan.dtl_tindakan_tindakan_id LEFT JOIN pegawai ON pegawai.pegawai_id = transaksi.transaksi_pegawai_id LEFT JOIN user ON user.user_id = transaksi.transaksi_user_id";
$resultselect = mysqli_query($koneksi, $queryselect);
?>

<!-- Page-header start -->
<div class="page-header">
	<div class="row align-items-end">
		<div class="col-lg-8">
			<div class="page-header-title">
				<div class="d-inline">
					<h4>Pelayanan</h4>
					<span>Management Data Pelayanan</span>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="page-header-breadcrumb">
				<ul class="breadcrumb-title">
					<li class="breadcrumb-item">
						<a href="index.php"> <i class="feather icon-home"></i> </a>
					</li>
					<li class="breadcrumb-item"><a href="#!">Transaksi</a>
					</li>
					<li class="breadcrumb-item"><a href="data_pelayanan.php">Data Pelayanan</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- Page-header end -->

<!-- Page-body start -->
<div class="page-body">
	<!-- DOM/Jquery table start -->
	<div class="card">
		
		<div class="card-block">
			<div class="btn-group" style="margin-bottom: 15px;">
				<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInsertPegawai">Tambahkan Data <i class="feather icon-plus"></i></button>-->
			</div>
			<div class="table-responsive dt-responsive">
				<table id="dom-jqry" class="table table-striped table-bordered nowrap">
					<thead>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">Nama</th>
							<th style="text-align: center;">Poli</th>
							<th style="text-align: center;">Dokter</th>
							<th style="text-align: center;">Deposit</th>
							<th style="text-align: center;">Subtotal</th>
							<th style="text-align: center;">Total</th>
							<th style="text-align: center;" colspan="2">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i=1;
						while ($row = mysqli_fetch_array($resultselect)){
							?>
							<tr>
								<td><?= $i++ ?></td>
								<td><?php echo $row['user_nama']; ?></td>
								<td><?php echo $row['transaksi_poli']; ?></td>
								<td><?php echo $row['pegawai_nama']; ?></td>
								<td><?php echo number_format($row['transaksi_deposit']); ?></td>
								<td><?php echo number_format($row['transaksi_subtotal']); ?></td>
								<td><?php echo number_format($row['transaksi_total']); ?></td>
								<td style="text-align: center;"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalUbahPelayanan<?php echo $row['transaksi_id']; ?>"><i class="feather icon-edit"></i></button></td>
								<td style="text-align: center;"><a onclick="return confirm('Data yang dihapus tidak dapat dikembalikan. Yakin untuk melanjutkan?')" href="delete_pelayanan.php?transaksi_id=<?php echo $row['transaksi_id']; ?>"><button class="btn btn-danger"><i class="feather icon-trash"></i></button></a></a></td>
							</tr>
							<!--
							<?php include("update_pelayanan.php"); ?>
						-->

						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- DOM/Jquery table end -->
</div>

<?php
include ("create_pelayanan.php");
include ("delete_pelayanan.php");
?>

<?php
include ('partials/footer.php');
?>