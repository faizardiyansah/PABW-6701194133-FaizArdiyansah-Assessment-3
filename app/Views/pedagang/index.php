<!doctype html>
<html lang="en">

<head>
	<title><?= $title; ?></title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="/pedagang">APTRABEMO</a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>

				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span>Admin</span></i></a>

						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/pedagang" class="active"><i class="lnr lnr-home"></i> <span>Daftar Pedagang</span></a></li>
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">DAFTAR PEDAGANG</h3><br>
							<p class="panel-subtitle"><a href="<?= base_url() ?>/pedagang/create" class="btn btn-success mt-5">Tambah Pedagang</a></p>
						</div>
						<?php if (session()->getFlashdata('pesan')) : ?>
							<div class="alert alert-success" role="alert">
								<?= session()->getFlashdata('pesan'); ?>
							</div>
						<?php endif; ?>
						<div class="container">
							<div class="row">
								<div class="col">
									<table class="table table-dark">
										<thead>
											<tr>
												<th scope="col">No.</th>
												<th scope="col">Nama</th>
												<th scope="col">Alamat</th>
												<th scope="col">Telepon</th>
												<th scope="col">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?= $i = 1; ?>
											<?php foreach ($pedagang as $row) : ?>
												<tr>
													<th scope="row"><?= $i++; ?></th>
													<td><?= $row['nama']; ?></td>
													<td><?= $row['alamat']; ?></td>
													<td><?= $row['telepon']; ?></td>
													<td>
														<a href="" class="btn btn-success btn-sm mb-1" data-toggle="modal" data-target="#deleteModal<?= $row['id']; ?>">
															Delete
														</a>
														<a href="" class="btn btn-success btn-sm mb-1" data-toggle="modal" data-target="#update<?= $row['id']; ?>">
															Update
														</a>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>

					</div>
					<!-- END OVERVIEW -->

				</div>
			</div>
		</div>
	</div>
	<!-- END MAIN CONTENT -->
	</div>
	<!-- END MAIN -->
	<div class="clearfix"></div>
	<footer>
		<div class="container-fluid">
			<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
		</div>
	</footer>
	</div>
	<?php foreach ($pedagang as $row) : ?>
		<div class="modal fade" id="deleteModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-circle"></i> Delete Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<?= form_open('pedagang/delete_data/' . $row['id']); ?>
						<?= csrf_field(); ?>
						<input type="hidden" name="id" value="<?= $row['id']; ?>">
						<p>Click the submit button to delete data (<?= $row['nama']; ?>)..!!!</p>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-danger btn-sm">Submit</button>
						</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>

	<?php foreach ($pedagang as $row) : ?>
		<div class="modal fade" id="update<?= $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-circle"></i> Delete Data</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<?= form_open('pedagang/update_data/' . $row['id']); ?>
						<?= csrf_field(); ?>
						<input type="hidden" name="id" value="<?= $row['id']; ?>">
						<div class="form-group">
							<label for="">Nama Pedagang</label>
							<input type="text" name="nama" id="" class="form-control" value="<?= $row['nama']; ?>">
						</div>
						<div class="form-group">
							<label for="">Alamat Pedagang</label>
							<input type="text" name="alamat" id="" class="form-control" value="<?= $row['alamat']; ?>">
						</div>
						<div class="form-group">
							<label for="">No Telepon Pedagang</label>
							<input type="text" name="telepon" id="" class="form-control" value="<?= $row['telepon']; ?>">
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-danger btn-sm">Submit</button>
						</div>
						<?= form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>

	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>

</body>

</html>