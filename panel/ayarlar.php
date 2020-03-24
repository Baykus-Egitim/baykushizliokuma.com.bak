<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head.php"); ?>
	<link rel="stylesheet" href="assets/plugins/html5-editor/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
	<link href="assets/plugins/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
</head>

<body class="fix-header card-no-border">
	<?php include("includes/notifications.php"); ?>

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <div id="main-wrapper">

        <header class="topbar">
            <?php include("includes/topbar.php"); ?>
        </header>

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-12 align-self-center">
						<h3 class="text-themecolor">Genel Site Ayarları</h3>
						<ol class="breadcrumb">
							<li class="breadcrumb-item active">Sitenizle ilgili ayarları bu sayfadan düzenleyebilirsiniz.</li>
						</ol>
					</div>
					<div class="">
						<button class="right-side-toggle  waves-light btn-info btn btn-circle btn-sm pull-right m-l-10"><i class="fa fa-list"></i></button>
					</div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="includes/functions.php?seo-guncelle" enctype="multipart/form-data">
                                  <input name="lang" type="text" value="<?=$lang; ?>" hidden>
                									<?php $seo_sorgu=mysql_query("SELECT * FROM seo_".$lang.""); while ($seo= mysql_fetch_array($seo_sorgu)) { ?>
              											<div class="form-group">
              												<label class="control-label">Site URL</label>
              												<input placeholder="Site URL" value="<?php echo $seo['url']; ?>" type="text" name="url" class="form-control" required="" data-validation-required-message="This field is required" maxlength="69" aria-invalid="false">
              												<div class="form-control-feedback"><small>Web sitenizin <code>http:// veya https://</code> protokolleri dahil tam linkini giriniz... </small></div>
              											</div>
              											<div class="form-group">
              												<label class="control-label">SEO Title</label>
              												<input placeholder="SEO Title" value="<?php echo $seo['title']; ?>" type="text" name="title" class="form-control" required="" data-validation-required-message="This field is required" maxlength="69" aria-invalid="false">
              												<div class="form-control-feedback"><small>SEO uyumluluğu açısından <code>maksimum 69 karakter</code> girişi yapabilirsiniz... </small></div>
              											</div>
              											<div class="form-group">
              												<label class="control-label">SEO Keywords</label>
              												<input name="keywords" type="text" class="form-control col-md-12" placeholder="SEO Keywords" value="<?php echo $seo['keywords']; ?>">
              												<div class="form-control-feedback"><small>SEO Keywords girişi esnasında kelimeler arasında <code>Virgül(,)</code> kullanmanız önerilir... </small></div>
              											</div>
              											<div class="form-group">
              												<label class="control-label">SEO Description</label>
              												<input placeholder="SEO Description" value="<?php echo $seo['description']; ?>" type="text" name="description" class="form-control" required="" data-validation-required-message="This field is required" maxlength="156" aria-invalid="false">
              												<div class="form-control-feedback"><small>SEO uyumluluğu açısından <code>maksimum 156 karakter</code> girişi yapabilirsiniz... </small></div>
              											</div>
              											<div class="row">
                											<div class="col-md-4 form-group">
                                        <label for="recipient-name" class="control-label">Logo</label>
                                        <input name="logo" type="file" class="dropify" data-height="235" data-default-file="../upload/<?=$seo['logo']?>">
                											</div>
                											<div class="col-md-4 form-group">
                                        <label for="recipient-name" class="control-label">Favicon</label>
                                        <input name="favicon" type="file" class="dropify" data-height="235" data-default-file="../upload/<?=$seo['favicon']?>">
                											</div>
                											<div class="col-md-4 form-group">
                                        <label for="recipient-name" class="control-label">OG Görseli</label>
                                        <input name="og" type="file" class="dropify" data-height="235" data-default-file="../upload/<?=$seo['og']?>">
                											</div>
              											</div>
              											<div class="form-group">
              											    <input type="checkbox" name="noindex" id="md_checkbox_27" value="1" class="filled-in chk-col-light-blue" <?php if($seo['noindex'] == 1) echo "checked"; ?> />
              												  <label for="md_checkbox_27">Google arama motorunun bu siteyi indexlemesini engellemeye çalış.</label>
              											</div>
              											<hr style="width:100%;">
              											<div style="float:right; margin-top:0px;">
              												<button class="btn btn-success waves-effect waves-light" type="submit"><span class="btn-label"><i class="fa fa-save"></i></span>Güncelle</button>
              											</div>
                									<?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="left-sidebar">
                    <?php include("includes/left-sidebar.php"); ?>
                </aside>
				<!-- Right Sidebar -->
                <div class="right-sidebar">
                    <?php include("includes/right-sidebar.php"); ?>
                </div>
            </div>
            <footer class="footer"> <?php include("includes/footer-text.php"); ?> </footer>
        </div>
    </div>
	<?php include("includes/footer.php"); ?>

    <!-- wysuhtml5 Plugin JavaScript -->
    <script src="assets/plugins/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="assets/plugins/html5-editor/bootstrap-wysihtml5.js"></script>
	<script>
		$(document).ready(function() {
			$('.textarea_editor').wysihtml5();
		});
    </script>

	<script src="assets/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="assets/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
    <script src="assets/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
	<script>
    // MAterial Date picker
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
    // Colorpicker
    $(".colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
    </script>
</body>
</html>
