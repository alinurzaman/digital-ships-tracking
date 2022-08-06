<?php
ob_start();
	session_start();
	if($_SESSION['sudahlogin']==true){
		include("db-connect.php");
		koneksi_db();
		date_default_timezone_set('Asia/Jakarta');
		$id_agen = $_SESSION['user'];
		$get_agen = mysql_query("SELECT * FROM agen WHERE id_agen='$id_agen'");
		$data_agen = mysql_fetch_array($get_agen);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>DIGITAL MENGAWASI BC GRESIK | HISTORY LAPORAN</title>
	<meta name="description" content="DIGITAL MENGAWASI BC GRESIK HISTORY" />
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="dist/img/logobc.png">
	<link rel="icon" href="dist/img/logobc.png" type="image/x-icon">
	
	<!-- Morris Charts CSS -->
    <link href="vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
	
	<!-- Data table CSS -->
	<link href="vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>

	<!-- select2 CSS -->
	<link href="vendors/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css"/>
			
	<!-- Custom CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
	
</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-1-active pimary-color-blue">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
						<a href="index.html">
							<img class="brand-img" src="dist/img/logobc.png" width="25px" alt="brand"/>
							<span class="brand-text"><font size="-6">DIGITAL MENGAWASI BC GRESIK</font></span>
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
			</div>
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
				<ul class="nav navbar-right top-nav pull-right">
					<li class="dropdown auth-drp">
						<a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="dist/img/user.png" width="80" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
								<a href="#"><i class="zmdi zmdi-account"></i><?php echo $data_agen['nama_agen'];?></a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="gantipassword.php"><i class="zmdi zmdi-key"></i>Ganti Password</a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="logout.php"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		<div class="fixed-sidebar-left">
			<ul class="nav navbar-nav side-nav nicescroll-bar">
				<li class="navigation-header">
					<span>Menu Pengguna Jasa</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a href="lapor.php"><div class="pull-left"><i class="zmdi zmdi-file-plus mr-20"></i><span class="right-nav-text">Lapor Baru</span></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="history.php" class="active"><div class="pull-left"><i class="zmdi zmdi-file-text mr-20"></i><span class="right-nav-text">History Laporan</span></div><div class="clearfix"></div></a>
				</li>
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
		
        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Row -->
				<div class="row">
					<div class="col-md-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">History Laporan</h6>
									</div>
									<div class="clearfix"></div>
								</div>
							<?php
								$get_laporan = mysql_query("SELECT id_laporan, tanggal_laporan, sarana_laporan, bendera_laporan, B.nama_lokasi, tanggaleta_laporan, tanggaletb_laporan, eta_laporan, etb_laporan, kategori_laporan, muatan_laporan, impor_laporan, id_pegawai, approve_laporan FROM laporan AS A INNER JOIN lokasi AS B ON A.id_lokasi = B.id_lokasi WHERE id_agen = '$id_agen'");
								
								
							?>
							<div class="panel-wrapper collapse in">
								<div class="panel-body">
									<div class="table-wrap">
										<div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>#ID LAPORAN</th>
														<th>TANGGAL LAPOR</th>
														<th>NAMA SARKUT</th>
														<th>BENDERA</th>
														<th>LOKASI SANDAR</th>
														<th>TANGGAL ETA</th>
														<th>ETA</th>
														<th>TANGGAL ETB</th>
														<th>ETB</th>
														<th>KATEGORI</th>
														<th>MUATAN</th>
														<th>SEBAGAI</th>
														<th>STATUS</th>
													</tr>
												</thead>
												<tbody>
													<?php while($data_laporan=mysql_fetch_array($get_laporan)){
													$date_lapor=date_create($data_laporan['tanggal_laporan']);
													$date_eta=date_create($data_laporan['tanggaleta_laporan']);
													$date_etb=date_create($data_laporan['tanggaletb_laporan']);
													?>
													<tr>
														<td><?php echo $data_laporan['id_laporan'];?></td>
														<td><?php echo date_format($date_lapor,"d/m/Y");?></td>
														<td><?php echo $data_laporan['sarana_laporan'];?></td>
														<td><?php echo $data_laporan['bendera_laporan'];?></td>
														<td><?php echo $data_laporan['nama_lokasi'];?></td>
														<td><?php echo date_format($date_eta,"d/m/Y");?></td>
														<td><?php echo $data_laporan['eta_laporan'];?></td>
														<td><?php echo date_format($date_etb,"d/m/Y");?></td>
														<td><?php echo $data_laporan['etb_laporan'];?></td>
														<td><?php echo $data_laporan['kategori_laporan'];?></td>
														<td><?php echo $data_laporan['muatan_laporan'];?></td>
														<td><?php echo $data_laporan['impor_laporan'];?></td>
														<td>
															<?php
																if ($data_laporan['approve_laporan'] == "1"){ ?>
																	<span class="label label-primary">Approved</span>
																<?php }	else {?>
																	<span class="label label-warning">Pending</span>
															<?php }	?>							   
														</td>
													</tr>
													<?php }?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>				
				</div>
				<!-- Row -->
			</div>
			
			<!-- Footer -->
			<footer class="footer container-fluid pl-30 pr-30">
				<div class="row">
					<div class="col-sm-12">
						<p>&copy;2019. DIGITAL MENGAWASI BC GRESIK.</p>
					</div>
				</div>
			</footer>
			<!-- /Footer -->
			
		</div>
        <!-- /Main Content -->

    </div>
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
	<!-- jQuery -->
    <script src="vendors/bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Data table JavaScript -->
	<script src="vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="dist/js/dataTables-data.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="dist/js/jquery.slimscroll.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Init JavaScript -->
	<script src="dist/js/init.js"></script>
	
		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
				
		<!-- Form Advance Init JavaScript -->
		<script src="dist/js/form-advance-data.js"></script>
		
		<!-- Select2 JavaScript -->
		<script src="vendors/bower_components/select2/dist/js/select2.full.min.js"></script>
</body>

</html>

<?php
	}
	else header("Location: index.php");
ob_end_flush();
?>