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
							<h3 class="text-themecolor">Hizmet İçerikleri</h3>
							<ol class="breadcrumb">
								<li class="breadcrumb-item active">Hizmet detay içeriklerini aşağıda yer alan kısımlardan değiştirebilirsiniz.</li>
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
													<form method="POST" action="includes/functions.php?cafeverestoranekle" enctype="multipart/form-data">
														<input name="lang" type="text" value="<?=$lang; ?>" hidden>
														<div class="modal-body">
															<div class="form-group">
																<label for="recipient-name" class="control-label">Başlık:</label>
																<div class="controls">
																	<input name="baslik" placeholder="Başlık" type="text" class="form-control" >
																</div>
															</div>
															<div class="form-group">
																<label for="recipient-name" class="control-label">Link:</label>
																<div class="controls">
																	<input name="link" placeholder="Başlık" type="text" class="form-control" >
																</div>
															</div>
															<div class="form-group">
																<label for="recipient-name" class="control-label">Sektör:</label>
																<div class="controls">
																	<select name="kategori" class="form-control">
																		<option value="tekstil">Tekstil Parekende</option>
																		<option value="cafe">Cafe & Restoran</option>
																		<option value="otel">Otelcilik</option>
																	</select>
																</div>
															</div>
															
															<div class="form-group">
																<label for="recipient-name" class="control-label">İçerik:</label>
																<div class="controls">
																	<textarea name="icerik" class="textarea_editor form-control" rows="10" placeholder="İçeriği bu kısma girin..."></textarea>
																</div>
															</div>
															<div class="row">
																<div class="col-md-12 form-group">
																	<label for="recipient-name" class="control-label">İç Sayfa Görseli:</label>
																	<input name="resim" type="file" class="dropify" data-height="235" data-default-file="images/upload.png">
																</div>
															</div>
															<div class="row">
																<div class="col-md-12 form-group">
																	<label for="recipient-name" class="control-label">Anasayfa Görseli:</label>
																	<input name="kapak" type="file" class="dropify" data-height="235" data-default-file="images/upload.png">
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
													
													<th>Resim</th>
													<th>Başlık</th>
													<th>Link</th>
													<th>Kategori</th>
													<th>İçerik</th>
													<th class="text-nowrap"><center>İşlem</center></th>
												</tr>
											</thead>
											<tbody>
												<?php $i = 0; $query=mysql_query("SELECT * FROM cafe_ve_restoran_".$lang.""); while ($data = mysql_fetch_array($query)) { $i++; ?>
													<tr>
														
														<td><img src="<?='../images/'.$data['resim']; ?>" width="30px" height="30px" class="img-circle"></td>
														<td><?php $baslik = $data['baslik']; echo substr($baslik,0,50); ?></td>
														<td><?php $link = $data['link']; echo substr($link,0,50); ?></td>
														<td><?php $kategori = $data['kategori']; echo substr($kategori,0,50); ?></td>
														<td><?php $icerik = $data['icerik']; echo substr($icerik,0,50); ?>...</td>
														<td class="text-nowrap">
															<center>
																<a href="#" data-whatever="@mdo" data-toggle="modal" data-target="#exampleModal<?=$data['id']; ?>"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
																<a href="includes/functions.php?cafeverestoransil=<?=$data['id']; ?>&lang=<?=$lang; ?>"> <i class="fa fa-close text-danger"></i> </a>
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
					<?php $i = 0; $query=mysql_query("SELECT * FROM cafe_ve_restoran_".$lang.""); while ($data = mysql_fetch_array($query)) { $i++; ?>
						<div class="col-md-4">
							<div class="modal fade" id="exampleModal<?=$data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="exampleModalLabel1">Hizmet Detay Bilgilerini Güncelle</h4>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										</div>
										<form method="POST" action="includes/functions.php?cafeverestoranguncelle" enctype="multipart/form-data">
											<input name="cafeverestoranid" type="text" value="<?=$data['id']; ?>" hidden>
											<input name="lang" type="text" value="<?=$lang; ?>" hidden>
											<div class="modal-body">
												<div class="form-group">
													<label for="recipient-name" class="control-label">Başlık:</label>
													<div class="controls">
														<input name="baslik" placeholder="Başlık" type="text" class="form-control" value="<?=$data['baslik']; ?>">
													</div>
												</div>
												<div class="form-group">
													<label for="recipient-name" class="control-label">Link:</label>
													<div class="controls">
														<input name="link" placeholder="Başlık" type="text"  value="<?=$data['baslik']; ?>" class="form-control" >
													</div>
												</div>
												<div class="form-group">
													<label for="recipient-name" class="control-label">Sektör: <?=$data['kategori'];?></label>
													<div class="controls">
														<select name="kategori" class="form-control">
															<option value="tekstil" <? if($data['kategori']=="tekstil"){ echo 'selected';}?>>Tekstil Parekende</option>
															<option value="cafe" <? if($data['kategori']=="cafe"){ echo 'selected';}?>>Cafe & Restoran</option>
															<option value="otel" <? if($data['kategori']=="otel"){ echo 'selected';}?>>Otelcilik</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<label for="recipient-name" class="control-label">İçerik:</label>
													<div class="controls">
														<textarea name="icerik" class="textarea_editor<?=$data['id']; ?> form-control" rows="10" placeholder="İçeriği bu kısma girin..."><?=$data['icerik']; ?></textarea>
													</div>
												</div>
												<div class="row">
          											<div class="col-md-12 form-group">
          												<label for="recipient-name" class="control-label">Görsel:</label>
          												<input name="resim" type="file" class="dropify" data-height="235" data-default-file="<?='../images/'.$data['resim']; ?>">
													</div>
          											
												</div>
												<div class="row">
          											<div class="col-md-12 form-group">
          												<label for="recipient-name" class="control-label">Anasayfa Görseli:</label>
          												<input name="kapak" type="file" class="dropify" data-height="235" data-default-file="<?='../images/'.$data['kapak']; ?>">
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
		<?php $i = 0; $query=mysql_query("SELECT * FROM cafe_ve_restoran_".$lang.""); while ($data = mysql_fetch_array($query)) { $i++; ?>
			<script>
				$(document).ready(function() {
					$('.textarea_editor<?=$data['id']; ?>').wysihtml5();
				});
			</script>
		<?php }; ?>
	</body>
</html>
