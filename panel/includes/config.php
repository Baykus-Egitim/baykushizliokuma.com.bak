<?php
	session_start(); ob_start(); error_reporting(0);
	
	$db_adres	= "localhost";
	$db_user	= "dursunka_mythdev";
	$db_adi		= "dursunka_bho";
	$db_pass	= "Comolokko35";
	$lang 		= "tr";
	$url	    = "http://dursunkarabatak.com/";
	
	$conn=mysql_connect($db_adres,$db_user,$db_pass);
	if(!$conn)
	{
		die("Bağlantı Hatası :".mysql_error());
	}
	$db_select=mysql_select_db($db_adi,$conn);
	if(!$db_select)
	{
		die("Veritabanı Hatası :".mysql_error());
	}
	
	date_default_timezone_set('Europe/Istanbul');
	
	mysql_query("SET NAMES utf8");
	mysql_query("SET CHARACTER SET utf8");
	
	
?>