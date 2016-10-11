<?php 
include("config.php");
include("manage/model.php");
include("functions.php");
adminOnlyPage();
$user = new model("users");
$user->select_id($_GET["id"]+0);
if($user->obj == null){header("Location: users.php");die();}
include("header.php");

?>
 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $user->obj["name"]." ".$user->obj["surname"]; ?></h2>
					<div style="float:right">
					<a onclick="user_delete(<?php echo $user->obj["id"]; ?>)" class="btn btn-danger">Sil</a>
					</div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="cemsina-ajax-form" onsubmit="return false;" data-request="user_manage.php?id=<?php echo $user->id; ?>" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="name" value="<?php echo $user->obj["name"]; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Soyad 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="surname" value="<?php echo $user->obj["surname"]; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="username" value="<?php echo $user->obj["username"]; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">E-Mail 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="last-name" name="email" value="<?php echo $user->obj["email"]; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Yeni Şifre <small>(Değişmeyecekse boş bırakın)</small>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="last-name" name="password" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Admin
                        </label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" name="isAdmin">
                            <option value="0" <?php if($user->obj["isAdmin"] == false){echo "selected";} ?>>Hayır</option>
                            <option value="1" <?php if($user->obj["isAdmin"] == true){echo "selected";} ?>>Evet</option>
                          </select>
						</div>
					  </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a id="cemsina-ajax-submit" onclick="cemsinaAjaxRequest('cemsina-ajax-form');" class="btn btn-success">Submit</a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $user->obj["name"]." ".$user->obj["surname"]; ?> için websitesi ekle</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="cemsina-ajax-form-2" onsubmit="return false;" data-request="user_website_add.php?id=<?php echo $user->id; ?>" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Websitesi
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<select class="form-control" name="website_id">
								<?php 
								$websiteList = getModels("websites");
								foreach($websiteList as $website){
									echo '<option value="'.$website->obj["id"].'">'.$website->obj["url"].'</option>';
								}
								?>
							</select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Yüzde 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" name="percent" min="0" max="100" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a id="cemsina-ajax-submit" onclick="cemsinaAjaxRequest('cemsina-ajax-form-2');" class="btn btn-success">Submit</a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
			  </div>
			  <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kullanıcı Siteleri</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#id</th>
                          <th>URL</th>
                          <th>Yüzde</th>
                          <th>İşlem</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php 
						$oo = getModels("user_website_percentage","user_id='".$user->id."'");
						foreach($oo as $o){
							$website = new model("websites");
							$website->select_id($o->obj["website_id"]);
							echo '
							<tr>
								<th scope="row">'.$o->obj["id"].'</th>
								<td>'.$website->obj["url"].'</td>
								<td>'.$o->obj["percent"].'</td>
								<td><a onclick="cemsina_run_php(\'delete.php?id='.$o->obj["id"].'&from=user_website_percentage\')" class="btn btn-danger">Sil</button></td>
							</tr>
							';
						}
						?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
			<script src="gentelella/vendors/Chart.js/dist/Chart.min.js"></script>
	<?php 
	$userWebSites = getModels("user_website_percentage","user_id='".$user->id."'");
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