		<div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo as_siteUrl.'/as_media/avata/'.$user_avatar ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $user_fname.' '.$user_sname ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
             <li><a href="<?php echo as_adminUrl ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i><span>Site Members</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo as_adminUrl ?>?as_request=new_user"><i class="fa fa-plus"></i> New Member</a></li>
                <li><a href="<?php echo as_adminUrl ?>?as_request=user_all"><i class="fa fa-circle-o"></i> Site Members</a></li>
                <li><a href="<?php echo as_adminUrl ?>?as_request=user_admin"><i class="fa fa-circle-o"></i>Administrators</a></li>
                <li><a href="<?php echo as_adminUrl ?>?as_request=user_department"><i class="fa fa-circle-o"></i> Departments</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i><span>Complains</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo as_adminUrl ?>?as_request=complain_new"><i class="fa fa-plus"></i> New Complain</a></li>
                <li><a href="<?php echo as_adminUrl ?>?as_request=complain_all"><i class="fa fa-circle-o"></i> View Complains</a></li>
				<li><a href="<?php echo as_adminUrl ?>?as_request=complain_category_new"><i class="fa fa-plus"></i> New Category</a></li>
                <li><a href="<?php echo as_adminUrl ?>?as_request=complain_category_all"><i class="fa fa-circle-o"></i> View Categories</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i><span>Navigation</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo as_adminUrl ?>?as_request=menu_new"><i class="fa fa-plus"></i> New Menu</a></li>
                <li><a href="<?php echo as_adminUrl ?>?as_request=menu_all"><i class="fa fa-circle-o"></i> View Menus</a></li>
                <li><a href="<?php echo as_adminUrl ?>?as_request=menuitem_new"><i class="fa fa-plus"></i> New Menu Item</a></li>
                <li><a href="<?php echo as_adminUrl ?>?as_request=menuitem_all"><i class="fa fa-circle-o"></i> View Menu Items</a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i><span>Custom Pages</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo as_adminUrl ?>?as_request=page_new"><i class="fa fa-plus"></i> New Page</a></li>
                <li><a href="<?php echo as_adminUrl ?>?as_request=page_all"><i class="fa fa-circle-o"></i> View Pages</a></li>
              </ul>
            </li>
			<li class="treeview">
              <a href="#">
                <i class="fa fa-dashboard"></i><span>Site Settings</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?php echo as_adminUrl ?>?as_request=settings_general"><i class="fa fa-plus"></i> General Settings</a></li>
                <li><a href="<?php echo as_adminUrl ?>?as_request=settings_slideshow"><i class="fa fa-circle-o"></i> SlideShow Setttings</a></li>
                <li><a href="<?php echo as_adminUrl ?>?as_request=settings_widghets"><i class="fa fa-circle-o"></i> Widghets</a></li>
                <li><a href="<?php echo as_adminUrl ?>?as_request=settings_countries"><i class="fa fa-circle-o"></i> Countries Settings</a></li>
              </ul>
            </li>
            <li class="header">OTHER LINKS</li>
            
			<li><a href="<?php echo as_siteUrl ?>" target="_blank"><i class="fa fa-angle-right text-aqua"></i> <span>Go to Main Site</span></a></li>
			<li><a href="<?php echo as_adminUrl ?>as_site.php?as_request=error_report"><i class="fa fa-circle-o text-yellow"></i> <span>Error Reports</span></a></li>
			<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Help Information</span></a></li>
      </ul>