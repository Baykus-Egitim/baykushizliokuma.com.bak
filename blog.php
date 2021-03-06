<?php include ('panel/includes/config.php'); ?>
<?php include ('panel/includes/functions.php'); ?>
<!DOCTYPE html>
<html lang="tr-TR">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<link rel="icon" href="img/favicon.png" type="image/x-icon" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Hızlı Okuma Teknikleri - Online Hızlı Okuma Kursu | İade Politikamız</title>
    <meta name="description" content="BHO, anlayarak hızlı okumanızı sağlamak için; hızlı okuma egzersizleri, hızlı okuma kursu ve okuma anlama metinlerinden oluşan tablet uyumlu online hızlı okuma programıdır.">
    <meta name="keywords" content="hızlı okuma,anlayarak hızlı okuma, hızlı okuma kursu, hızlı okuma egzersizleri, okuma ve anlama metinleri, hızlı okuma programı, okuma hızını artırma, online hızlı okuma, online hızlı okuma kursu, tablet hızlı okuma">
	     
     
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <!-- Icon -->
    <link rel="stylesheet" href="cdn.lineicons.com/1.0.1/LineIcons.min.css">

    <!-- Animate -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Main Style -->
    <link rel="stylesheet" href="css/main.css">
    <!-- Responsive Style -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Swiper Slider -->
    <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/css/swiper.min.css">
    <!-- Popup Styles -->
    <link rel="stylesheet" href="css/popup.css">

    <style>
      body{
        background: #fff;
      }

      

      .section-padding{
        padding: 80px 0px 60px 0px;
      }
    </style>
  </head>
  <body>

    <!-- Header Area wrapper Starts -->
    <header id="header-wrap">
				 
		 
		

<!-- Global site tag (gtag.js) - Google Analytics -->





      
      <!-- Navbar Start -->
      <div class="fixed-top">
      <!-- Navbar Start -->
	  <div class="top-header-area bg-dark text-white alt-font">
        <div class="container">
            <div class="row">
                
                <div class="col-12">
                    <ul class="header-social text-right">
					
					
                        <li class="mobile-menu-li"><img src="img/whatsapp-icon.png" style="height:25px; width:25px;"> 0 505 832 19 13 </li>
                        <li class="mobile-menu-li" style="margin-left: 15px; margin-right: 15px;"><img src="img/phone-icon.png" style="height:20px; width:20px;"> 0 505 832 19 13 </li>
						
                        <li><div class="social-div"><img src="img/facebook-icon.png" style="width: 24px; height: 24px; margin-right: 5px;"><img src="img/instagram-icon.png" style="width: 24px; height: 24px; margin-right: 5px;"><img src="img/youtube-icon.png" style="width: 27px; height: 17px; margin-right: 5px;"></div></li>
                        
						
                    </ul>
					
                </div>
            </div>
        </div>

    </div>
      <nav class="navbar navbar-expand-md bg-inverse scrolling-navbar">

                <div class="container">

                    <a href="index.html" class="navbar-brand"><img style="width: 150px; height: 80px;" src="img/logo-baykus.png" alt="BHO Logo"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="lni-menu"></i>
          </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto w-100 justify-content-end clearfix">
                            <li class="nav-item active" data-wow-delay="0.3s">
                                <a class="nav-link" href="index.html#bhonedir">BHO Nedir?</a>
                            </li>
                            <li class="nav-item" data-wow-delay="0.4s">
                                <a class="nav-link" href="index.html#ozellikler">Özellikler</a>
                            </li>
                            <li class="nav-item" data-wow-delay="0.5s">
                                <a class="nav-link" href="index.html#hiziniolc">Okuma Hızınızı Ölçün</a>
                            </li>
                            <li class="nav-item" data-wow-delay="0.5s">
                                <a class="nav-link" href="index.html#iletisim">İletişim</a>
                            </li>
                            <li class="nav-item" data-wow-delay="0.6s">
                                <a class="nav-link" href="index.html#sss">S.S.S.</a>
                            </li>
                            <li class="nav-item" data-wow-delay="0.7s">
                                <a class="nav-link" href="index.html#pricing">Satın Al</a>
                            </li>

                            <li class="nav-item" data-wow-delay="0.9s">
                                <a href="#" class="btn btn-login btn-login-text" data-wow-delay="0.3s" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">Giriş Yap</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
	  </div>
    </header>
    <!-- Header Area wrapper End -->

    <section id="" class="section-padding">
      <div class="container">
        <div class="row" style="padding-top: 120px;">
		<div class="col-md-12" style="padding-bottom: 50px;">
		<center><h2 class="section-title wow fadeInDown animated" data-wow-delay="0.3s" style="visibility: visible;-webkit-animation-delay: 0.3s; -moz-animation-delay: 0.3s; animation-delay: 0.3s;">Blog</h2></center>
        </div>
		<?php $query=mysql_query("SELECT * FROM blog"); while ($data = mysql_fetch_array($query)) { ?>
            <div class="col-md-3" style="padding-top: 30px;">
			<div class="item-4">
			
    <a href="<?=seolink($data["baslik"]).'/'.$data["id"]?>" class="blog-card">


      <div class="thumb" style="background-image: url(blog/<?=$data['resim']?>);"></div>
      <article>
        <h1><?=$data['baslik']?></h1>
        <p style="padding-top: 20px;"><?=$data['ozeticerik']?></p>
      </article>
    </a>
	
  </div>
</div>		
<?php } ?>	
        </div>
      </div>
    </section>

 	



<!-- Footer Section Start -->
<footer id="footer" class="" >
<div class="row">
<div class="col-md-6 contact-col-1">
        <div class="iletisimform">
					            <div class="mbottom">
              <h2 style="color: #000; padding-bottom: 50px;" class="section-title">Bizimle İletişime Geçiniz <br>Hemen Arayın :)</h2>
            </div>
										<form role="form" action="/tr/iletisim/" method="post"><div class="form-group">
	<div class="row">
    <div class="col-md-6">
	<input type="text" class="form-control input-lg" placeholder="İsminiz" required="" name="isim" id="isim" value="">
	</div>
    <div class="col-md-6">
	<input type="text" class="form-control input-lg" placeholder="Telefon Numaranız" required="" name="soyisim" id="soyisim" value="">
	</div>
	</div>
	</div><div class="form-group">
	<div class="row">
    <div class="col-md-12">
	<input type="email" name="email" placeholder="E-Posta Adresiniz" required="" class="form-control input-lg" id="email" value="">
	</div>
    
	</div>
	</div><div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <textarea name="mesaj" class="form-control" rows="8" cols="80" placeholder="Mesajınız"></textarea>
                  </div>
                  </div>
                </div><button style="background-color: #8f3e9f;" type="submit" class="btn btn-gonder2 btn-lg" name="gonder">GÖNDER</button></form>		          </div>
      </div>
	  
	  <div class="col-md-6 iletisimbilgi" style="background-color:#8f3e9f; padding: 100px;">
        <h2 style="color: #fff;">   İletişim Bilgilerimiz   </h2>
        <div class="col-md-3">
		<p style="color:#fff; margin-left: -14px; padding-top: 30px;"><b>Adres</b></p>
		</div>
		<div class="col-md-5">
		<p style="color:#f3f6f6; margin-left: -14px;">Dumankaya Vadi Sitesi,
Bahçeşehir / İstanbul</p>
		</div>
		<div class="col-md-6">
		<p style="color:#fff; padding-top: 30px; margin-left: -14px;"><b>Telefon ve WhatsApp</b></p>
		</div>
		<div class="col-md-4">
		<p style="color: #f3f6f6; margin-left: -14px;">0 (850) 346 90 28
0505 832 19 13</p>
		</div> 
		<div class="col-md-6">
		<p style="color:#fff; padding-top: 30px; margin-left: -14px;"><b>Mail Adresimiz</b></p>
		</div>
		<div class="col-md-3">
		<p style="color: #f3f6f6; margin-left: -14px;">bilgi@baykushizliokuma.com
satis@baykushizliokuma.com</p>
		</div> 
	  </div>
	  </div>
	  </div>
	  <div class="row alt-footer-bc">
	  <div class="container">
	  <div class="row">
	  <div class="col-md-6">
	  <p class="copyright-text" style="color: #fff;">© 2020 Tüm Hakları Saklıdır. <a style="color: #8f3e9f;" target="_blank" href="www.dursunkarabatak.com">dursunkarabatak.com</a></p>
	  </div>
	  <div class="col-md-6">
	  <ul style="text-align: left;">
	  <li class="alt-footer-link"><a style="color: #fff;" href="kullanici-sozlesmesi.html">Kullanıcı Sözleşmesi</a></li>
	  <li class="alt-footer-link"><a style="color: #fff;" href="gizlilik-sozlesmesi.html">Gizlilik Sözleşmesi</a></li>
	  <li class="alt-footer-link"><a style="color: #fff;" href="iade-politikamiz.html">İade Politikamız</a></li>
	  <li class="alt-footer-link"><a style="color: #fff;" href="#">Blog</a></li>
	  <li class="alt-footer-link"><a style="color: #fff;" href="#">Anasayfa</a></li>
	  </ul>
	  </div>
	  </div>
	  </div>
	  </div>
	  </div>
</footer>
<!-- Footer Section End -->

    <!-- Go to Top Link -->
    <a href="#" class="back-to-top">
    	<i class="lni-arrow-up"></i>
    </a>
    
	     
    
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-min.js"></script>
    <script src="js/preloader.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/jquery.nav.js"></script>
    <script src="js/scrolling-nav.js"></script>
    <script src="js/typeit.js"></script>
    <script src="js/bowser.js"></script>
    <script src="js/jquery.maskedinput.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/popUpManager.js"></script>

    <script src="cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.0/js/swiper.min.js"></script>

  </body>

<!-- Mirrored from hizligo.com/kullanim-hizmet-ve-sartlari by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Feb 2020 15:19:44 GMT -->
</html>
