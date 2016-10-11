<?php 
include("config.php");
include("manage/model.php");
include("functions.php");
adminOnlyPage();
$website = new model("websites");
$website->select_id($_GET["id"]+0);
if($website->obj == null){header("Location: websites.php");die();}
include("header.php");
?>
 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $website->obj["url"]; ?></h2>
					<div style="float:right">
					<a onclick="website_delete(<?php echo $website->id; ?>)" class="btn btn-danger">Sil</a>
					</div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="cemsina-ajax-form" onsubmit="return false;" data-request="website_manage.php?id=<?php echo $website->id; ?>" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">URL
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="url" value="<?php echo $website->obj["url"]; ?>" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Açıklama 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<textarea cols="30" rows="10" class="form-control col-md-7 col-xs-12" name="description"><?php echo $website->obj["description"]; ?></textarea>
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
                    <h2><?php echo $website->obj["url"]; ?> için veri ekle</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="cemsina-ajax-form-2" onsubmit="return false;" data-request="add_data.php?id=<?php echo $website->id; ?>" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tarih
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<input type="datetime-local" name="data_date" class="form-control col-md-7 col-xs-12"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Veri 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" step="any" name="the_data" class="form-control col-md-7 col-xs-12">
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
                    <h2>Kullanıcılar</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#id</th>
                          <th>Username</th>
                          <th>Yüzde</th>
                          <th>İşlem</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php 
						$oo = getModels("user_website_percentage","website_id='".$website->id."'");
						foreach($oo as $o){
							$user = new model("users");
							$user->select_id($o->obj["user_id"]);
							echo '
							<tr>
								<th scope="row">'.$o->id.'</th>
								<td>'.$user->obj["username"].'</td>
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
			  
			  <div class="col-md-12 col-sm-12 col-xs-12">
			  <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $website->obj["url"]; ?> verileri</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="data-list-form" onsubmit="return false;" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tarih (Başlangıç)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<input type="date" name="date_start" class="form-control col-md-7 col-xs-12"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tarih (Son)
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<input type="date" name="date_end" class="form-control col-md-7 col-xs-12"/>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a id="cemsina-ajax-submit" onclick="data_list('<?php echo $website->id; ?>');" class="btn btn-success">Listele</a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
			  </div>
			  <div class="col-md-12 col-sm-12 col-xs-12">
			  <div class="x_panel">
                  <div class="x_title">
                    <h2>Veri Sil</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form onsubmit="return false;" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Veri #id
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							<input type="number" id="data_id" class="form-control col-md-7 col-xs-12"/>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a onclick="delete_model('website_data',$('input#data_id').val());" class="btn btn-danger">Sil</a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
			  </div>
			  <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Veriler</h2>
					<div id="toplam" style="float:right;"></div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#id</th>
                          <th>Tarih</th>
                          <th>Tüm Veri</th>
                          <th>Payınız</th>
                        </tr>
                      </thead>
                      <tbody id="data-list"></tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
</div>
<!-- /page content -->
<?php include("footer.php"); ?>