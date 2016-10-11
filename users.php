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
              <div class="col-md-12 col-sm-12 col-xs-12">
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
                          <th>Ad Soyad</th>
                          <th>Kullanıcı Adı</th>
                          <th>E-mail</th>
                          <th>İşlem</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php 
						$users = getModels("users");
						foreach($users as $user){
							echo '
							<tr>
								<th scope="row">'.$user->obj["id"].'</th>
								<td>'.$user->obj["name"].' '.$user->obj["surname"].'</td>
								<td>'.$user->obj["username"].'</td>
								<td>'.$user->obj["email"].'</td>
								<td><a href="user_manage.php?id='.$user->obj["id"].'" class="btn btn-primary">Düzenle</a></td>
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
                    <h2>Kullanıcı Ekle</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br>
                    <form id="cemsina-ajax-form" onsubmit="return false;" data-request="add_user.php" class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ad
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Soyad 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="surname" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="username" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">E-Mail 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="last-name" name="email" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Şifre
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
                            <option value="0" selected>Hayır</option>
                            <option value="1">Evet</option>
                          </select>
						</div>
					  </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a id="cemsina-ajax-submit" onclick="cemsinaAjaxRequest('cemsina-ajax-form');" class="btn btn-success">Ekle</a>
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