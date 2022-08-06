<?php
ob_start();
	session_start();
	if($_SESSION['sudahloginadmin']==true){
		include("db-connect.php");
		koneksi_db();
		$id_laporan = $_GET['idl'];
		$approval = mysql_query("UPDATE laporan SET approve_laporan='1' WHERE id_laporan='$id_laporan'");
		if($approval){
			header("Location: notifikasi.php");
		}
	}
	else header("Location: index.php");
ob_end_flush();
?>