<?php 
include("config.php");
include("manage/model.php");
$user = new model("users");
if(isset($_COOKIE["userID"])){
	$_id = $_COOKIE["userID"];
	$user->select_id($_id);
}
if($user->obj != null){header("Location: index.php");die();}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gentellela Alela! | </title>
    <link href="gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="gentelella/vendors/animate.css/animate.min.css" rel="stylesheet">
    <link href="gentelella/build/css/custom.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>
      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="login_form">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default" onclick="login();" id="login_button">Log in</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> TEST</h1>
                  <p>©2016 TEST</p>
				  <p>Admin Template by <a href="https://colorlib.com">Colorlib</a></p> <p>Programming by <a href="https://cemsina.com">Cemsina Güzel</a></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
	<div id="status" class="modal fade" role="dialog">
		  <div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"></h4>
			  </div>
			  <div class="modal-body"></div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
			  </div>
			</div>
		  </div>
	</div>
  </body>
</html>
