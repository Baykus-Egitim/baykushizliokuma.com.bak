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
        						<h3 class="text-themecolor">Blog</h3>
        						<ol class="breadcrumb">
        							<li class="breadcrumb-item active">Blog içeriklerini aşağıda yer alan kısımlardan değiştirebilirsiniz.</li>
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
								                <button data-whatever="@mdo" data-toggle="modal" data-target="#blog-ekle" type="button" class="btn btn-warning btn-circle ekle" data-toggle="tooltip" title="" data-placement="left" data-original-title="Yeni Domain Ekle"><i class="fa fa-plus"></i> </button>
                                <div class="col-md-4">
                									<div class="modal fade" id="blog-ekle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                										<div class="modal-dialog" role="document">
                											<div class="modal-content">
                												<div class="modal-header">
                													<h4 class="modal-title" id="exampleModalLabel1">Yeni Blog Ekle</h4>
                													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                												</div>
                												<form method="POST" action="includes/functions.php?blog-ekle" enctype="multipart/form-data">
                                          <input name="lang" type="text" value="<?=$lang; ?>" hidden>
                													<div class="modal-body">
                														<div class="form-group">
                															<label for="recipient-name" class="control-label">Başlık:</label>
                															<div class="controls">
                																<input name="baslik" placeholder="Başlık" type="text" class="form-control" >
                															</div>
                														</div>
                														<div class="form-group">
                															<label for="recipient-name" class="control-label">Özet İçerik:</label>
                															<div class="controls">
                																<textarea name="altbaslik" placeholder="Özet İçerik" type="text" class="form-control" rows="5"></textarea>
                															</div>
                														</div>
                                            <div class="form-group">
                                              <label for="recipient-name" class="control-label">İçerik:</label>
                                              <textarea name="icerik"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="recipient-name" class="control-label">Blog Görseli:</label>
                                                <input name="resim" type="file" class="dropify" data-height="235">
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
                												<th>Sıra</th>
                												<th>Resim</th>
                												<th>Başlık</th>
                												<th>Özet İçerik</th>
                												<th>İçerik</th>
                												<th class="text-nowrap"><center>İşlem</center></th>
                											</tr>
                										</thead>
                										<tbody>
                											<?php $i = 0; $query=mysql_query("SELECT * FROM blog"); while ($data = mysql_fetch_array($query)) { $i++; ?>
                												<tr>
                													<td><?php echo $i; ?></td>
                													<td><img src="../blog/<?=$data['resim']?>" class="img-circle" width="30px" height="30px"> <?php echo $data['resim']; ?></td>
                													<td><?php $baslik = $data['baslik']; echo substr($baslik,0,30); ?></td>
                													<td><?php $altbaslik = $data['altbaslik']; echo substr($altbaslik,0,30); ?></td>
                													<td><?php $icerik = $data['icerik']; echo substr(strip_tags($icerik),0,30); ?></td>
                													<td class="text-nowrap">
                														<center>
                															<a href="#" data-whatever="@mdo" data-toggle="modal" data-target="#exampleModal<?php echo $data['id']; ?>"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                															<a href="includes/functions.php?blogsil=<?=$data['id']; ?>&lang=<?=$lang; ?>"> <i class="fa fa-close text-danger"></i> </a>
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
                <?php $i = 0; $query=mysql_query("SELECT * FROM blog"); while ($data = mysql_fetch_array($query)) { $i++; ?>
        					<div class="col-md-4">
        						<div class="modal fade" id="exampleModal<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        							<div class="modal-dialog" role="document">
        								<div class="modal-content">
        									<div class="modal-header">
        										<h4 class="modal-title" id="exampleModalLabel1">Blog Bilgilerini Güncelle</h4>
        										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        									</div>
        									<form method="POST" action="includes/functions.php?blog-guncelle" enctype="multipart/form-data">
        										<input name="blogid" type="text" value="<?php echo $data['id']; ?>" hidden>
                            <input name="lang" type="text" value="<?=$lang; ?>" hidden>
        										<div class="modal-body">
        											<div class="form-group">
        												<label for="recipient-name" class="control-label">Başlık:</label>
        												<div class="controls">
        													<input name="baslik" placeholder="Başlık" type="text" class="form-control" value="<?php echo $data['baslik']; ?>">
        												</div>
        											</div>
        											<div class="form-group">
        												<label for="recipient-name" class="control-label">Özet İçerik:</label>
        												<div class="controls">
        													<textarea name="altbaslik" placeholder="Özet İçerik" type="text" class="form-control" rows="5"><?php echo $data['altbaslik']; ?></textarea>
        												</div>
        											</div>
                              <div class="form-group">
                                <label for="recipient-name" class="control-label">İçerik:</label>
                                <textarea name="icerik<?=$data['id']; ?>"><?=$data['icerik']?></textarea>
                              </div>
                              <div class="form-group">
                                  <label for="recipient-name" class="control-label">Blog Görseli:</label>
                                  <input name="resim" type="file" class="dropify" data-height="235" data-default-file="../blog/<?=$data['resim']?>">
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
      CKEDITOR.replace( 'icerik' );
  	</script>
    <?php $i = 0; $query=mysql_query("SELECT * FROM blog"); while ($data = mysql_fetch_array($query)) { $i++; ?>
      <script>
        CKEDITOR.replace( 'icerik<?=$data['id']?>' );
    	</script>
    <?php }; ?>
</body>
</html>
