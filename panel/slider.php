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
        						<h3 class="text-themecolor">Sliderlar</h3>
        						<ol class="breadcrumb">
        							<li class="breadcrumb-item active">Slider içeriklerini aşağıda yer alan kısımlardan değiştirebilirsiniz.</li>
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
								                <button data-whatever="@mdo" data-toggle="modal" data-target="#ekle" type="button" class="btn btn-warning btn-circle ekle" data-toggle="tooltip" title="" data-placement="left" data-original-title="Yeni Domain Ekle"><i class="fa fa-plus"></i> </button>
                                <div class="col-md-4">
                									<div class="modal fade" id="ekle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                										<div class="modal-dialog" role="document">
                											<div class="modal-content">
                												<div class="modal-header">
                													<h4 class="modal-title" id="exampleModalLabel1">Yeni İçerik Ekle</h4>
                													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                												</div>
                												<form method="POST" action="includes/functions.php?slider-ekle" enctype="multipart/form-data">
                                          <input name="lang" type="text" value="<?=$lang; ?>" hidden>
                													<div class="modal-body">
                														<div class="row">
                  														<div class="form-group col-md-6">
                  															<label for="recipient-name" class="control-label">Başlık:</label>
                  															<div class="controls">
                  																<input name="baslik" placeholder="Başlık" type="text" class="form-control" >
                  															</div>
                  														</div>
                                              <div class="form-group col-md-6">
                                                <label for="recipient-name" class="control-label">Sıralama:</label>
                                                <div class="controls">
                                                  <input name="sira" placeholder="Sıralama" type="text" class="form-control" >
                                                </div>
                                              </div>
                                            </div>
                														<div class="row">
                  														<div class="form-group col-md-6">
                  															<label for="recipient-name" class="control-label">Görsel:</label>
                  															<input name="resim" type="file" class="dropify" data-height="235">
                  														</div>
                  														<div class="form-group col-md-6">
                  															<label for="recipient-name" class="control-label">Mobil Görsel:</label>
                  															<input name="mobil" type="file" class="dropify" data-height="235">
                  														</div>
                														</div>
                													</div>
                													<div class="modal-footer">
                														<button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
                														<button type="submit" class="btn btn-success">Ekle</button>
                													</div>
                												</form>
                											</div>
                										</div>
                									</div>
                								</div>
                								<div class="form-group table-responsive">
                									<table class="table table-striped">
                										<thead style="background:#2b223a; color:#fff;">
                											<tr>
                												<th>ID</th>
                												<th>Sıralama</th>
                												<th>Resim</th>
                												<th>Başlık</th>
                												<th class="text-nowrap"><center>İşlem</center></th>
                											</tr>
                										</thead>
                										<tbody>
                											<?php $i = 0; $query=mysql_query("SELECT * FROM slider_".$lang." ORDER BY sira ASC"); while ($data = mysql_fetch_array($query)) { $i++; ?>
                												<tr>
                													<td><?=$data['id']?></td>
                													<td><?=$data['sira']?></td>
                													<td><img src="../images/<?=$data['resim']?>" width="30px" height="30px" class="img-circle"></td>
                													<td><?php $baslik = $data['baslik']; echo substr($baslik,0,50); ?></td>
                													<td class="text-nowrap">
                														<center>
                															<a href="#" data-whatever="@mdo" data-toggle="modal" data-target="#exampleModal<?php echo $data['id']; ?>"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                															<a href="includes/functions.php?slidersil=<?=$data['id']; ?>&lang=<?=$lang; ?>"> <i class="fa fa-close text-danger"></i> </a>
                														</center>
                													</td>
                												</tr>
                											<?php }; ?>
                										</tbody>
                									</table>
                								</div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i = 0; $query=mysql_query("SELECT * FROM slider_".$lang.""); while ($data = mysql_fetch_array($query)) { $i++; ?>
        					<div class="col-md-4">
        						<div class="modal fade" id="exampleModal<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        							<div class="modal-dialog" role="document">
        								<div class="modal-content">
        									<div class="modal-header">
        										<h4 class="modal-title" id="exampleModalLabel1">Slider Bilgilerini Güncelle</h4>
        										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        									</div>
        									<form method="POST" action="includes/functions.php?slider-guncelle" enctype="multipart/form-data">
        										<input name="sliderid" type="text" value="<?php echo $data['id']; ?>" hidden>
                            <input name="lang" type="text" value="<?=$lang; ?>" hidden>
        										<div class="modal-body">
        											<div class="row">
          											<div class="form-group col-md-12">
          												<label for="recipient-name" class="control-label">Başlık:</label>
          												<div class="controls">
          													<input name="baslik" placeholder="Başlık" type="text" class="form-control" value="<?php echo $data['baslik']; ?>">
          												</div>
          											</div>
                                
        											</div>
        											<div class="row">
          											<div class="form-group col-md-6">
          												<label for="recipient-name" class="control-label">Görsel:</label>
          												<input name="resim" type="file" class="dropify" data-height="235" data-default-file="../images/<?=$data['resim']?>">
          											</div>
          											<div class="form-group col-md-6">
          												<label for="recipient-name" class="control-label">Mobil Görsel:</label>
          												<input name="mobil" type="file" class="dropify" data-height="235" data-default-file="../images/<?=$data['mobil']?>">
          											</div>
        											</div>
        										</div>
        										<div class="modal-footer">
        											<button type="button" class="btn btn-danger" data-dismiss="modal">Vazgeç</button>
        											<button type="submit" class="btn btn-success">Güncelle</button>
        										</div>
        									</form>
        								</div>
        							</div>
        						</div>
        					</div>
        				<?php }; ?>
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
