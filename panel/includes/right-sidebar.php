<?php include("includes/includes/config.php"); ?>
<div class="slimscrollright" style="padding-bottom: 60px;">
	<div class="rpanel-title"> - <span><i class="ti-close right-side-toggle"></i></span> </div>
	<div class="r-panel-body">
		<ul class="m-t-20 chatonline">
			<?php 
				$i = 0;
				$site_sorgu=mysql_query("SELECT * FROM siteler"); 
				while ($site= mysql_fetch_array($site_sorgu)) 
				{ 
					$i++;
					if($i % 2 == 0) echo '<li class="cift">'; else echo '<li class="tek">';
					echo '<a href="'.$site["url"].'" target="_blank" class="link">
							<img src="images/domain.png" alt="user-img" class="img-circle" data-toggle="tooltip" title="Siteyi Görüntüle" data-placement="left"></a>';
					if($site["durum"] == 1) echo '<button type="submit" class="btn btn-rounded btn-block btn-info" style="float:right; width:110px;" disabled>Şuan Bağlı</button>';
					else
					echo ' <form method="POST" action="sqlbaglan.php?site='.$site["id"].'">
								<button type="submit" class="btn btn-rounded btn-block btn-info" style="float:right; width:110px;">Bağlan</button>
							</form>';
					echo '
							<span>'.substr($site["sitename"],0,22).'<small class="text-success">'.substr($site["url"],0,35).'</small></span>
						</li>';
				}
			?>
		</ul>
	</div>
	<div class="rpanel-bottom"> <a href="siteler">TÜMÜNÜ GÖRÜNTÜLE </a> </div>
</div>