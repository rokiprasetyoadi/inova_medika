<?php
include ('partials/header.php');
include ('../db/koneksi.php');
$queryselect = " SELECT *FROM admin";
$resultselect = mysqli_query($koneksi, $queryselect);
?>

<!-- Page-header start -->
<div class="page-header">
	<div class="row align-items-end">
		<div class="col-lg-8">
			<div class="page-header-title">
				<div class="d-inline">
					<h4>Admin</h4>
					<span>Management Data Admin</span>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="page-header-breadcrumb">
				<ul class="breadcrumb-title">
					<li class="breadcrumb-item">
						<a href="index.php"> <i class="feather icon-home"></i> </a>
					</li>
					<li class="breadcrumb-item"><a href="#!">Data Master</a>
					</li>
					<li class="breadcrumb-item"><a href="data_admin.php">Data Admin</a>
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
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalInsertAdmin">Tambahkan Data <i class="feather icon-plus"></i></button>
			</div>

			<div class="table-responsive dt-responsive">
				<table id="dom-jqry" class="table table-striped table-bordered nowrap">
					<thead>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">Nama</th>
							<th style="text-align: center;">Alamat</th>
							<th style="text-align: center;">Telp</th>
							<th style="text-align: center;">Username</th>
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
								<td><?php echo $row['admin_nama']; ?></td>
								<td><?php echo $row['admin_alamat']; ?></td>
								<td><?php echo $row['admin_telp']; ?></td>
								<td><?php echo $row['admin_username']; ?></td>
								<td style="text-align: center;"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalUbahAdmin<?php echo $row['admin_id']; ?>"><i class="feather icon-edit"></i></button></td>
								<td style="text-align: center;"><a onclick="return confirm('Data yang dihapus tidak dapat dikembalikan. Yakin untuk melanjutkan?')" href="delete_admin.php?admin_id=<?php echo $row['admin_id']; ?>"><button class="btn btn-danger"><i class="feather icon-trash"></i></button></a></a></td>
							</tr>
							<?php include("update_admin.php"); ?>
							<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- DOM/Jquery table end -->
</div>

<?php
include ("create_admin.php");
include ("delete_admin.php");
?>

<?php
include ('partials/footer.php');
?>