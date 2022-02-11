<?php
include ('partials/header.php');
include ('../db/koneksi.php');
$queryselect = " SELECT * FROM pendaftaran_pasien LEFT JOIN user ON pendaftaran_pasien.pp_user_id = user.user_id LEFT JOIN pegawai ON pendaftaran_pasien.pp_pegawai_id = pegawai.pegawai_id";
$resultselect = mysqli_query($koneksi, $queryselect);
?>

<!-- Page-header start -->
<div class="page-header">
	<div class="row align-items-end">
		<div class="col-lg-8">
			<div class="page-header-title">
				<div class="d-inline">
					<h4>Pendaftaran Pasien</h4>
					<span>Management Data Pendaftaran</span>
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
					<li class="breadcrumb-item"><a href="data_pp.php">Pendaftaran Pasien</a>
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
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInsertPP">Tambahkan Data <i class="feather icon-plus"></i></button>
			</div>

			<div class="table-responsive dt-responsive">
				<table id="dom-jqry" class="table table-striped table-bordered nowrap">
					<thead>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">Nama</th>
							<th style="text-align: center;">Jadwal Pertemuan</th>
							<th style="text-align: center;">Dokter</th>
							<th style="text-align: center;">Poli</th>
							<th style="text-align: center;">Status</th>
							<th style="text-align: center;" colspan="2">Aksi</th>
							<th style="text-align: center;">Pelayanan</th>
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
								<td><?php echo $row['pp_tgl_pertemuan']; ?></td>
								<td><?php echo $row['pegawai_nama']; ?></td>
								<td><?php echo $row['pp_poli']; ?></td>
								<td><?php echo $row['pp_status']; ?></td>
								<td style="text-align: center;"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalUbahPP<?php echo $row['pp_id']; ?>"><i class="feather icon-edit"></i></button></td>
								<td style="text-align: center;"><a onclick="return confirm('Data yang dihapus tidak dapat dikembalikan. Yakin untuk melanjutkan?')" href="delete_pp.php?pp_id=<?php echo $row['pp_id']; ?>"><button class="btn btn-danger"><i class="feather icon-trash"></i></button></a></a></td>
								<td style="text-align: center;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalService<?= $row['pp_id']?>"><i class="feather icon-check-circle"></i></button></td>
							</tr>
							<?php include("create_pelayanan.php"); ?>
							<?php include("update_pp.php"); ?>
							<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- DOM/Jquery table end -->
</div>

<?php
include ("create_pp.php");
include ("delete_pp.php");
?>

<?php
include ('partials/footer.php');
?>