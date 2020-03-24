	<?php
		session_start();
		if(!isset($_SESSION['kullanici']))
		{
			header("Location: login.php");
		}

		$list = mysql_query("SELECT * FROM dil WHERE aktif = 1");
		$lang = mysql_result( $list , 0 , 'kod' );
		$dil  = mysql_result( $list , 0 , 'dil' );

		$page = $_SERVER['PHP_SELF']; $page = explode('panel/' , $page , 2); $page = str_replace('.php','',$page); $page = $page[1];
		$panel = $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; $panel = explode('/' , $panel , 5); $panel = str_replace('.php','',$panel); $panel = $panel[1];
	?>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="robots" content="noindex">
  <meta name="googlebot" content="noindex">
  <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
  <title>Varien | Yönetim Paneli</title>
  <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
  <link href="assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
  <link href="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
  <link href="assets/plugins/c3-master/c3.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/colors/blue.css" id="theme" rel="stylesheet">
  <script src="https://cdn.ckeditor.com/4.10.1/standard/ckeditor.js"></script>

	<script>
		window.setTimeout(function() {
			$(".alert").fadeTo(500, 0).slideUp(500, function(){
				$(this).remove();
			});
		}, 5000);
	</script>
