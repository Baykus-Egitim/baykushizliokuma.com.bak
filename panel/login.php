<?php require_once("includes/config.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Varien Yönetim Paneli</title>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <section id="wrapper">
        <div class="login-register" style="background-image:url(https://www.xmple.com/wallpaper/highlight-black-red-gradient-linear-1920x1080-c2-000000-8b0000-l-67-a-345-f-21.svg);">
            <div class="login-box card">
                <div class="card-body">
                  <form class="form-horizontal form-material" action="giris_kontrol.php" method="POST">
                    <div class="form-group ">
                      <div class="col-xs-12">
                        <?php
							if (isset($_GET["Hata"]))
							{
								echo "<center><h4 style='color:rgba(194, 42, 89, 1)'>Hatalı Giriş Yaptınız</h4></center><br>";
							}
						?>
                      </div>
                    </div>
					<div class="form-group">
                      <div class="col-xs-12 text-center">
                        <div class="user-thumb text-center"> <img alt="thumbnail" width="100" src="assets/images/users/login.png">
                          <h3>Giriş Yap</h3>
                        </div>
                      </div>
                    </div>
                    <div class="form-group ">
                      <div class="col-xs-12">
                        <input class="form-control" name="kullanici" type="text" required="" placeholder="Kullanıcı Adı">
                      </div>
                    </div>
                    <div class="form-group ">
                      <div class="col-xs-12">
                        <input class="form-control" name="parola" type="password" required="" placeholder="Parola">
                      </div>
                    </div>
                    <div class="form-group text-center">
                      <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Giriş Yap</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
        </div>

    </section>
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="assets/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>
</html>