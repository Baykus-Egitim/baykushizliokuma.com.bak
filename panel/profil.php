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
                        <h3 class="text-themecolor">Profil Bilgileri</h3>
                        <ol class="breadcrumb"><li class="breadcrumb-item active">Profilinize ait bilgileri bu sayfadan değiştirebilirsiniz.</li></ol>
                    </div>
                    <div class="">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn btn-circle btn-sm pull-right m-l-10"><i class="fa fa-list"></i></button>
                    </div>
                </div>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <?php $sorgu2=mysql_query("SELECT * FROM kullanicilar where kullanici='$_SESSION[kullanici]' ");
                                      while($bilgi2= mysql_fetch_array($sorgu2)) {
                                ?>
                                    <center class="m-t-30"> <img src="assets/images/users/1.png" class="img-circle" width="150" />
                                        <h4 class="card-title m-t-10"><?php echo $bilgi2['isim']; ?></h4>
                                        <h6 class="card-subtitle"><?php echo $bilgi2['kullanici']; ?></h6>
                                    </center>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profil-bilgileri" role="tab">Profil Bilgileri</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="profil-bilgileri" role="tabpanel">
                                    <div class="card-body">
                                        <?php $sorgu2=mysql_query("SELECT * FROM kullanicilar where kullanici='$_SESSION[kullanici]' ");
                                              while($bilgi2= mysql_fetch_array($sorgu2)) {
                                        ?>
                                            <form class="form-horizontal form-material" method="POST" action="includes/functions.php?profil-guncelle">
                                                <input type="text" name="id" value="<?=$bilgi2['id']; ?>" hidden>
                                                <div class="form-group">
                                                    <label class="col-md-12">İsim Soyisim</label>
                                                    <div class="col-md-12">
                                                        <input type="text" value="<?php echo $bilgi2['isim']; ?>" placeholder="İsim Soyisim" name="isim" class="form-control form-control-line">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="example-email" class="col-md-12">Kullanıcı Adı</label>
                                                    <div class="col-md-12">
                                                        <input type="text" value="<?php echo $bilgi2['kullanici']; ?>" placeholder="Kullanıcı Adı" class="form-control form-control-line" name="kullanici" id="example-email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-12">Parola</label>
                                                    <div class="col-md-12">
                                                        <input type="password" placeholder="Parola" name="parola" class="form-control form-control-line" value="<?php echo $bilgi2['parola']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <button class="btn btn-success" type="submit">Güncelle</button>
                                                    </div>
                                                </div>
                                            </form>
                                        <?php } ?>
                                    </div>
                                </div>
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
</body>
</html>
