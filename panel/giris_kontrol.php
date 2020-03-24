<?php require_once("includes/config.php");

$kullanici=$_POST['kullanici'];
$parola=md5($_POST['parola']);

$sorgu=mysql_query("SELECT * FROM kullanicilar WHERE kullanici='$kullanici' AND parola='$parola' ");

$sonuc=mysql_num_rows($sorgu);
$bilgi= mysql_fetch_array($sorgu);

if ($sonuc==1)   //admin
{
	$_SESSION['kullanici']=$kullanici;
	session_start();
	header("Location: index");
}
else   //Kullanici girisi hatali 
 
header("Location: login?Hata");
?>