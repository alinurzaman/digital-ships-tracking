<?php
ob_start();
	session_start();
	if($_SESSION['sudahloginadmin']==true){
		include("db-connect.php");
		koneksi_db();
		date_default_timezone_set('Asia/Jakarta');
		$id_pegawai = $_SESSION['user'];
		$get_pegawai = mysql_query("SELECT * FROM pegawai WHERE id_pegawai='$id_pegawai'");
		$data_pegawai = mysql_fetch_array($get_pegawai);
		$id_laporan = $_GET['idl'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>DIGITAL MENGAWASI BC GRESIK | PROSES LAPORAN</title>
	<meta name="description" content="DIGITAL MENGAWASI BC GRESIK PROSES LAPORAN" />
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="dist/img/logobc.png">
	<link rel="icon" href="dist/img/logobc.png" type="image/x-icon">
	
		<!-- Jasny-bootstrap CSS -->
		<link href="vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		
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
					<a href="notifikasi.php" class="active"><div class="pull-left"><i class="zmdi zmdi-inbox mr-20"></i><span class="right-nav-text">Notifikasi</span></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="menuagen.php"><div class="pull-left"><i class="zmdi zmdi-account mr-20"></i><span class="right-nav-text">Kelola Pengguna Jasa</span></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="resetpassword.php"><div class="pull-left"><i class="zmdi zmdi-key mr-20"></i><span class="right-nav-text">Reset Password Pengguna Jasa</span></div><div class="clearfix"></div></a>
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
					<div class="col-sm-9">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark">Proses Laporan Pengguna Jasa</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<?php
								$get_laporan = mysql_query("SELECT id_laporan, sarana_laporan, bendera_laporan, B.nama_lokasi, tanggaleta_laporan, eta_laporan, tanggaletb_laporan, etb_laporan, kategori_laporan, muatan_laporan, impor_laporan, C.nama_agen, rute_laporan, nobc10_laporan, nobc11_laporan FROM laporan AS A INNER JOIN lokasi AS B ON A.id_lokasi = B.id_lokasi INNER JOIN agen AS C ON A.id_agen = C.id_agen WHERE id_laporan='$id_laporan'");
								$data_laporan = mysql_fetch_array($get_laporan);
								?>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form class="form-horizontal" method="post" action="" name="create" enctype="multipart/form-data">
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="nama">Nama Sarkut:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="nama" value="<?php echo $data_laporan['sarana_laporan'];?>" readonly>
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="bendera">Bendera:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="bendera" value="<?php echo $data_laporan['bendera_laporan'];?>" readonly>
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="lokasi">Lokasi Sandar:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="lokasi" value="<?php echo $data_laporan['nama_lokasi'];?>" readonly>
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="tanggaleta">Tanggal ETA:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="tanggaleta" value="<?php echo $data_laporan['tanggaleta_laporan']; ?>" readonly>
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="eta">Pukul ETA:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="eta" value="<?php echo $data_laporan['eta_laporan']; ?>" readonly>
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="tanggaletb">Tanggal ETB:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="tanggaletb" value="<?php echo $data_laporan['tanggaletb_laporan']; ?>" readonly>
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="etb">Pukul ETB:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="etb" value="<?php echo $data_laporan['etb_laporan']; ?>" readonly>
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="kategori">Kategori:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="kategori" value="<?php echo $data_laporan['kategori_laporan']; ?>" readonly>
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="muatan">Muatan:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="muatan" value="<?php echo $data_laporan['muatan_laporan']; ?>" readonly>
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="impor">Impor/Eskpor:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="impor" value="<?php echo $data_laporan['impor_laporan']; ?>" readonly>
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="agen">Pengguna Jasa:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="agen" value="<?php echo $data_laporan['nama_agen']; ?>" readonly>
												</div>
												</div>
												<hr>
												<?php if(empty($data_laporan['rute_laporan'])){ ?>
												<div class="form-group">
													<label class="control-label col-sm-3">3 Rute Terakhir:</label>
												<div class="col-sm-2">
													<input type="text" class="form-control" name="rute" placeholder="Rute-Rute-Rute" tabindex="1">
												</div>
													
												<div class="fileinput fileinput-new input-group col-sm-6" data-provides="fileinput">
													<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
														<span class="input-group-addon fileupload btn btn-primary btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Pilih File</span> <span class="fileinput-exists btn-text">Ganti</span>
														<input type="file" name="filerute" tabindex="2">
														</span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Hapus</span></a>
													<div class="col-sm-2">
													<button name="submitrute" type="submit" class="btn btn-primary btn-anim" tabindex="3"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button>
</div>
												</div>
												</div>
												<?php } if(empty($data_laporan['nobc10_laporan'])){?>
												<div class="form-group">
													<label class="control-label col-sm-3">File BC 1.0:</label>
												<div class="col-sm-2">
													<input type="text" class="form-control" name="nobc10" placeholder="No. BC 1.0" tabindex="4">
												</div>
													
												<div class="fileinput fileinput-new input-group col-sm-6" data-provides="fileinput">
													<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
														<span class="input-group-addon fileupload btn btn-primary btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Pilih File</span> <span class="fileinput-exists btn-text">Ganti</span>
														<input type="file" name="bc10" tabindex="5">
														</span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Hapus</span></a>
													<div class="col-sm-2">
													<button name="submitbc10" type="submit" class="btn btn-primary btn-anim" tabindex="6"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button>
</div>
												</div>
												</div>
												<?php } if(empty($data_laporan['nobc11_laporan'])){?>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3">File BC 1.1:</label>
												<div class="col-sm-2">
													<input type="text" class="form-control" name="nobc11" placeholder="No. BC 1.1" tabindex="7">
												</div>

													<div class="fileinput fileinput-new input-group col-sm-6" data-provides="fileinput">
														<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
														<span class="input-group-addon fileupload btn btn-primary btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Pilih File</span> <span class="fileinput-exists btn-text">Ganti</span>
														<input type="file" name="bc11" tabindex="8">
														</span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Hapus</span></a> 
														<div class="col-sm-2">
														<button name="submitbc11" type="submit" class="btn btn-primary btn-anim" tabindex="9"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button>
														</div>
													</div>
												</div>
												<?php }?>
												<div class="form-group mb-0"> 
													<div class="col-sm-offset-3 col-sm-10">
														<a href="https://www.marinetraffic.com" target="_blank" class="btn btn-primary">Marine Traffic</a>
													  
													</div>
												</div>
												</form>
													<?php
														if (isset($_POST['submitrute'])==true){
															$rute = $_POST['rute'];
															$filerute = $_FILES['filerute']['name'];
															if($rute!="" && $filerute!=""){
																$tmp_rute = $_FILES['filerute']['tmp_name'];
																if(move_uploaded_file($tmp_rute,'files/'.$filerute)){
																	$addressrute = 'localhost/admin.dimasgresik/files/'.$filerute;
																	$updaterute = mysql_query("UPDATE laporan SET rute_laporan='$rute', filerute_laporan='$addressrute' WHERE id_laporan='$id_laporan'");
																	if($updaterute){
																		echo '<script language="javascript">alert("Upload dokumen Rute berhasil!"); document.location="proseslaporan.php?idl=' . $id_laporan . '"</script>';
																	} else{
																		echo '<script language="javascript">alert("Gagal simpan dokumen Rute!");</script>';
																	}
																}
															} else{
																echo '<script language="javascript">alert("Ada isian yang kosong!");</script>';
															}
														}
														if (isset($_POST['submitbc10'])==true){
															$nobc10 = $_POST['nobc10'];
															$bc10 = $_FILES['bc10']['name'];
															if($bc10!="" && $nobc10!=""){
																$tmp_bc10 = $_FILES['bc10']['tmp_name'];
																if(move_uploaded_file($tmp_bc10,'files/'.$bc10)){
																		$addressbc10 = 'localhost/admin.dimasgresik/files/'.$bc10;
																		$insert = mysql_query("UPDATE laporan SET nobc10_laporan='$nobc10', bc10_laporan='$addressbc10', id_pegawai='$id_pegawai' WHERE id_laporan='$id_laporan'");
																		if($insert){
																			echo '<script language="javascript">alert("Upload dokumen BC 1.0 berhasil!"); document.location="proseslaporan.php?idl=' . $id_laporan . '"</script>';
																		}
																		else{
																			echo '<script language="javascript">alert("Gagal simpan dokumen BC 1.0!");</script>';
																		}
																	}
																}
																else{
																	echo '<script language="javascript">alert("Ada isian yang kosong!");</script>';
																}
															}
														if (isset($_POST['submitbc11'])==true){
															$nobc11 = $_POST['nobc11'];
															$bc11 = $_FILES['bc11']['name'];
															if($bc11!="" && $nobc11!=""){
																$tmp_bc11 = $_FILES['bc11']['tmp_name'];
																if(move_uploaded_file($tmp_bc11,'files/'.$bc11)){
																		$addressbc11 = 'localhost/admin.dimasgresik/files/'.$bc11;
																		$insert = mysql_query("UPDATE laporan SET nobc11_laporan='$nobc11', bc11_laporan='$addressbc11', id_pegawai='$id_pegawai' WHERE id_laporan='$id_laporan'");
																		if($insert){
																			echo '<script language="javascript">alert("Upload dokumen BC 1.1 berhasil!"); document.location="proseslaporan.php?idl=' . $id_laporan . '"</script>';
																		}
																		else{
																			echo '<script language="javascript">alert("Gagal simpan dokumen BC 1.1!");</script>';
																		}
																	}
																}
																else{
																	echo '<script language="javascript">alert("Ada isian yang kosong!");</script>';
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
</body>

</html>

<?php
	}
	else header("Location: index.php");
ob_end_flush();
?>