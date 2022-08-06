<?php
ob_start();
	session_start();
	if(($_SESSION['sudahloginadmin']==true)&&($_SESSION['role']=='ADMIN')){
		include("db-connect.php");
		koneksi_db();
		date_default_timezone_set('Asia/Jakarta');
		$id_pegawai = $_SESSION['user'];
		$get_pegawai = mysql_query("SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'");
		$data_pegawai = mysql_fetch_array($get_pegawai);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>DIGITAL MENGAWASI BC GRESIK | RESET PASSWORD PENGGUNA JASA</title>
	<meta name="description" content="DIGITAL MENGAWASI BC GRESIK RESET PASSWORD AGEN" />
	
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
								<a href="#"><i class="zmdi zmdi-account"></i><?php echo $data_pegawai['nama_pegawai'];?></a>
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
					<span>Menu Admin</span> 
					<i class="zmdi zmdi-more"></i>
				</li>
				<li>
					<a href="notifikasi.php"><div class="pull-left"><i class="zmdi zmdi-inbox mr-20"></i><span class="right-nav-text">Notifikasi</span></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="menuagen.php"><div class="pull-left"><i class="zmdi zmdi-account mr-20"></i><span class="right-nav-text">Kelola Pengguna Jasaspan></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="resetpassword.php" class="active"><div class="pull-left"><i class="zmdi zmdi-key mr-20"></i><span class="right-nav-text">Reset Password Pengguna Jasa</span></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="menupegawai.php"><div class="pull-left"><i class="zmdi zmdi-accounts mr-20"></i><span class="right-nav-text">Kelola Pegawai</span></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="menulokasi.php"><div class="pull-left"><i class="zmdi zmdi-boat mr-20"></i><span class="right-nav-text">Kelola Lokasi Sandar</span></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="daftarlaporan.php"><div class="pull-left"><i class="zmdi zmdi-file-text mr-20"></i><span class="right-nav-text">Ekspor Laporan</span></div><div class="clearfix"></div></a>
				</li>
			</ul>
		</div>
		<!-- /Left Sidebar Menu -->
		
        <!-- Main Content -->
		<div class="page-wrapper">
            <div class="container-fluid">
				
				<!-- Row -->
				<div class="row">
					<div class="col-sm-6">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Reset Password Pengguna Jasa</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form class="form-horizontal" method="post" action="" name="create">
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="nama">ID Pengguna Jasa:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="id" placeholder="Maksimum 12 karakter" style="text-transform: uppercase" maxlength="12">
												</div>
												</div>
												<div class="form-group mb-0"> 
													<div class="col-sm-offset-3 col-sm-10">
													  <button name="submit" type="submit" class="btn btn-primary btn-anim"><i class="icon-rocket"></i><span class="btn-text">Reset</span></button>
													</div>
												</div>
												</form>
													<?php
														if (isset($_POST['submit'])==true){
															$id = $_POST['id'];
															if($id != ""){
																$update = mysql_query("UPDATE agen SET pass_agen=PASSWORD('123456') WHERE id_agen='$id'");
																if($update){
																	echo '<script language="javascript">alert("Reset berhasil! Password: 123456");document.location="resetpassword.php"</script>';
																}
																else{
																	echo '<script language="javascript">alert("Reset gagal!");</script>';
																}
															}
															else{
																echo '<script language="javascript">alert("ID Pengguna Jasa belum diisi!");</script>';
															}
														}
													?>
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
		
		<!-- Bootstrap Core JavaScript -->
		<script src="vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="dist/js/jquery.slimscroll.js"></script>
	
		<!-- Fancy Dropdown JS -->
		<script src="dist/js/dropdown-bootstrap-extended.js"></script>
		
		<!-- Owl JavaScript -->
		<script src="vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
		<!-- Switchery JavaScript -->
		<script src="vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
		<!-- Init JavaScript -->
		<script src="dist/js/init.js"></script>
		
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