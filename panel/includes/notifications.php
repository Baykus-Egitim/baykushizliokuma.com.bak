<?php

	if($_GET['i']==1)
	{
		echo '	<div class="alert hatali">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Dosya Yüklenemedi!</strong> Dosya yükleme esnasında bir hata ile karşılaşıldı!
				</div> ';
	}

	if($_GET['i']==2)
	{
		echo '	<div class="alert hatali">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Hatalı Dosya Formatı!</strong> Yalnızca JPG,GIF ve PNG uzantılı dosya yükleyebilirsiniz !
				</div> ';
	}

	if($_GET['i']==3)
	{
		echo '	<div class="alert hatali">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Yüksek Dosya Boyutu!</strong> Dosya boyutu 2 MB dan yüksek olamaz !
				</div> ';
	}

	if($_GET['i']==4)
	{
		echo '	<div class="alert basarili">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Başarılı!</strong> İşleminiz başarıyla gerçekleştirildi !
				</div> ';
	}

	if($_GET['i']==5)
	{
		echo '	<div class="alert hatali">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Hata !</strong> Lütfen tüm içerikleri eksiksiz doldurun !
				</div> ';
	}

	if($_GET['i']==6)
	{
		echo '	<div class="alert basarili">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Başarılı!</strong> Kayıt başarıyla silindi !
				</div> ';
	}

	if($_GET['i']==7)
	{
		echo '	<div class="alert basarili">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Başarılı!</strong> Kayıt başarıyla eklendi !
				</div> ';
	}

	if($_GET['i']==8)
	{
		echo '	<div class="alert install">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Bağlantı Hatası !</strong> Veritabanına bağlanılamadı !
				</div> ';
	}

	if($_GET['i']==9)
	{
		echo '	<div class="alert install">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Veritabanı Hatası !</strong> Veritabanı bilgileriniz yanlış !
				</div> ';
	}

	if($_GET['i']==10)
	{
		echo '	<div class="alert install">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Domain Hatası !</strong> Panelin yüklü olduğu domain adresini değiştiremezsiniz !
				</div> ';
	}

	if($_GET['i']==11)
	{
		echo '	<div class="alert basarili">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <i class="flag-icon flag-icon-'.$lang.'"></i> <strong>Başarılı !</strong> Seçili dil '.$dil.' olarak değiştirildi !
				</div> ';
	}

?>
