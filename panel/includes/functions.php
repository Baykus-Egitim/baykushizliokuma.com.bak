<?php
	
	include("config.php");
	
	$aylar_TR = array("Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık");
	$aylar_EN = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	
	function rnd()
	{
		$rand = rand(0,999999)."-";
		return $rand;
	}
	
	function seolink($text)
	{
		$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
		$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
		$text = strtolower(str_replace($find, $replace, $text));
		$text = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $text);
		$text = trim(preg_replace('/\s+/', ' ', $text));
		$text = str_replace(' ', '-', $text);
		return $text;
	}
	
	function notdot($text)
	{
		$text = str_replace('.', '', $text);
		return $text;
	}
	
	function htmlcon($text)
	{
		$char = array('"',"'");
		$html = array('&#34;','&#39;');
		$text = str_replace($char, $html, $text);
		return $text;
	}
	
	function ext($file)
	{
		$ext = pathinfo($file);
		return $ext['extension'];
	}
	
	/*---------------------------------------------------------------------------------------------------------------------------*/
	
	if(isset($_GET["lang"]))
	{
		$lang	= $_GET["lang"];
		$page	= $_GET["page"];
		mysql_query("UPDATE dil SET aktif = 0");
		mysql_query("UPDATE dil SET aktif = 1 WHERE kod = '$lang'");
		header("Location: ../".$page."?i=11");
	}
	
	if(isset($_GET["slider-ekle"]))
	{
		if (!isset($hata))
		{
			$baslik 	= htmlcon($_POST['baslik']);
			$sira 	  = htmlcon($_POST['sira']);
			$resim    = rnd().seolink($_FILES['resim']['name']);
			$mobil    = rnd().seolink($_FILES['mobil']['name']);
			$arkaplan = rnd().seolink($_FILES['arkaplan']['name']);
			$arkaplan2 = rnd().seolink($_FILES['arkaplan2']['name']);
			$logo 	  = htmlcon($_POST['logo']);
			$menu 	  = htmlcon($_POST['menu']);
			$lang     = $_POST['lang'];
			
			upload($resim);
			mobil($mobil);
			arkaplan($arkaplan);
			arkaplan2($arkaplan2);
			
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES UTF8");
			
			mysql_query("INSERT INTO slider_".$lang." (baslik,resim,mobil,arkaplan,arkaplan2,sira,logo,menu) VALUES ('$baslik' , '$resim' , '$mobil' , '$arkaplan' , '$arkaplan2' , '$sira' , '$logo' , '$menu')");
			header("Location: ../slider?i=7");
		}
	}
	
	if(isset($_GET["cafeverestoransil"]))
	{
		$id = $_GET['cafeverestoransil'];
		$lang = $_GET['lang'];
		mysql_query("DELETE FROM cafe_ve_restoran_".$lang." WHERE id = $id");
		header("Location: ../cafe-ve-restoran?i=6");
	}
	
	if(isset($_GET["cafeverestoranguncelle"]))
	{
		if (!isset($hata))
		{
			ini_set('display_errors', 1);
			ini_set('display_startup_errors', 1);
			error_reporting(E_ALL);
			$id 		    = $_POST["cafeverestoranid"];
			$baslik       = htmlcon($_POST['baslik']);
			$icerik       = htmlcon($_POST['icerik']);
			$kategori       = htmlcon($_POST['kategori']);
			$link       = htmlcon($_POST['link']);
			$ozeticerik   = htmlcon($_POST['ozeticerik']);
			$lang         = $_POST['lang'];
			
			if(isset($_FILES["resim"]["tmp_name"]) && $_FILES["resim"]["tmp_name"] != '')
			{
				upload($_FILES['resim']['name'],"hizmetler-icerik/".$lang);
				$resim = seolink($_FILES['resim']['name']);
				mysql_query("UPDATE cafe_ve_restoran_".$lang." SET resim = '$resim' WHERE id = $id");
			}
			
			if(isset($_FILES["kapak"]["tmp_name"]) && $_FILES["kapak"]["tmp_name"] != '')
			{
				uploadkapak($_FILES['kapak']['name'],"hizmetler-icerik/".$lang);
				$kapak = seolink($_FILES['kapak']['name']);
				mysql_query("UPDATE cafe_ve_restoran_".$lang." SET kapak = '$kapak' WHERE id = $id");
			}
			
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES UTF8");
			
			mysql_query("UPDATE cafe_ve_restoran_".$lang." SET baslik = '$baslik' , icerik = '$icerik',kategori = '$kategori',kategori = '$kategori',link = '$link' WHERE id = $id");
			header("Location: ../cafe-ve-restoran?i=4");
		}
	}
	
	if(isset($_GET["cafeverestoranekle"]))
	{
		if (!isset($hata))
		{
			$baslik 	    = htmlcon($_POST['baslik']);
			$icerik 	    = htmlcon($_POST['icerik']);
			$link 	    = htmlcon($_POST['link']);
			$kategori 	    = htmlcon($_POST['kategori']);
			
			if(isset($_FILES["resim"]["tmp_name"]) && $_FILES["resim"]["tmp_name"] != '')
			{
				upload($_FILES['resim']['name'],"hizmetler-icerik/".$lang);
				$resim = seolink($_FILES['resim']['name']);
				}else{
				$resim="";
			}
			if(isset($_FILES["kapak"]["tmp_name"]) && $_FILES["kapak"]["tmp_name"] != '')
			{
				uploadkapak($_FILES['kapak']['name'],"hizmetler-icerik/".$lang);
				$kapak = seolink($_FILES['kapak']['name']);
				}else{
				$kapak="";
			}
			//kapak($_FILES['kapak']['name'],"images/");
			
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES UTF8");
			
			mysql_query("INSERT INTO cafe_ve_restoran_".$lang." (baslik,icerik,resim,kategori,link,kapak) VALUES ('$baslik' , '$icerik' , '$resim' , '$kategori', '$link', '$kapak')");
			echo mysql_error();
			header("Location: ../cafe-ve-restoran?i=7");
		}
	}
	
	if(isset($_GET["slider-guncelle"]))
	{
		if (!isset($hata))
		{
			$id 		  = $_POST["sliderid"];
			$baslik   = htmlcon($_POST['baslik']);
			$sira 	  = htmlcon($_POST['sira']);
			$resim    = rnd().seolink($_FILES['resim']['name']);
			$mobil    = rnd().seolink($_FILES['mobil']['name']);
			$arkaplan = rnd().seolink($_FILES['arkaplan']['name']);
			$arkaplan2 = rnd().seolink($_FILES['arkaplan2']['name']);
			$logo 	  = htmlcon($_POST['logo']);
			$menu 	  = htmlcon($_POST['menu']);
			$lang     = $_POST['lang'];
			
			if(isset($_FILES["resim"]["tmp_name"]) && $_FILES["resim"]["tmp_name"] != '')
			{
				upload($resim);
				mysql_query("UPDATE slider_".$lang." SET resim = '$resim' WHERE id = $id");
			}
			
			if(isset($_FILES["mobil"]["tmp_name"]) && $_FILES["mobil"]["tmp_name"] != '')
			{
				mobil($mobil);
				mysql_query("UPDATE slider_".$lang." SET mobil = '$mobil' WHERE id = $id");
			}
			
			if(isset($_FILES["arkaplan"]["tmp_name"]) && $_FILES["arkaplan"]["tmp_name"] != '')
			{
				arkaplan($arkaplan);
				mysql_query("UPDATE slider_".$lang." SET arkaplan = '$arkaplan' WHERE id = $id");
			}
			
			if(isset($_FILES["arkaplan2"]["tmp_name"]) && $_FILES["arkaplan2"]["tmp_name"] != '')
			{
				arkaplan2($arkaplan2);
				mysql_query("UPDATE slider_".$lang." SET arkaplan2 = '$arkaplan2' WHERE id = $id");
			}
			
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES UTF8");
			
			mysql_query("UPDATE slider_".$lang." SET baslik = '$baslik' , sira = '$sira' , logo = '$logo' , menu = '$menu' WHERE id = $id");
			header("Location: ../slider?i=4");
		}
	}
	
	if(isset($_GET["slidersil"]))
	{
		$id = $_GET['slidersil'];
		$lang = $_GET['lang'];
		mysql_query("DELETE FROM slider_".$lang." WHERE id = $id");
		header("Location: ../slider?i=6");
	}
	
	if(isset($_GET["kurumsal-guncelle"]))
	{
		if (!isset($hata))
		{
			$baslik                = htmlcon($_POST['baslik']);
			$icerik                = htmlcon($_POST['icerik']);
			$lang                  = $_POST['lang'];
			
			if($_FILES['resim']['name'] != ''){
				$resim                 = rnd().seolink($_FILES['resim']['name']);
				upload($resim);
				mysql_query("UPDATE kurumsal_".$lang." SET resim = '$resim'");
			}
			
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES UTF8");
			
			mysql_query("UPDATE kurumsal_".$lang." SET baslik = '$baslik',icerik = '$icerik'");
			header("Location: ../kurumsal?i=4");
		}
	}
	
	if(isset($_GET["anasayfa-guncelle"]))
	{
		if (!isset($hata))
		{
			$baslik                = htmlcon($_POST['baslik']);
			$altbaslik                = htmlcon($_POST['altbaslik']);
			$icerik                = htmlcon($_POST['icerik']);
			$lang                  = $_POST['lang'];
			
			if($_FILES['resim']['name'] != ''){
				$resim                 = rnd().seolink($_FILES['resim']['name']);
				upload($resim);
				mysql_query("UPDATE anasayfa_".$lang." SET resim = '$resim'");
			}
			
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES UTF8");
			
			mysql_query("UPDATE anasayfa_".$lang." SET baslik = '$baslik', altbaslik = '$altbaslik', icerik = '$icerik'");
			header("Location: ../index?i=4");
		}
	}
	
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
	
	if(isset($_GET["blog-ekle"]))
	{
		
		if (!isset($hata))
		{
			setlocale(LC_TIME, 'tr_TR');
			$baslik 	  = htmlcon($_POST['baslik']);
			$seolink 	  = notdot(seolink($_POST['baslik']));
			$altbaslik 	= htmlcon($_POST['altbaslik']);
			$ozeticerik = htmlcon($_POST['ozeticerik']);
			$icerik 	  = $_POST['icerik'];
			$resim      = rnd().seolink($_FILES['resim']['name']);
			$tarih      = date("d.m.Y");
			$lang       = $_POST['lang'];
			
			upload($resim);
			
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES UTF8");
			
			mysql_query("INSERT INTO blog (baslik,seolink,altbaslik,icerik,ozeticerik,tarih,resim) VALUES ('$baslik' , '$seolink' , '$altbaslik' , '$icerik' , '$ozeticerik', '$tarih' , '$resim')");
			header("Location: ../blog?i=7");
			
		}
		
		else header("Location: ../blog?i=5");
	}
	
	if(isset($_GET["blog-guncelle"]))
	{
		
		if (!isset($hata))
		{
			$id 		    = $_POST["blogid"];
			$baslik 	  = htmlcon($_POST['baslik']);
			$seolink 	  = notdot(seolink($_POST['baslik']));
			$altbaslik 	= htmlcon($_POST['altbaslik']);
			$ozeticerik = htmlcon($_POST['ozeticerik']);
			$icerik 	  = htmlcon($_POST['icerik'.$id.'']);
			$resim      = rnd().seolink($_FILES['resim']['name']);
			$lang       = $_POST['lang'];
			
			if(isset($_FILES["resim"]["tmp_name"]) && $_FILES["resim"]["tmp_name"] != '')
			{
				upload($resim);
				mysql_query("UPDATE blog SET resim = '$resim' WHERE id = $id");
			}
			
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES UTF8");
			
			mysql_query("UPDATE blog SET baslik = '$baslik' , seolink = '$seolink' , altbaslik = '$altbaslik' , icerik = '$icerik' WHERE id = $id");
			header("Location: ../blog?i=4");
		}
		else header("Location: ../blog?i=5");
	}
	
	if(isset($_GET["blogsil"]))
	{
		$id = $_GET['blogsil'];
		$lang = $_GET['lang'];
		mysql_query("DELETE FROM blog WHERE id = $id");
		header("Location: ../blog?i=6");
	}
	
	if(isset($_GET["degisken-ekle"]))
	{
		
		if (!isset($hata))
		{
			$degisken	= seolink($_POST['degisken']);
			$tr       = $_POST['tr'];
			$us       = $_POST['us'];
			
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES UTF8");
			
			mysql_query("INSERT INTO dil_degiskenleri (degisken,tr,us) VALUES ('$degisken' , '$tr' , '$us')");
			header("Location: ../dil-ayarlari?i=7");
		}
		else header("Location: ../dil-ayarlari?i=5");
	}
	
	if(isset($_GET["degisken-guncelle"]))
	{
		
		if (!isset($hata))
		{
			$id 		  = $_POST["degiskenid"];
			$tr       = $_POST['tr'];
			$us       = $_POST['us'];
			
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES UTF8");
			
			mysql_query("UPDATE dil_degiskenleri SET tr = '$tr' , us = '$us' WHERE id = $id");
			header("Location: ../dil-ayarlari?i=4");
		}
		else header("Location: ../dil-ayarlari?i=5");
	}
	
	if(isset($_GET["degiskensil"]))
	{
		$id = $_GET['degiskensil'];
		$lang = $_GET['lang'];
		mysql_query("DELETE FROM dil_degiskenleri WHERE id = $id");
		header("Location: ../dil-ayarlari?i=6");
	}
	
	/*-------------------------------------------------------------------------------------------------------------------------------*/
	
	if(isset($_GET["iletisim-ekle"]))
	{
		if (!isset($hata))
		{
			$adres       = htmlcon($_POST['adres']);
			$telefon1    = htmlcon($_POST['telefon1']);
			$telefon2    = htmlcon($_POST['telefon2']);
			$mail1       = htmlcon($_POST['mail1']);
			$mail2       = htmlcon($_POST['mail2']);
			$fax         = htmlcon($_POST['fax']);
			$lang        = $_POST['lang'];
			
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES UTF8");
			
			mysql_query("INSERT INTO iletisim_us (adres,telefon1,telefon2,mail1,mail2,fax) VALUES ('$adres','$telefon1','$telefon2','$mail1','$mail2','$fax')");
			
			header("Location: ../iletisim?i=7");
		}
	}
	
	if(isset($_GET["iletisim-guncelle"]))
	{
		if (!isset($hata))
		{
			$id 		     = $_POST["iletisimid"];
			$adres       = htmlcon($_POST['adres']);
			$telefon1    = htmlcon($_POST['telefon1']);
			$telefon2    = htmlcon($_POST['telefon2']);
			$mail1       = htmlcon($_POST['mail1']);
			$mail2       = htmlcon($_POST['mail2']);
			$fax         = htmlcon($_POST['fax']);
			$lang        = $_POST['lang'];
			
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES UTF8");
			
			mysql_query("UPDATE iletisim_".$lang." SET adres = '$adres' , telefon1 = '$telefon1' , telefon2 = '$telefon2' , mail1 = '$mail1' , mail2 = '$mail2' , fax = '$fax' WHERE id = $id");
			header("Location: ../iletisim?i=4");
		}
	}
	
	if(isset($_GET["iletisimsil"]))
	{
		$id = $_GET['iletisimsil'];
		$lang = $_GET['lang'];
		mysql_query("DELETE FROM iletisim_".$lang." WHERE id = $id");
		header("Location: ../iletisim?i=6");
	}
	
	if(isset($_GET["sosyalmedya-guncelle"]))
	{
		for($i = 1; $i <= 6; $i++)
		{
			if (!isset($hata))
			{
				$link = $_POST['link'.$i];
				$baslik = $_POST['baslik'.$i];
				$icon = $_POST['icon'.$i];
				
				$tr  = array('"',"'");
				$eng = array("","");
				$baslik = str_replace($tr,$eng,$baslik);
				
				mysql_query("SET CHARACTER SET utf8");
				mysql_query("SET NAMES UTF8");
				
				mysql_query("update sosyalmedya set link = '$link' , baslik = '$baslik' , icon = '$icon' WHERE id = $i");
				header("Location: ../sosyalmedya?i=4");
			}
			
			else { header("Location: ../sosyalmedya?i=5"); }
		}
	}
	
	if(isset($_GET["seo-guncelle"]))
	{
		
		if (!isset($hata))
		{
			$lang       = $_POST['lang'];
			$url        = $_POST['url'];
			$title      = $_POST['title'];
			$keywords   = $_POST['keywords'];
			$description= $_POST['description'];
			$imza       = $_POST['imza'];
			$noindex    = $_POST['noindex'];
			$logo       = seolink($_FILES['logo']['name']);
			$favicon    = seolink($_FILES['favicon']['name']);
			$og         = seolink($_FILES['og']['name']);
			
			if(isset($_FILES["logo"]["tmp_name"]) && $_FILES["logo"]["tmp_name"] != '') { logo($logo); mysql_query("UPDATE seo_".$lang." SET logo = '$logo'"); }
			if(isset($_FILES["favicon"]["tmp_name"]) && $_FILES["favicon"]["tmp_name"] != '') { favicon($favicon); mysql_query("UPDATE seo_".$lang." SET favicon = '$favicon'"); }
			if(isset($_FILES["og"]["tmp_name"]) && $_FILES["og"]["tmp_name"] != '') { og($og); mysql_query("UPDATE seo_".$lang." SET og = '$og'"); }
			
			$tr  = array('"',"'");
			$eng = array("","");
			$title = str_replace($tr,$eng,$title);
			$keywords = str_replace($tr,$eng,$keywords);
			$description = str_replace($tr,$eng,$description);
			$imza = str_replace($tr,$eng,$imza);
			
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES UTF8");
			
			mysql_query("update seo_".$lang." set url = '$url' , title = '$title' , keywords = '$keywords' , description = '$description' , noindex = '$noindex' , imza = '$imza'");
			header("Location: ../ayarlar?i=4");
		}
		
		else { header("Location: ../ayarlar?i=5"); }
	}
	
	if(isset($_GET["profil-guncelle"]))
	{
		if (!isset($_POST["isim"]) || empty($_POST["isim"]) )
		{
			$hata="Tum alanları doldurmanız gerekiyor.";
		}
		
		if (!isset($_POST["kullanici"]) || empty($_POST["kullanici"]) )
		{
			$hata="Tum alanları doldurmanız gerekiyor.";
		}
		
		if (!isset($_POST["parola"]) || empty($_POST["parola"]) )
		{
			$hata="Tum alanları doldurmanız gerekiyor.";
		}
		
		if (!isset($hata))
		{
			$id        = $_POST['id'];
			$isim      = $_POST['isim'];
			$kullanici = $_POST['kullanici'];
			$parola    = md5($_POST['parola']);
			
			$tr  = array('"',"'");
			$eng = array("","");
			$isim = str_replace($tr,$eng,$isim);
			$kullanici = str_replace($tr,$eng,$kullanici);
			$parola = str_replace($tr,$eng,$parola);
			
			mysql_query("SET CHARACTER SET utf8");
			mysql_query("SET NAMES UTF8");
			
			mysql_query("update kullanicilar set isim = '$isim' , kullanici = '$kullanici' , parola = '$parola' WHERE id = $id");
			header("Location: ../login");
		}
		
		else { header("Location: ../profil?i=5"); }
	}
	
	
	
	if(isset($_GET["cvsil"]))
	{
		$id = $_GET['cvsil'];
		mysql_query("DELETE FROM kariyer WHERE id = $id");
		header("Location: ../mesajlar?i=6");
	}
	
	/*---------------------------------------------------------------------------------------------------------------------------*/
	
	function upload($image)
	{
		$name  = seolink($image);
		$exte  = ext($_FILES['resim']['name']);
		$kayit = "../../blog/";
		move_uploaded_file($_FILES['resim']['tmp_name'],"./$kayit/$name");
	}
	function uploadkapak($image)
	{
		$name  = seolink($image);
		$exte  = ext($_FILES['kapak']['name']);
		$kayit = "../../images/";
		move_uploaded_file($_FILES['kapak']['tmp_name'],"./$kayit/$name");
	}
	function upload2($image)
	{
		$name  = seolink($image);
		$exte  = ext($_FILES['kapak']['name']);
		$kayit = "images/";
		move_uploaded_file($_FILES['kapak']['tmp_name'],"./$kayit/$name");
	}
	
	function upload3($image)
	{
		$name  = seolink($image);
		$exte  = ext($_FILES['icon']['name']);
		$kayit = "images/";
		move_uploaded_file($_FILES['icon']['tmp_name'],"./$kayit/$name");
	}
	
	function mobil($image)
	{
		$name  = seolink($image);
		$exte  = ext($_FILES['mobil']['name']);
		$kayit = "images/";
		move_uploaded_file($_FILES['mobil']['tmp_name'],"./$kayit/$name");
	}
	
	function arkaplan($image)
	{
		$name  = seolink($image);
		$exte  = ext($_FILES['arkaplan']['name']);
		$kayit = "images/";
		move_uploaded_file($_FILES['arkaplan']['tmp_name'],"./$kayit/$name");
	}
	
	function arkaplan2($image)
	{
		$name  = seolink($image);
		$exte  = ext($_FILES['arkaplan2']['name']);
		$kayit = "images/";
		move_uploaded_file($_FILES['arkaplan2']['tmp_name'],"./$kayit/$name");
	}
	
	function galeri($image)
	{
		$name  = seolink($image);
		$exte  = ext($_FILES['galeri']['name']);
		$kayit = "images/";
		move_uploaded_file($_FILES['galeri']['tmp_name'],"./$kayit/$name");
	}
	
	function logo($image)
	{
		$name  = seolink($image);
		$exte  = ext($_FILES['logo']['name']);
		$kayit = "images/";
		move_uploaded_file($_FILES['logo']['tmp_name'],"./$kayit/$name");
	}
	
	function favicon($image)
	{
		$name  = seolink($image);
		$exte  = ext($_FILES['favicon']['name']);
		$kayit = "images/";
		move_uploaded_file($_FILES['favicon']['tmp_name'],"./$kayit/$name");
	}
	
	function og($image)
	{
		$name  = seolink($image);
		$exte  = ext($_FILES['og']['name']);
		$kayit = "images/";
		move_uploaded_file($_FILES['og']['tmp_name'],"./$kayit/$name");
	}
	
	function cv($image)
	{
		$name  = seolink($image);
		$exte  = ext($_FILES['cv']['name']);
		$kayit = "cvler/";
		move_uploaded_file($_FILES['cv']['tmp_name'],"./$kayit/$name");
	}
	
?>
