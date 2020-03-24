<?php include("includes/includes/config.php"); ?>
<!-- Sidebar scroll-->
<div class="scroll-sidebar">
	<!-- User profile -->
	<div class="user-profile" style="background: url(assets/images/background/user-info.jpg) no-repeat; background-size: 100% 100%;">
		<!-- User profile image -->
		<div class="profile-img img-circle"> <img src="assets/images/users/1.png" alt="user"> </div>
		<!-- User profile text-->
		<div class="profile-text">
		    <a href="#" class="dropdown-toggle u-dropdown" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
    		    <?php $sorgu2=mysql_query("SELECT isim FROM kullanicilar where kullanici='$_SESSION[kullanici]' "); $bilgi2= mysql_fetch_array($sorgu2); echo $bilgi2['isim']; ?>
		    </a>
			<div class="dropdown-menu animated flipInY">
				<a href="profil" class="dropdown-item"><i class="ti-user"></i> Profil Bilgileri</a>
				<a href="mesajlar" class="dropdown-item"><i class="ti-email"></i> Gelen Kutusu</a>
					<div class="dropdown-divider"></div>
				<a href="ayarlar" class="dropdown-item"><i class="ti-settings"></i> Genel Ayarlar</a>
					<div class="dropdown-divider"></div>
				<a href="logout" class="dropdown-item"><i class="fa fa-power-off"></i> Çıkış Yap</a>
			</div>
		</div>
	</div>
	<nav class="sidebar-nav">
		<ul id="sidebarnav">
			<li class="nav-small-cap">İÇERİKLER</li>
			<li> <a class="waves-effect waves-dark" href="index" aria-expanded="false"><i class="mdi mdi-home-outline"></i><span class="hide-menu">Anasayfa</span></a></li>
			<li> <a class="waves-effect waves-dark" href="slider" aria-expanded="false"><i class="mdi mdi-crop-landscape"></i><span class="hide-menu">Slider</span></a></li>
			<li> <a class="waves-effect waves-dark" href="kurumsal" aria-expanded="false"><i class="mdi mdi-information-outline"></i><span class="hide-menu">Kurumsal</span></a></li>
			<li> <a class="has-arrow waves-effect waves-dark" href="cafe-ve-restoran" aria-expanded="false"><i class="mdi mdi-diamond"></i><span class="hide-menu">T & P Mağazacılık</span></a>
			<li> <a class="waves-effect waves-dark" href="blog" aria-expanded="false"><i class="mdi mdi-newspaper"></i><span class="hide-menu">Blog</span></a></li>
			
			<li> <a class="waves-effect waves-dark" href="iletisim" aria-expanded="false"><i class="mdi mdi-phone"></i><span class="hide-menu">İletişim</span></a></li>
		</ul>
		<ul id="sidebarnav">
			<li class="nav-small-cap">AYARLAR</li>
			<li> <a class="waves-effect waves-dark" href="sosyalmedya" aria-expanded="false"><i class="mdi mdi-link-variant"></i><span class="hide-menu">Sosyal Medya</span></a></li>
			<li> <a class="waves-effect waves-dark" href="dil-ayarlari" aria-expanded="false"><i class="mdi mdi-check"></i><span class="hide-menu">Dil Ayarları</span></a></li>
			<li> <a class="waves-effect waves-dark" href="ayarlar" aria-expanded="false"><i class="mdi mdi-settings"></i><span class="hide-menu">Genel Ayarlar</span></a></li>
		</ul>
	</nav>
</div>
<div class="sidebar-footer">
	<a href="ayarlar" class="link" data-toggle="tooltip" title="Ayarlar"><i class="ti-settings"></i></a>
	<a href="<?php $sorgu2=mysql_query("SELECT url FROM seo_tr"); $bilgi2= mysql_fetch_array($sorgu2); echo $bilgi2['url']; ?>" target="_blank" class="link" data-toggle="tooltip" title="Siteyi Görüntüle"><i class="mdi mdi-monitor-multiple"></i></a>
	<a href="logout" class="link" data-toggle="tooltip" title="Çıkış Yap"><i class="mdi mdi-power"></i></a> </div>
