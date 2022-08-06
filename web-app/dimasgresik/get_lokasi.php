<?php 
require_once 'connect.php';

$query = mysqli_query($conn, "SELECT * FROM lokasi");
	
$json = array();	
	
while($row = mysqli_fetch_assoc($query)){
	$json[] = $row;
}
	
echo json_encode($json);
	
mysqli_close($conn);

?>