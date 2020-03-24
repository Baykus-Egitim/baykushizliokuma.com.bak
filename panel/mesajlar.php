<?php include("includes/config.php"); ?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf8">
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
                        <h3 class="text-themecolor">Kariyer Gelen Kutusu</h3>
                        <ol class="breadcrumb"><li class="breadcrumb-item active">Kariyer kısmından gelen mesajları bu sayfadan kontrol edebilirsiniz.</li></ol>
                    </div>
                    <div class="">
                        <button class="right-side-toggle waves-effect waves-light btn-info btn btn-circle btn-sm pull-right m-l-10"><i class="fa fa-list"></i></button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card-body inbox-panel">
                                        <ul class="list-group list-group-full">
                                            <li class="list-group-item active">
                                                <a href="mesajlar">
                                                    <i class="mdi mdi-book"></i> Gelen Kutusu
                                                </a>
                                                <span class="badge badge-success ml-auto">
                                                    <?php $query=mysql_query("SELECT COUNT(id) FROM kariyer"); while($data= mysql_fetch_array($query)){ echo $data['COUNT(id)']; }?>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body p-t-20">
                                        <div class="card b-all shadow-none">
                                            <div class="inbox-center table-responsive">
                                                <table class="table table-hover no-wrap" style="margin-bottom: 0px;">
                                                    <tbody>
                                                        <?php $query=mysql_query("SELECT * FROM kariyer ORDER BY id DESC");
                                                              while($data= mysql_fetch_array($query)){
                                                        ?>
                                                        <tr class="unread">
                                                            <td class="hidden-xs-down"><a href="#" data-whatever="@mdo" data-toggle="modal" data-target="#exampleModal<?php echo $data['id']; ?>" /><?php echo $data['ad']; ?></td>
                                                            <td class="hidden-xs-down"><a href="#" data-whatever="@mdo" data-toggle="modal" data-target="#exampleModal<?php echo $data['id']; ?>" /><?php echo $data['soyad']; ?></td>
															<td class="hidden-xs-down"><a href="#" data-whatever="@mdo" data-toggle="modal" data-target="#exampleModal<?php echo $data['id']; ?>" /><?php echo $data['email']; ?></td>
                                                            <td class="max-texts"><a href="#" data-whatever="@mdo" data-toggle="modal" data-target="#exampleModal<?php echo $data['id']; ?>" /><?php echo substr($data['aciklama'], 0,30); ?>...</td>
                                                            <td style="width:40px">
                                                                <a href="includes/functions.php?cvsil=<?php echo $data['id']; ?>"> <i class="fa fa-close text-danger"></i> </a>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i = 0; $query=mysql_query("SELECT * FROM kariyer"); while ($data = mysql_fetch_array($query)) { $i++; ?>
                    <div class="col-md-4">
                        <div class="modal fade" id="exampleModal<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <center class="m-t-30">
                                                    <img src="assets/images/users/login.png" width="150"><br>

                                                    <h2 class="card-title m-t-10"><?=$data['ad']; ?> <?=$data['soyad']; ?></h2>
                                                    <h6 class="card-title"><?=$data['email']; ?></h6>
                                                    <a target="_blank" href="includes/cvler/<?=$data['cv']; ?>"><?=$data['cv']; ?></a> <br>(CV'yi görüntülemek için üzerine tıklayın)</br>
                                                    <br><br>
                                                    <p class="card-subtitle"><?=$data['aciklama']; ?></p>
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-warning btn-circle ekle" data-dismiss="modal" style="background: #e0202b; border: 1px solid #e0202b;"><i class="fa fa-close"></i> </button>
                                    </div>
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
</body>
</html>
