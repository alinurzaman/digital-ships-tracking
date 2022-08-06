<?php
include("db-connect.php");

if(!$_POST) exit;

koneksi_db();

$user = mysql_real_escape_string($_POST['user']);
$pass = mysql_real_escape_string($_POST['pass']);

$res=mysql_query("SELECT * FROM pegawai WHERE id_pegawai='$user' and pass_pegawai=PASSWORD('$pass')");

		if(mysql_num_rows($res)==1){

					$data=mysql_fetch_array($res);
					session_start();
					$_SESSION['user']=$data['id_pegawai'];
					$_SESSION['nama']=$data['nama_pegawai'];
					$_SESSION['role']=$data['role_pegawai'];
					$_SESSION['sudahloginadmin']=true;
			if($_SESSION['role']=='ADMIN'){
					header("Location: notifikasi.php");
				} else if ($_SESSION['role']=='PEGAWAI'){
				header("Location: daftarlaporan.php");
			}
		}
		else{
			header("Location: login.html");
		} 

?>