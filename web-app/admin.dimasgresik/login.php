<?php

	if($_SERVER['REQUEST_METHOD']=='POST'){
		$idpegawai = $_POST['idpegawai'];
		$password = $_POST['password'];
		
		require_once 'connect.php';
		
		$sql = "SELECT * FROM pegawai WHERE id_pegawai = '$idpegawai' AND pass_pegawai = PASSWORD('$password')";
		
		$response = mysqli_query($conn, $sql);
		
		$result = array();
		$result['login'] = array();
		
		if(mysqli_num_rows($response)==1){
			$row = mysqli_fetch_assoc($response);
			$index['nama']=$row['nama_pegawai'];
			$index['idpegawai'] = $row['id_pegawai'];
			
			array_push($result['login'], $index);
			
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