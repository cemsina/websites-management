<?php 
include("config.php");
include("manage/model.php");
include("functions.php");
include("header.php");
?>
 <!-- page content -->
<div class="right_col" role="main">
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
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
						$myWebsites = getModels("user_website_percentage","user_id='".$activeUser->id."'");
						foreach($myWebsites as $myWebsite){
							$website = new model("websites");
							$website->select_id($myWebsite->obj["website_id"]);
							
							echo '
							<tr>
								<th scope="row">'.$website->id.'</th>
								<td>'.$website->obj["url"].'</td>
								<td><a href="view_website.php?id='.$website->id.'" class="btn btn-info">Görüntüle</button></td>
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
</div>
<!-- /page content -->
<?php include("footer.php"); ?>