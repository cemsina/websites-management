<?php 
include("config.php");
include("manage/model.php");
include("functions.php");
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
			  <?php if($activeUser->obj["isAdmin"] == true){ ?>
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
			  <?php } ?>
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