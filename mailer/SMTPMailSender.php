<?php
	error_reporting(0);
	require_once('class.phpmailer.php');
	$mail             = new PHPMailer(); 
	$mail->IsSMTP(); 
	
			$mail->SMTPAuth   = true;                					
			$mail->Host       = "smtp.gmail.com"; 					
			$mail->Port       = 587;                 					
			$mail->Username   = "mert.dogan3535@gmail.com";				
			$mail->Password   = "54271102";       						
			$mail->From       = "mert.dogan3535@gmail.com";
			$mail->FromName   = "RAN GROUP";
			$mail->Subject    = "KARİYER FORMU";
			$mail->MsgHTML("test");
			$mail->AddAddress('mert.dogan3535@gmail.com');
	
	if(!$mail->Send()) { ?>
	
	<script language="javascript">
    	alert("Hata Oluştu: <?=$mail->ErrorInfo; ?>");
		//window.open("http://<?=$_SERVER['SERVER_NAME'] ?>/index.php","_self");
	</script>
	
<? }else{ } ?>