<?php
if(isset($_GET["iletisimformu"]))
	{
		if (!isset($hata))
		{
			$ad               = htmlcon($_POST['ad']);
			$telefonnumarasi                = htmlcon($_POST['telefonnumarasi']);
			$epostaadresi               = htmlcon($_POST['epostaadresi']);
			$mesaj                = htmlcon($_POST['mesaj']);

			
			$mailContent="<b>Ad: </b>".$ad."<br>";
			$mailContent.="<b>Telefon Numarası: </b>".$telefonnumarasi."<br>";
			$mailContent.="<b>E-Mail: </b>".$email."<br>";
			$mailContent.="<b>Mesaj: </b>".$mesaj."<br>";
			
			include('../../mailer/class.phpmailer.php');
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
			$mail->MsgHTML($mailContent);
			$mail->AddAddress('mert.dogan3535@gmail.com');
			
			if(!$mail->Send()) {
			}
			header("Location: /");
		}
	}
	
	?>