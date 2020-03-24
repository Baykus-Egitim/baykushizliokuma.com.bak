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
        						<h3 class="text-themecolor">İletişim</h3>
        						<ol class="breadcrumb">
        							<li class="breadcrumb-item active">İletişim içeriklerini aşağıda yer alan kısımlardan değiştirebilirsiniz.</li>
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
                									<div class="modal fade" id="ekle" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                										<div class="modal-dialog" role="document">
                											<div class="modal-content">
                												<div class="modal-header">
                													<h4 class="modal-title" id="exampleModalLabel1">Yeni İçerik Ekle</h4>
                													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                												</div>
                												<form method="POST" action="includes/functions.php?iletisim-ekle" enctype="multipart/form-data">
                                          <input name="lang" type="text" value="<?=$lang; ?>" hidden>
                													<div class="modal-body">
                  														<div class="form-group">
                  															<label for="recipient-name" class="control-label">Adres:</label>
                  															<div class="controls">
                  																<input name="adres" placeholder="Adres" type="text" class="form-control" >
                  															</div>
                  														</div>
                  														<div class="row">
                    														<div class="form-group col-md-6">
                    															<label for="recipient-name" class="control-label">Telefon:</label>
                    															<div class="controls">
                    																<input name="telefon1" placeholder="Telefon" type="text" class="form-control" >
                    															</div>
                    														</div>
                    														<div class="form-group col-md-6">
                    															<label for="recipient-name" class="control-label">Telefon:</label>
                    															<div class="controls">
                    																<input name="telefon2" placeholder="Telefon" type="text" class="form-control" >
                    															</div>
                    														</div>
                  														</div>
                  														<div class="row">
                    														<div class="form-group col-md-6">
                    															<label for="recipient-name" class="control-label">E-Mail:</label>
                    															<div class="controls">
                    																<input name="mail1" placeholder="E-Mail" type="text" class="form-control" >
                    															</div>
                    														</div>
                    														<div class="form-group col-md-6">
                    															<label for="recipient-name" class="control-label">E-Mail:</label>
                    															<div class="controls">
                    																<input name="mail2" placeholder="E-Mail" type="text" class="form-control" >
                    															</div>
                    														</div>
                  														</div>
                                              <div class="form-group">
                                                <label for="recipient-name" class="control-label">Fax:</label>
                                                <div class="controls">
                                                  <input name="fax" placeholder="Fax" type="text" class="form-control" >
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
                								<div class="form-group table-responsive">
                									<table class="table table-striped">
                										<thead style="background:#2b223a; color:#fff;">
                											<tr>
                												<th>Sıra</th>
                												<th>Adres</th>
                												<th>Telefon</th>
                												<th>Mail</th>
                												<th>Fax</th>
                												<th class="text-nowrap"><center>İşlem</center></th>
                											</tr>
                										</thead>
                										<tbody>
                											<?php $i = 0; $query=mysql_query("SELECT * FROM iletisim_".$lang.""); while ($data = mysql_fetch_array($query)) { $i++; ?>
                												<tr>
                													<td><?php echo $i; ?></td>
                													<td><?php $adres = strip_tags($data['adres']); echo substr($adres,0,50); ?>...</td>
                													<td><?=$data['telefon1']; ?></td>
                													<td><?=$data['mail1']; ?></td>
                													<td><?=$data['fax']; ?></td>
                													<td class="text-nowrap">
                														<center>
                															<a href="#" data-whatever="@mdo" data-toggle="modal" data-target="#exampleModal<?=$data['id']?>"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                															<a href="includes/functions.php?iletisimsil=<?=$data['id']?>&lang=<?=$lang?>"> <i class="fa fa-close text-danger"></i> </a>
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
                <?php $i = 0; $query=mysql_query("SELECT * FROM iletisim_".$lang.""); while ($data = mysql_fetch_array($query)) { $i++; $id = $data['id']; ?>
        					<div class="col-md-4">
        						<div class="modal fade" id="exampleModal<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?=$data['id']?>">
        							<div class="modal-dialog" role="document">
        								<div class="modal-content">
        									<div class="modal-header">
        										<h4 class="modal-title" id="exampleModalLabel1">İletişim Bilgilerini Güncelle</h4>
        										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        									</div>
        									<form method="POST" action="includes/functions.php?iletisim-guncelle" enctype="multipart/form-data">
        										<input name="iletisimid" type="text" value="<?=$data['id']?>" hidden>
                            <input name="lang" type="text" value="<?=$lang?>" hidden>
                            <div class="modal-body">
                                <div class="form-group">
                                  <label for="recipient-name" class="control-label">Adres:</label>
                                  <div class="controls">
                                    <input name="adres" type="text" class="form-control" value="<?=$data['adres']?>">
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6">
                                    <label for="recipient-name" class="control-label">Telefon:</label>
                                    <div class="controls">
                                      <input name="telefon1" type="text" class="form-control" value="<?=$data['telefon1']?>">
                                    </div>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="recipient-name" class="control-label">Telefon:</label>
                                    <div class="controls">
                                      <input name="telefon2" type="text" class="form-control" value="<?=$data['telefon2']?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="form-group col-md-6">
                                    <label for="recipient-name" class="control-label">E-Mail:</label>
                                    <div class="controls">
                                      <input name="mail1" type="text" class="form-control" value="<?=$data['mail1']?>">
                                    </div>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="recipient-name" class="control-label">E-Mail:</label>
                                    <div class="controls">
                                      <input name="mail2" type="text" class="form-control" value="<?=$data['mail2']?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="recipient-name" class="control-label">Fax:</label>
                                  <div class="controls">
                                    <input name="fax" type="text" class="form-control" value="<?=$data['fax']?>">
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
</body>
</html>
