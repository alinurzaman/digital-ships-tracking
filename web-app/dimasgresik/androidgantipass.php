<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	$pass1 = $_POST['password1'];
	$pass2 = $_POST['password2'];
	$id_agen = $_POST['idagen'];
	
	require_once 'connect.php';
	
	if($pass1 ==$pass2){
		$sql = "UPDATE agen SET pass_agen = PASSWORD('$pass1') WHERE id_agen = '$id_agen'";
		if(mysqli_query($conn, $sql)){
			$result['success'] = "1";
			$result['message'] = "success";
			echo json_encode($result);
			
			mysqli_close($conn);
		} else {
			$result['success'] = "0";
			$result['message'] = "error";
			echo json_encode($result); 

			mysqli_close($conn);
			
		}
		
	} else {
		$result['success'] = "0";
		$result['message'] = "error";
		echo json_encode($result); 
			
		mysqli_close($conn);
	}
	
}
?>