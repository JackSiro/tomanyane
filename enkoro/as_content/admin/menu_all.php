<?php 
	$as_pageinfo = array();
	$as_pageinfo['pageTitle'] = "Site Menu";
	$as_pageinfo['pageAction'] = "All Menus";
	
	$database = new As_Dbconn();					
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
											
	include AS_CONT."admin/theme_header.php";
?>
      <aside class="main-sidebar">
        <section class="sidebar">
			<?php include AS_CONT."admin/theme_leftsidebar.php"; ?>
		</section>
      </aside>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            <?php echo 'Administrator | <small style="text-transform:uppercase">'.$pageAction.'</small>' ?>
          </h1>
          <ol class="breadcrumb">            
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><?php echo $as_pageinfo['pageTitle'] ?></a></li>
            <li class="active"><?php echo $as_pageinfo['pageAction'] ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
             
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $as_pageinfo['pageAction'].' on '.as_siteTitle ?></h3>
                  <div class="box-tools pull-right">
                    <a href="?as_request=menu_new" class="btn btn-box-tool"><i class="fa fa-plus"></i></a>
                    <a href="#" class="btn btn-box-tool" ><i class="fa fa-trash"></i></a>
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                  <?php 
					$as_db_query = "SELECT * FROM as_menu WHERE menu_state =1";
					$results = $database->get_results( $as_db_query );
					?>
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>State</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Items</th>
                          <th>Created</th>
                          <th>Updated</th>
                        </tr>
                      </thead>
					<tbody>
                    <?php foreach( $results as $menu ) { ?>
		        <tr onclick="location='?as_request=menu_view&&as_menuid=<?php echo $menu['menuid'] ?>'">
		          <td><?php echo as_get_itemState($menu['menu_state']) ?></td>
		          <td><?php echo $menu['menu_title'] ?></td>
                  <td><?php echo $menu['menu_content'] ?></td>
                  <td><?php echo as_total_menu_menuitems($menu['menuid']) ?></td>
		          <td><?php echo as_timeago_now($menu['menu_created']) ?></td>
		          <td><?php echo as_timeago_now($menu['menu_updated']) ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="box-footer clearfix">
                  <a href="?as_request=menu_new" class="btn btn-sm btn-info btn-flat pull-left">Add New Site Menu</a>
                </div>
              </div>
            
			</div>
	
			
          </div>
        </section>
      </div>


<?php include AS_CONT."admin/theme_footer.php"; ?>
<!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>

<?php include AS_CONT."admin/theme_control_sidebar.php"; ?>
</ul>
          </div>

<?php include AS_CONT."admin/theme_settings_tab.php"; ?>
</div>
      </aside>
      <div class="control-sidebar-bg"></div>

    </div>
<?php include AS_CONT."admin/theme_bottom.php"; ?>

