<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <?php include("includes/head.php"); ?>
	<link rel="stylesheet" href="assets/plugins/html5-editor/bootstrap-wysihtml5.css" />
    <link rel="stylesheet" href="assets/plugins/dropify/dist/css/dropify.min.css">
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
        						<h3 class="text-themecolor">Kurumsal İçerikleri</h3>
        						<ol class="breadcrumb">
        							<li class="breadcrumb-item active">Kurumsal içeriklerini aşağıda yer alan kısımlardan değiştirebilirsiniz.</li>
        						</ol>
        					</div>
        					<div class="">
        						<button class="right-side-toggle waves-effect waves-light btn-info btn btn-circle btn-sm pull-right m-l-10"><i class="fa fa-list"></i></button>
        					</div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                              <?php $query=mysql_query("SELECT * FROM kurumsal_".$lang.""); while ($data = mysql_fetch_array($query)) { $i++; ?>
                                <form method="POST" action="includes/functions.php?kurumsal-guncelle" enctype="multipart/form-data">
                                  <input name="lang" type="text" value="<?=$lang; ?>" hidden>
                                  <div class="modal-body">
                                    <div class="form-group 6">
                                      <label for="recipient-name" class="control-label">Başlık:</label>
                                      <div class="controls">
                                        <input name="baslik" placeholder="Başlık" type="text" class="form-control" value="<?php echo $data['baslik']; ?>">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="recipient-name" class="control-label">İçerik:</label>
                                      <textarea name="icerik"><?php echo $data['icerik']; ?></textarea>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
                                    <button type="submit" class="btn btn-success">Güncelle</button>
                                  </div>
                                </form>
                              <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <aside class="left-sidebar">
                    <?php include("includes/left-sidebar.php"); ?>
                </aside>
                <div class="right-sidebar">
                    <?php include("includes/right-sidebar.php"); ?>
                </div>
            </div>
            <footer class="footer"> <?php include("includes/footer-text.php"); ?> </footer>
        </div>
    </div>
	<?php include("includes/footer.php"); ?>

    <script src="assets/plugins/html5-editor/wysihtml5-0.3.0.js"></script>
    <script src="assets/plugins/html5-editor/bootstrap-wysihtml5.js"></script>

    <script>
      CKEDITOR.replace( 'icerik' );
  	</script>
</body>
</html>
