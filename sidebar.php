<!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
			  <div class="clearfix"></div>
                <ul class="nav side-menu">
				<?php if($activeUser->obj["isAdmin"] == true){ ?>
                  <li><a href="users.php"><i class="fa fa-users"></i> Kullanıcılar </a></li>
                  <li><a href="websites.php"><i class="fa fa-clone"></i> Websiteler </a></li>
				<?php } ?>
                  <li><a href="my_websites.php"><i class="fa fa-bar-chart-o"></i> Website Verileri</a></li>
				</ul>
              </div>

            </div>
            <!-- /sidebar menu -->