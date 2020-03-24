<nav class="navbar top-navbar navbar-expand-md navbar-light">
	<div class="navbar-header">
		<a class="navbar-brand" href="index">
				<img src="assets/images/icon.png" alt="homepage" class="icon" />
			</b>
			<span>
			 <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
			</span>
		</a>
	</div>
	<div class="navbar-collapse">
		<ul class="navbar-nav mr-auto mt-md-0">
			<li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
			<li class="nav-item"> <a class="nav-link sidebartoggler hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
		</ul>
		<ul class="navbar-nav my-lg-0">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" id="2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-email"></i>
					<div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
				</a>
				<div class="dropdown-menu mailbox dropdown-menu-right scale-up" aria-labelledby="2">
					<ul>
						<li>
							<div class="drop-title">Size Gelen Mesajlar</div>
						</li>
						<li>
							<div class="message-center">
								<?php $mesaj_sorgu=mysql_query("SELECT * FROM iletisim_formu ORDER BY id DESC");
									  while($mesaj= mysql_fetch_array($mesaj_sorgu)){
									  echo '<a href="mesajlar">
												<div class="user-img"> <img src="images/message.png" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
												<div class="mail-contnet">
												<h5>'.$mesaj['adsoyad'].'</h5> <span class="mail-desc">'.$mesaj['mesaj'].'</span> <span class="time">'.$mesaj['tarih'].'</span> </div>
									  </a>';}
								?>
							</div>
						</li>
						<li>
							<a class="nav-link text-center" href="mesajlar"> <strong>Tüm Mesajlar</strong> <i class="fa fa-angle-right"></i> </a>
						</li>
					</ul>
				</div>
			</li>
			<li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="flag-icon flag-icon-<?=$lang; ?>"></i></a>
          <div class="dropdown-menu dropdown-menu-right animated bounceInDown">
						<a class="dropdown-item" href="includes/functions.php?lang=tr&page=<?=$page; ?>"><i class="flag-icon flag-icon-tr"></i> Türkçe</a>
						<a class="dropdown-item" href="includes/functions.php?lang=us&page=<?=$page; ?>"><i class="flag-icon flag-icon-us"></i> İngilizce</a>
					</div>
      </li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.png" alt="user" class="profile-pic" /></a>
				<div class="dropdown-menu dropdown-menu-right scale-up">
					<ul class="dropdown-user">
						<li>
							<div class="dw-user-box">
								<div class="u-img"><img src="assets/images/users/1.png" alt="user"></div>
								<div class="u-text">
									<h4>
										<?php $sorgu2=mysql_query("SELECT kullanici FROM kullanicilar where kullanici='$_SESSION[kullanici]' ");
											  $bilgi2= mysql_fetch_array($sorgu2);
											  echo $bilgi2['kullanici']; ?>
									</h4>
									<p class="text-muted">
										<?php $sorgu2=mysql_query("SELECT isim FROM kullanicilar where kullanici='$_SESSION[kullanici]' ");
											  $bilgi2= mysql_fetch_array($sorgu2);
											  echo $bilgi2['isim']; ?>
									</p><a href="profil" class="btn btn-rounded btn-danger btn-sm">Görüntüle</a></div>
							</div>
						</li>
						<li role="separator" class="divider"></li>
						<li><a href="profil"><i class="ti-user"></i> Profil Bilgileri</a></li>
						<li><a href="mesajlar"><i class="ti-email"></i> Gelen Kutusu</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="ayarlar"><i class="ti-settings"></i> Genel Ayarlar</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="logout"><i class="fa fa-power-off"></i> Çıkış Yap</a></li>
					</ul>
				</div>
			</li>
		</ul>
	</div>
</nav>
