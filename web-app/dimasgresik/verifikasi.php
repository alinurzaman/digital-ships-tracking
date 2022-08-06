<?php
include("db-connect.php");

if(!$_POST) exit;

koneksi_db();

$user = mysql_real_escape_string($_POST['user']);
$pass = mysql_real_escape_string($_POST['pass']);

$res=mysql_query("SELECT * FROM agen WHERE id_agen='$user' and pass_agen=PASSWORD('$pass')");

		if(mysql_num_rows($res)==1){

					$data=mysql_fetch_array($res);
					session_start();
					$_SESSION['user']=$data['id_agen'];
					$_SESSION['nama']=$data['nama_agen'];
					$_SESSION['sudahlogin']=true;
					header("Location: lapor.php");
		}
		else{
			header("Location: login.html");
		} 

?>