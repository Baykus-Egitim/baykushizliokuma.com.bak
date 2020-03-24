<? 

class EMail extends PHPMailer
{
	  function _SendMail($Data) 
    { 
	
	$Sql 		= new SqlProgress();
	
		switch($Data[Template]):

			case 'bayilik':
                require("VarienExtensions/EMail/Template/bayilik.php");
                break;
			
			case 'iletisim':
                require("VarienExtensions/EMail/Template/iletisim.php");
                break;
			
			case 'IK':
                require("VarienExtensions/EMail/Template/IK.php");
                break;

            case 'rezervasyon':
                require("VarienExtensions/EMail/Template/rezervasyon.php");
                break;

            case 'teklif':
                require("VarienExtensions/EMail/Template/teklif.php");
                break;
		endswitch;
		if($Data[From]!=""){ $FROM=$Data[From]; } //else{ $FROM = 'bilgiedinme@begos.org.tr'; }
		$this->IsSMTP(); 
		$this->SMTPAuth   = true;                					
		$this->Host       = "mail.varien.com.tr"; 					
		$this->Port       = 587;                 					
		$this->Username   = "no-replay@varien.com.tr";				
		$this->Password   = "123321";       						
		$this->From       = $FROM;
		$this->FromName   = 'Zeyonas';
		$this->Subject    = $Data[KONU];
		$this->MsgHTML($Mesaj);
		
		$this->AddAddress($Data[ALICI], $Data[ALICI_ISIM]);
		
		if(!$this->Send()) 
		{
			return false;
			
		}else{
			
			return true;
			
		}
		
		
    } 
}



?>
