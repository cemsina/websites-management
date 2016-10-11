<?php 
include("config.php");
include("manage/model.php");
include("functions.php");
include("header.php");
?>
 <!-- page content -->
<div class="right_col" role="main">
<script src="gentelella/vendors/Chart.js/dist/Chart.min.js"></script>
	<?php 
	$userWebSites = getModels("user_website_percentage","user_id='".$activeUser->id."'");
	foreach ($userWebSites as $userWebSite){
		$website = new model("websites");
		$website->select_id($userWebSite->obj["website_id"]);
	?>
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="x_panel">
			  <div class="x_title">
				<h2><?php echo $website->obj["url"]; ?> Son 1 Ay</h2>
				<div id="toplam" style="float:right;"></div>
				<div class="clearfix"></div>
			  </div>
			  <div class="x_content">
				<table class="table table-striped">
				  <thead>
					<tr>
					  <th>Tarih</th>
					  <th>Sitenin kazancı</th>
					  <th>Payınız</th>
					</tr>
				  </thead>
				  <tbody>
				  <?php 
				  $websiteData = getModels("website_data","website_id='".$website->id."' and data_date >= ( CURDATE( ) - INTERVAL 1 MONTH ) and data_date <= (CURDATE( ))");
				  $total = 0;
				  $dateArray = array();
				  $dataArray = array();
				  foreach($websiteData as $d){
					  $user_part = (floor($d->obj["the_data"] * $userWebSite->obj["percent"])/100);
					  echo '<tr>
					  <td>'.$d->obj["data_date"].'</td>
					  <td>'.$d->obj["the_data"].'</td>
					  <td>'.$user_part.'</td>
					  </tr>
					  ';
					  $total += $user_part;
					  $dateArray[] = $d->obj["data_date"];
					  $dataArray[] = $d->obj["the_data"];
				  }
				  ?>
				  </tbody>
				</table>
				<?php echo "<div style=\"text-align:right;\"><b>Toplam Payınız : $total</b></div>"; ?>
			  </div>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2><?php echo $website->obj["url"]; ?> Son 1 Ay Grafiği</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<canvas id="website-<?php echo $website->id; ?>"></canvas>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		var ctx = document.getElementById("website-<?php echo $website->id; ?>");
		var lineChart = new Chart(ctx, {
		type: 'line',
		data: {
		  labels: <?php echo json_encode($dateArray);?>,
		  datasets: [{
			label: "Son 1 ay Grafiği",
			backgroundColor: "rgba(38, 185, 154, 0.31)",
			borderColor: "rgba(38, 185, 154, 0.7)",
			pointBorderColor: "rgba(38, 185, 154, 0.7)",
			pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
			pointHoverBackgroundColor: "#fff",
			pointHoverBorderColor: "rgba(220,220,220,1)",
			pointBorderWidth: 1,
			data: <?php echo json_encode($dataArray);?>
		  }]
		},
		});
		</script>
	</div>
	<?php } ?>
</div>
<!-- /page content -->
<?php include("footer.php"); ?>