<?php 
include("config.php");
include("manage/model.php");
include("functions.php");
adminOnlyPage();
include("header.php");
?>
 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Websiteler</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>#id</th>
                          <th>URL</th>
                          <th>İşlem</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php 
						$websites = getModels("websites");
						foreach($websites as $website){
							echo '
							<tr>
								<th scope="row">'.$website->id.'</th>
								<td>'.$website->obj["url"].'</td>
								<td><a href="website_manage.php?id='.$website->id.'" class="btn btn-info">Düzenle/Görüntüle</button></td>
							</tr>
							';
						}
						?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
			  <div class="col-md-6 col-sm-6 col-xs-12">
			  <div class="x_panel">
                  <div class="x_title">
                    <h2>Websitesi ekle</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="cemsina-ajax-form" data-request="website_add.php" onsubmit="return false;" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">URL 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="url" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Açıklama 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea cols="30" rows="10" name="description" class="form-control col-md-7 col-xs-12"></textarea>
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
            </div>
</div>
<!-- /page content -->
<?php include("footer.php"); ?>