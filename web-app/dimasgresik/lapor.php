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
	<title>DIGITAL MENGAWASI BC GRESIK | LAPOR</title>
	<meta name="description" content="DIGITAL MENGAWASI BC GRESIK LAPOR" />
	
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
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
	<script>
		$("input").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD")
        .format( this.getAttribute("data-date-format") )
    )
}).trigger("change")
	</script>
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
					<a href="lapor.php" class="active"><div class="pull-left"><i class="zmdi zmdi-file-plus mr-20"></i><span class="right-nav-text">Lapor Baru</span></div><div class="clearfix"></div></a>
				</li>
				<li>
					<a href="history.php"><div class="pull-left"><i class="zmdi zmdi-file-text mr-20"></i><span class="right-nav-text">History Laporan</span></div><div class="clearfix"></div></a>
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
										<h6 class="panel-title txt-dark">Lapor Baru</h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form class="form-horizontal" method="post" action="" name="create">
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="nama">Nama Sarkut:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="nama" style="text-transform: uppercase" tabindex="1">
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="bendera">Bendera:</label>
												<div class="col-sm-6">
													<select class="form-control select2" name="bendera" tabindex="2">
														<OPTION VALUE="AFGANISTAN">AFGHANISTAN</OPTION>
														   <OPTION VALUE="ALBANIA">ALBANIA</OPTION>
														   <OPTION VALUE="ALGERIA">ALGERIA</OPTION>
														   <OPTION VALUE="AMERICAN SAMOA">AMERICAN SAMOA</OPTION>
														   <OPTION VALUE="ANDORRA">ANDORRA</OPTION>
														   <OPTION VALUE="ANGOLA">ANGOLA</OPTION>
														   <OPTION VALUE="ANGUILLA">ANGUILLA</OPTION>
														   <OPTION VALUE="ANTIGUA & BARBUDA">ANTIGUA & BARBUDA</OPTION>
														   <OPTION VALUE="ARGENTINA">ARGENTINA</OPTION>
														   <OPTION VALUE="ARMENIA">ARMENIA</OPTION>
														   <OPTION VALUE="ARUBA">ARUBA</OPTION>
														   <OPTION VALUE="AUSTRALIA">AUSTRALIA</OPTION>
														   <OPTION VALUE="AUSTRIA">AUSTRIA</OPTION>
														   <OPTION VALUE="AZERBAIJAN">AZERBAIJAN</OPTION>
														   <OPTION VALUE="BAHAMAS">BAHAMAS</OPTION>
														   <OPTION VALUE="BAHRAIN">BAHRAIN</OPTION>
														   <OPTION VALUE="BANGLADESH">BANGLADESH</OPTION>
														   <OPTION VALUE="BARBADOS">BARBADOS</OPTION>
														   <OPTION VALUE="BELARUS">BELARUS</OPTION>
														   <OPTION VALUE="BELGIUM">BELGIUM</OPTION>
														   <OPTION VALUE="BELIZE">BELIZE</OPTION>
														   <OPTION VALUE="BENIN">BENIN</OPTION>
														   <OPTION VALUE="BERMUDA">BERMUDA</OPTION>
														   <OPTION VALUE="BHUTAN">BHUTAN</OPTION>
														   <OPTION VALUE="BOLIVIA">BOLIVIA</OPTION>
														   <OPTION VALUE="BONAIRE">BONAIRE</OPTION>
														   <OPTION VALUE="BOSNIA & HERZEGOVINA">BOSNIA & HERZEGOVINA</OPTION>
														   <OPTION VALUE="BOTSWANA">BOTSWANA</OPTION>
														   <OPTION VALUE="BRAZIL">BRAZIL</OPTION>
														   <OPTION VALUE="BRITISH INDIAN OCEAN TER">BRITISH INDIAN OCEAN TER</OPTION>
														   <OPTION VALUE="BRUNEI">BRUNEI</OPTION>
														   <OPTION VALUE="BULGARIA">BULGARIA</OPTION>
														   <OPTION VALUE="BURKINA FASO">BURKINA FASO</OPTION>
														   <OPTION VALUE="BURUNDI">BURUNDI</OPTION>
														   <OPTION VALUE="CAMBODIA">CAMBODIA</OPTION>
														   <OPTION VALUE="CAMEROON">CAMEROON</OPTION>
														   <OPTION VALUE="CANADA">CANADA</OPTION>
														   <OPTION VALUE="CANARY ISLANDS">CANARY ISLANDS</OPTION>
														   <OPTION VALUE="CAPE VERDE">CAPE VERDE</OPTION>
														   <OPTION VALUE="CAYMAN ISLANDS">CAYMAN ISLANDS</OPTION>
														   <OPTION VALUE="CENTRAL AFRICAN REPUBLIC">CENTRAL AFRICAN REPUBLIC</OPTION>
														   <OPTION VALUE="CHAD">CHAD</OPTION>
														   <OPTION VALUE="CHANNEL ISLANDS">CHANNEL ISLANDS</OPTION>
														   <OPTION VALUE="CHILE">CHILE</OPTION>
														   <OPTION VALUE="CHINA">CHINA</OPTION>
														   <OPTION VALUE="CHRISTMAS ISLAND">CHRISTMAS ISLAND</OPTION>
														   <OPTION VALUE="COCOS ISLAND">COCOS ISLAND</OPTION>
														   <OPTION VALUE="COLOMBIA">COLOMBIA</OPTION>
														   <OPTION VALUE="COMOROS">COMOROS</OPTION>
														   <OPTION VALUE="CONGO">CONGO</OPTION>
														   <OPTION VALUE="COOK ISLANDS">COOK ISLANDS</OPTION>
														   <OPTION VALUE="COSTA RICA">COSTA RICA</OPTION>
														   <OPTION VALUE="COTE DIVOIRE">COTE DIVOIRE</OPTION>
														   <OPTION VALUE="CROATIA">CROATIA</OPTION>
														   <OPTION VALUE="CUBA">CUBA</OPTION>
														   <OPTION VALUE="CURACO">CURACAO</OPTION>
														   <OPTION VALUE="CYPRUS">CYPRUS</OPTION>
														   <OPTION VALUE="CZECH REPUBLIC">CZECH REPUBLIC</OPTION>
														   <OPTION VALUE="DENMARK">DENMARK</OPTION>
														   <OPTION VALUE="DJIBOUTI">DJIBOUTI</OPTION>
														   <OPTION VALUE="DOMINICA">DOMINICA</OPTION>
														   <OPTION VALUE="DOMINICAN REPUBLIC">DOMINICAN REPUBLIC</OPTION>
														   <OPTION VALUE="EAST TIMOR">EAST TIMOR</OPTION>
														   <OPTION VALUE="ECUADOR">ECUADOR</OPTION>
														   <OPTION VALUE="EGYPT">EGYPT</OPTION>
														   <OPTION VALUE="EL SALVADOR">EL SALVADOR</OPTION>
														   <OPTION VALUE="EQUATORIAL GUINEA">EQUATORIAL GUINEA</OPTION>
														   <OPTION VALUE="ERITREA">ERITREA</OPTION>
														   <OPTION VALUE="ESTONIA">ESTONIA</OPTION>
														   <OPTION VALUE="ETHIOPIA">ETHIOPIA</OPTION>
														   <OPTION VALUE="FALKLAND ISLANDS">FALKLAND ISLANDS</OPTION>
														   <OPTION VALUE="FAROE ISLANDS">FAROE ISLANDS</OPTION>
														   <OPTION VALUE="FIJI">FIJI</OPTION>
														   <OPTION VALUE="FINLAND">FINLAND</OPTION>
														   <OPTION VALUE="FRANCE">FRANCE</OPTION>
														   <OPTION VALUE="FRENCH GUIANA">FRENCH GUIANA</OPTION>
														   <OPTION VALUE="FRENCH POLYNESIA">FRENCH POLYNESIA</OPTION>
														   <OPTION VALUE="FRENCH SOUTHERN TER">FRENCH SOUTHERN TER</OPTION>
														   <OPTION VALUE="GABON">GABON</OPTION>
														   <OPTION VALUE="GAMBIA">GAMBIA</OPTION>
														   <OPTION VALUE="GEORGIA">GEORGIA</OPTION>
														   <OPTION VALUE="GERMANY">GERMANY</OPTION>
														   <OPTION VALUE="GHANA">GHANA</OPTION>
														   <OPTION VALUE="GIBRALTAR">GIBRALTAR</OPTION>
														   <OPTION VALUE="GREAT BRITAIN">GREAT BRITAIN</OPTION>
														   <OPTION VALUE="GREECE">GREECE</OPTION>
														   <OPTION VALUE="GREENLAND">GREENLAND</OPTION>
														   <OPTION VALUE="GRENADA">GRENADA</OPTION>
														   <OPTION VALUE="GUADELOUPE">GUADELOUPE</OPTION>
														   <OPTION VALUE="GUAM">GUAM</OPTION>
														   <OPTION VALUE="GUATEMALA">GUATEMALA</OPTION>
														   <OPTION VALUE="GUINEA">GUINEA</OPTION>
														   <OPTION VALUE="GUYANA">GUYANA</OPTION>
														   <OPTION VALUE="HAITI">HAITI</OPTION>
														   <OPTION VALUE="HAWAII">HAWAII</OPTION>
														   <OPTION VALUE="HONDURAS">HONDURAS</OPTION>
														   <OPTION VALUE="HONG KONG">HONG KONG</OPTION>
														   <OPTION VALUE="HUNGARY">HUNGARY</OPTION>
														   <OPTION VALUE="ICELAND">ICELAND</OPTION>
														   <OPTION VALUE="INDONESIA">INDONESIA</OPTION>
														   <OPTION VALUE="INDIA">INDIA</OPTION>
														   <OPTION VALUE="IRAN">IRAN</OPTION>
														   <OPTION VALUE="IRAQ">IRAQ</OPTION>
														   <OPTION VALUE="IRELAND">IRELAND</OPTION>
														   <OPTION VALUE="ISLE OF MAN">ISLE OF MAN</OPTION>
														   <OPTION VALUE="ISRAEL">ISRAEL</OPTION>
														   <OPTION VALUE="ITALY">ITALY</OPTION>
														   <OPTION VALUE="JAMAICA">JAMAICA</OPTION>
														   <OPTION VALUE="JAPAN">JAPAN</OPTION>
														   <OPTION VALUE="JORDAN">JORDAN</OPTION>
														   <OPTION VALUE="KAZAKHSTAN">KAZAKHSTAN</OPTION>
														   <OPTION VALUE="KENYA">KENYA</OPTION>
														   <OPTION VALUE="KIRIBATI">KIRIBATI</OPTION>
														   <OPTION VALUE="KOREA NORTH">KOREA NORTH</OPTION>
														   <OPTION VALUE="KOREA SOUT">KOREA SOUTH</OPTION>
														   <OPTION VALUE="KUWAIT">KUWAIT</OPTION>
														   <OPTION VALUE="KYRGYZSTAN">KYRGYZSTAN</OPTION>
														   <OPTION VALUE="LAOS">LAOS</OPTION>
														   <OPTION VALUE="LATVIA">LATVIA</OPTION>
														   <OPTION VALUE="LEBANON">LEBANON</OPTION>
														   <OPTION VALUE="LESOTHO">LESOTHO</OPTION>
														   <OPTION VALUE="LIBERIA">LIBERIA</OPTION>
														   <OPTION VALUE="LIBYA">LIBYA</OPTION>
														   <OPTION VALUE="LIECHTENSTEIN">LIECHTENSTEIN</OPTION>
														   <OPTION VALUE="LITHUANIA">LITHUANIA</OPTION>
														   <OPTION VALUE="LUXEMBOURG">LUXEMBOURG</OPTION>
														   <OPTION VALUE="MACAU">MACAU</OPTION>
														   <OPTION VALUE="MACEDONIA">MACEDONIA</OPTION>
														   <OPTION VALUE="MADAGASCAR">MADAGASCAR</OPTION>
														   <OPTION VALUE="MALAYSIA">MALAYSIA</OPTION>
														   <OPTION VALUE="MALAWI">MALAWI</OPTION>
														   <OPTION VALUE="MALDIVES">MALDIVES</OPTION>
														   <OPTION VALUE="MALI">MALI</OPTION>
														   <OPTION VALUE="MALTA">MALTA</OPTION>
														   <OPTION VALUE="MARSHALL ISLANDS">MARSHALL ISLANDS</OPTION>
														   <OPTION VALUE="MARTINIQUE">MARTINIQUE</OPTION>
														   <OPTION VALUE="MAURITANIA">MAURITANIA</OPTION>
														   <OPTION VALUE="MAURITIUS">MAURITIUS</OPTION>
														   <OPTION VALUE="MAYOTTE">MAYOTTE</OPTION>
														   <OPTION VALUE="MEXICO">MEXICO</OPTION>
														   <OPTION VALUE="MIDWAY ISLANDS">MIDWAY ISLANDS</OPTION>
														   <OPTION VALUE="MOLDOVA">MOLDOVA</OPTION>
														   <OPTION VALUE="MONACO">MONACO</OPTION>
														   <OPTION VALUE="MONGOLIA">MONGOLIA</OPTION>
														   <OPTION VALUE="MONTSERRAT">MONTSERRAT</OPTION>
														   <OPTION VALUE="MOROCCO">MOROCCO</OPTION>
														   <OPTION VALUE="MOZAMBIQUE">MOZAMBIQUE</OPTION>
														   <OPTION VALUE="MYANMAR">MYANMAR</OPTION>
														   <OPTION VALUE="NAMBIA">NAMBIA</OPTION>
														   <OPTION VALUE="NAURU">NAURU</OPTION>
														   <OPTION VALUE="NEPAL">NEPAL</OPTION>
														   <OPTION VALUE="NETHERLAND ANTILLES">NETHERLAND ANTILLES</OPTION>
														   <OPTION VALUE="NETHERLANDS">NETHERLANDS (HOLLAND, EUROPE)</OPTION>
														   <OPTION VALUE="NEVIS">NEVIS</OPTION>
														   <OPTION VALUE="NEW CALEDONIA">NEW CALEDONIA</OPTION>
														   <OPTION VALUE="NEW ZEALAND">NEW ZEALAND</OPTION>
														   <OPTION VALUE="NICARAGUA">NICARAGUA</OPTION>
														   <OPTION VALUE="NIGER">NIGER</OPTION>
														   <OPTION VALUE="NIGERIA">NIGERIA</OPTION>
														   <OPTION VALUE="NIUE">NIUE</OPTION>
														   <OPTION VALUE="NORFOLK ISLAND">NORFOLK ISLAND</OPTION>
														   <OPTION VALUE="NORWAY">NORWAY</OPTION>
														   <OPTION VALUE="OMAN">OMAN</OPTION>
														   <OPTION VALUE="PAKISTAN">PAKISTAN</OPTION>
														   <OPTION VALUE="PALAU ISLAND">PALAU ISLAND</OPTION>
														   <OPTION VALUE="PALESTINE">PALESTINE</OPTION>
														   <OPTION VALUE="PANAMA">PANAMA</OPTION>
														   <OPTION VALUE="PAPUA NEW GUINEA">PAPUA NEW GUINEA</OPTION>
														   <OPTION VALUE="PARAGUAY">PARAGUAY</OPTION>
														   <OPTION VALUE="PERU">PERU</OPTION>
														   <OPTION VALUE="PHILLIPINES">PHILIPPINES</OPTION>
														   <OPTION VALUE="PITCAIRN ISLAND">PITCAIRN ISLAND</OPTION>
														   <OPTION VALUE="POLAND">POLAND</OPTION>
														   <OPTION VALUE="PORTUGAL">PORTUGAL</OPTION>
														   <OPTION VALUE="PUERTO RICO">PUERTO RICO</OPTION>
														   <OPTION VALUE="QATAR">QATAR</OPTION>
														   <OPTION VALUE="REPUBLIC OF MONTENEGRO">REPUBLIC OF MONTENEGRO</OPTION>
														   <OPTION VALUE="REPUBLIC OF SERBIA">REPUBLIC OF SERBIA</OPTION>
														   <OPTION VALUE="REUNION">REUNION</OPTION>
														   <OPTION VALUE="ROMANIA">ROMANIA</OPTION>
														   <OPTION VALUE="RUSSIA">RUSSIA</OPTION>
														   <OPTION VALUE="RWANDA">RWANDA</OPTION>
														   <OPTION VALUE="ST BARTHELEMY">ST BARTHELEMY</OPTION>
														   <OPTION VALUE="ST EUSTATIUS">ST EUSTATIUS</OPTION>
														   <OPTION VALUE="ST HELENA">ST HELENA</OPTION>
														   <OPTION VALUE="ST KITTS-NEVIS">ST KITTS-NEVIS</OPTION>
														   <OPTION VALUE="ST LUCIA">ST LUCIA</OPTION>
														   <OPTION VALUE="ST MAARTEN">ST MAARTEN</OPTION>
														   <OPTION VALUE="ST PIERRE & MIQUELON">ST PIERRE & MIQUELON</OPTION>
														   <OPTION VALUE="ST VINCENT & GRENADINES">ST VINCENT & GRENADINES</OPTION>
														   <OPTION VALUE="SAIPAN">SAIPAN</OPTION>
														   <OPTION VALUE="SAMOA">SAMOA</OPTION>
														   <OPTION VALUE="SAMOA AMERICAN">SAMOA AMERICAN</OPTION>
														   <OPTION VALUE="SAN MARINO">SAN MARINO</OPTION>
														   <OPTION VALUE="SAO TOME & PRINCIPE">SAO TOME & PRINCIPE</OPTION>
														   <OPTION VALUE="SAUDI ARABIA">SAUDI ARABIA</OPTION>
														   <OPTION VALUE="SENEGAL">SENEGAL</OPTION>
														   <OPTION VALUE="SEYCHELLES">SEYCHELLES</OPTION>
														   <OPTION VALUE="SIERRA LEONE">SIERRA LEONE</OPTION>
														   <OPTION VALUE="SINGAPORE">SINGAPORE</OPTION>
														   <OPTION VALUE="SLOVAKIA">SLOVAKIA</OPTION>
														   <OPTION VALUE="SLOVENIA">SLOVENIA</OPTION>
														   <OPTION VALUE="SOLOMON ISLANDS">SOLOMON ISLANDS</OPTION>
														   <OPTION VALUE="SOMALIA">SOMALIA</OPTION>
														   <OPTION VALUE="SOUTH AFRICA">SOUTH AFRICA</OPTION>
														   <OPTION VALUE="SPAIN">SPAIN</OPTION>
														   <OPTION VALUE="SRI LANKA">SRI LANKA</OPTION>
														   <OPTION VALUE="SUDAN">SUDAN</OPTION>
														   <OPTION VALUE="SURINAME">SURINAME</OPTION>
														   <OPTION VALUE="SWAZILAND">SWAZILAND</OPTION>
														   <OPTION VALUE="SWEDEN">SWEDEN</OPTION>
														   <OPTION VALUE="SWITZERLAND">SWITZERLAND</OPTION>
														   <OPTION VALUE="SYRIA">SYRIA</OPTION>
														   <OPTION VALUE="TAHITI">TAHITI</OPTION>
														   <OPTION VALUE="TAIWAN">TAIWAN</OPTION>
														   <OPTION VALUE="TAJIKISTAN">TAJIKISTAN</OPTION>
														   <OPTION VALUE="TANZANIA">TANZANIA</OPTION>
														   <OPTION VALUE="THAILAND">THAILAND</OPTION>
														   <OPTION VALUE="TOGO">TOGO</OPTION>
														   <OPTION VALUE="TOKELAU">TOKELAU</OPTION>
														   <OPTION VALUE="TONGA">TONGA</OPTION>
														   <OPTION VALUE="TRINIDAD & TOBAGO">TRINIDAD & TOBAGO</OPTION>
														   <OPTION VALUE="TUNISIA">TUNISIA</OPTION>
														   <OPTION VALUE="TURKEY">TURKEY</OPTION>
														   <OPTION VALUE="TURKMENISTAN">TURKMENISTAN</OPTION>
														   <OPTION VALUE="TURKS & CAICOS IS">TURKS & CAICOS IS</OPTION>
														   <OPTION VALUE="TUVALU">TUVALU</OPTION>
														   <OPTION VALUE="UGANDA">UGANDA</OPTION>
														   <OPTION VALUE="UNITED KINGDOM">UNITED KINGDOM</OPTION>
														   <OPTION VALUE="UKRAINE">UKRAINE</OPTION>
														   <OPTION VALUE="UNITED ARAB ERIMATES">UNITED ARAB EMIRATES</OPTION>
														   <OPTION VALUE="UNITED STATES OF AMERICA">UNITED STATES OF AMERICA</OPTION>
														   <OPTION VALUE="URAGUAY">URUGUAY</OPTION>
														   <OPTION VALUE="UZBEKISTAN">UZBEKISTAN</OPTION>
														   <OPTION VALUE="VANUATU">VANUATU</OPTION>
														   <OPTION VALUE="VATICAN CITY STATE">VATICAN CITY STATE</OPTION>
														   <OPTION VALUE="VENEZUELA">VENEZUELA</OPTION>
														   <OPTION VALUE="VIETNAM">VIETNAM</OPTION>
														   <OPTION VALUE="VIRGIN ISLANDS (BRIT)">VIRGIN ISLANDS (BRIT)</OPTION>
														   <OPTION VALUE="VIRGIN ISLANDS (USA)">VIRGIN ISLANDS (USA)</OPTION>
														   <OPTION VALUE="WAKE ISLAND">WAKE ISLAND</OPTION>
														   <OPTION VALUE="WALLIS & FUTANA IS">WALLIS & FUTANA IS</OPTION>
														   <OPTION VALUE="YEMEN">YEMEN</OPTION>
														   <OPTION VALUE="ZAIRE">ZAIRE</OPTION>
														   <OPTION VALUE="ZAMBIA">ZAMBIA</OPTION>
														   <OPTION VALUE="ZIMBABWE">ZIMBABWE</OPTION>

													</select>
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="lokasi">Lokasi Sandar:</label>
												<div class="col-sm-6">
													<select class="form-control select2" name="lokasi" tabindex="3">
														<?php
															$cek = "SELECT * FROM lokasi";
															$cek = mysql_query($cek);
																while($data=mysql_fetch_array($cek)){
														?>
														<option value="<?php echo $data['id_lokasi']; ?>"><?php echo $data['nama_lokasi']; ?></option>
														<?php } ?>
													</select>
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="tanggaleta">Tanggal ETA:</label>
												<div class="col-sm-6">
													<input type="date" class="form-control" name="tanggaleta" tabindex="4">
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="eta">Pukul ETA:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="eta" data-mask="99:99:99" placeholder="Contoh: 06:45:00" tabindex="5">
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="tanggaletb">Tanggal ETB:</label>
												<div class="col-sm-6">
													<input type="date" class="form-control" name="tanggaletb" tabindex="6">
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="etb">Pukul ETB:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="etb" data-mask="99:99:99" placeholder="Contoh: 12:50:00" tabindex="7">
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="kategori">Kategori:</label>
												<div class="col-sm-6">
													<select class="form-control select2" name="kategori" tabindex="8">
														<option value="PADAT">PADAT</option>
														<option value="CAIR">CAIR</option>
														<option value="GAS">GAS</option>
													</select>
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="muatan">Muatan:</label>
												<div class="col-sm-6">
													<input type="text" class="form-control" name="muatan" tabindex="9">
												</div>
												</div>
												<div class="form-group">
													<label class="control-label mb-10 col-sm-3" for="impor">Kegiatan:</label>
												<div class="col-sm-6">
													<select class="form-control select2" name="impor" tabindex="10">
														<option value="IMPOR">IMPOR</option>
														<option value="EKSPOR">EKSPOR</option>
														<option value="ANTAR PULAU">ANTAR PULAU</option>
													</select>
												</div>
												</div>
												<div class="form-group mb-0"> 
													<div class="col-sm-offset-3 col-sm-10">
													  <button name="submit" type="submit" class="btn btn-primary btn-anim" tabindex="11"><i class="icon-rocket"></i><span class="btn-text">Submit</span></button>
													</div>
												</div>
												</form>
													<?php
														if (isset($_POST['submit'])==true){
															$nama = strtoupper($_POST['nama']);
															$bendera = $_POST['bendera'];
															$lokasi = $_POST['lokasi'];
															$eta = $_POST['eta'];
															$etb = $_POST['etb'];
															$tanggaleta = $_POST['tanggaleta'];
															$tanggaletb = $_POST['tanggaletb'];
															$kategori = $_POST['kategori'];
															$muatan = $_POST['muatan'];
															$impor= $_POST['impor'];
															$approve = "0";
															$tanggallaporan = date("Y-m-d");
															
															
															if($nama != "" && $tanggaleta!= "" && $tanggaletb!= "" && $eta!= "" && $etb!= "" && $muatan!= ""){
																$insert = mysql_query("INSERT INTO laporan VALUES(NULL, '$tanggallaporan', '$nama', '$bendera', '$lokasi','$tanggaleta','$tanggaletb','$eta','$etb','$kategori','$muatan','$impor',NULL,NULL,NULL,NULL,NULL,NULL, '$approve', '$id_agen', NULL)");
																if($insert){
																	echo '<script language="javascript">alert("Laporan berhasil dibuat!"); document.location="lapor.php"</script>';
																}
																else{
																	echo '<script language="javascript">alert("Laporan gagal dibuat!");</script>';
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