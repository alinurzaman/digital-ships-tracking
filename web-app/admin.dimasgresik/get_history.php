<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$dari = $_POST['dari'];
	$sampai = $_POST['sampai'];
	$json_response = array();
	
	require_once 'connect.php';
	
	$sql = "SELECT id_laporan, tanggal_laporan, sarana_laporan, bendera_laporan, B.nama_lokasi, tanggaleta_laporan, eta_laporan, tanggaletb_laporan, etb_laporan, kategori_laporan, muatan_laporan, impor_laporan, approve_laporan, C.nama_agen, rute_laporan, nobc10_laporan, nobc11_laporan, filerute_laporan, bc10_laporan, bc11_laporan FROM laporan AS A INNER JOIN lokasi AS B ON A.id_lokasi = B.id_lokasi INNER JOIN agen AS C ON A.id_agen = C.id_agen WHERE tanggal_laporan BETWEEN '" . $dari . "' AND '" . $sampai . "' ORDER BY tanggal_laporan DESC";
	
	$hasil = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($hasil) > 0){
		while ($row = mysqli_fetch_array($hasil)){
			$json_response[] = $row;
		}
	}
	echo json_encode(array('laporan' => $json_response));
}
?>