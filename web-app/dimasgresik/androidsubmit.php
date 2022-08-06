<?php

if($_SERVER['REQUEST_METHOD']=='POST'){
	$namasarkut = $_POST['namasarkut'];
	$bendera = $_POST['bendera'];
	$idlokasi = $_POST['lokasi'];
	$tanggaleta = $_POST['tanggaleta'];
	$pukuleta = $_POST['pukuleta'];
	$tanggaletb = $_POST['tanggaletb'];
	$pukuletb = $_POST['pukuletb'];
	$kategori = $_POST['kategori'];
	$muatan = $_POST['muatan'];
	$impor = $_POST['impor'];
	$id_agen = $_POST['idagen'];
	$approve = "0";
	$tanggallaporan = date("Y-m-d");
	
	$var = $tanggaleta;
	$date = str_replace('/', '-', $var);
	$tanggaleta = date('Y-m-d', strtotime($date));
	$var = $tanggaletb;
	$date = str_replace('/', '-', $var);
	$tanggaletb = date('Y-m-d', strtotime($date));
	
	require_once 'connect.php';
	
	//$getidlokasi = mysqli_query($conn, "SELECT id_lokasi FROM lokasi WHERE nama_lokasi = '$lokasi'");
	//$datalokasi = mysql_fetch_assoc($getidlokasi);
//	$idlokasi = "1";
	
	$sql = "INSERT INTO laporan VALUES(NULL, '$tanggallaporan', '$namasarkut', '$bendera', '$idlokasi','$tanggaleta','$tanggaletb','$pukuleta','$pukuletb','$kategori','$muatan','$impor',NULL,NULL,NULL,NULL,NULL,NULL, '$approve', '$id_agen', NULL)";
	
	if(mysqli_query($conn, $sql)){
		$result['success'] = "1";
		$result['message'] = "success";
		echo json_encode($result);
			
			mysqli_close($conn);
	} else{
			$result['success'] = "0";
			$result['message'] = "error";
			echo json_encode($result); 
			
			mysqli_close($conn);
			
		}
}

?>