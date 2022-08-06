<?php
ob_start();
	include("db-connect.php");
	koneksi_db();
	$id_pegawai=$_GET['idp'];
	$id_agen=$_GET['ida'];
	$id_lokasi=$_GET['idl'];
	if(!empty($id_pegawai)){
		$hapus=mysql_query("DELETE FROM pegawai WHERE id_pegawai='$id_pegawai'");
		if($hapus) header("Location: menupegawai.php");
	}else if(!empty($id_agen)){
		$hapus=mysql_query("DELETE FROM agen WHERE id_agen='$id_agen'");
		if($hapus) header("Location: menuagen.php");
	}else if(!empty($id_lokasi)){
		$hapus=mysql_query("DELETE FROM lokasi WHERE id_lokasi='$id_lokasi'");
		if($hapus) header("Location: menulokasi.php");
	}
	
ob_end_flush();
?>