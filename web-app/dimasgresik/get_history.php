<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$id_agen = $_POST['idagen'];
	$json_response = array();
	
	require_once 'connect.php';
	
	$sql = "SELECT id_laporan, tanggal_laporan, sarana_laporan, bendera_laporan, B.nama_lokasi, tanggaleta_laporan, tanggaletb_laporan, eta_laporan, etb_laporan, kategori_laporan, muatan_laporan, impor_laporan, approve_laporan FROM laporan AS A INNER JOIN lokasi AS B ON A.id_lokasi = B.id_lokasi WHERE id_agen = '$id_agen'";
	
	$hasil = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($hasil) > 0){
		while ($row = mysqli_fetch_array($hasil)){
			$json_response[] = $row;
		}
	}
	echo json_encode(array('laporan' => $json_response));
}
?>