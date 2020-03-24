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
						<h3 class="text-themecolor">Sosyal Medya</h3>
						<ol class="breadcrumb">
							<li class="breadcrumb-item active">Sosyal medya bilgilerini bu sayfadan düzenleyebilirsiniz.</li>
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
                                <form method="POST" action="includes/functions.php?sosyalmedya-guncelle" enctype="multipart/form-data">
                									<div class="form-group row">
                										<div class="col-md-6"><label class="control-label">Başlık / Icon</label></div>
                										<div class="col-md-6"><label class="control-label">Link</label></div>
                									</div>
                									<?php $i=0; $query=mysql_query("SELECT * FROM sosyalmedya"); while ($data = mysql_fetch_array($query)) { $i++; ?>
                										<div class="row">
                											<input type="text" name="id" value="<?php echo $data['id']; ?>" hidden>
                											<div class="row col-md-6">
                												<div class="col-md-6">
                													<input type="text" name="<?php echo "baslik".$i ?>" class="form-control" placeholder="Başlık <?php echo $i; ?>" value="<?php echo $data['baslik']; ?>">
                												</div>
                												<div class="col-md-6">
                													<input type="text" name="<?php echo "icon".$i ?>" class="form-control" placeholder="İcon <?php echo $i; ?>" value="<?php echo $data['icon']; ?>">
                												</div>
                											</div>
                											<div class="col-md-6">
                												<div class="form-group">
                													<input type="text" name="<?php echo "link".$i ?>" class="form-control" placeholder="Link <?php echo $i; ?>" value="<?php echo $data['link']; ?>">
                												</div>
                											</div>
                										</div>
                									<?php }; ?>
                									<hr style="width:100%;">
                									<div style="float:right; margin-top:0px;">
                										<button class="btn btn-success waves-effect waves-light" type="submit"><span class="btn-label"><i class="fa fa-save"></i></span>Güncelle</button>
                									</div>
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
</body>
</html>
