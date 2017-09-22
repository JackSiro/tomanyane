<?php 
	$database = new As_Dbconn();
	$as_pageinfo = array();
	$as_pageinfo['pageTitle'] = "Site Settings";
	$as_pageinfo['pageAction'] = "General Settings";
	$as_pageinfo['formAction'] = "?as_request=settings_general";
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
	$fielderrors = array();
	if (as_clicked('SettingsGeneral')) {
		as_set_option('as_sitename', as_post_text('set_sitename'), $as_loginid);
		as_set_option('as_siteurl', as_post_text('set_siteurl'), $as_loginid);
		as_set_option('as_tagline', as_post_text('set_tagline'), $as_loginid);
		as_set_option('as_keywords', as_post_text('set_keywords'), $as_loginid);
		as_set_option('as_description', as_post_text('set_description'), $as_loginid);
		
		$filename = "as_config.php";			
		$lines = file($filename, FILE_IGNORE_NEW_LINES );
		$lines[29] = '	define( "as_urlExt", "'.as_post_text('set_urlext').'" );';
		//$lines[30] = '	define( "as_maintainance", "'.as_post_text('set_maintanance').'" );';
		file_put_contents($filename, implode("\n", $lines));
		as_new_option('as_urlext', '', 1);		
		header( "Location: ".as_adminUrl."?as_request=settings_general");
	} 
	include AS_CONT."admin/theme_header.php";
?>
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
			<?php include AS_CONT."admin/theme_leftsidebar.php"; ?>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo 'Administrator | <small style="text-transform:uppercase">'.$as_pageinfo['pageTitle'].'</small>' ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><?php echo $as_pageinfo['pageTitle'] ?></a></li>
            <li class="active"><?php echo $as_pageinfo['pageAction'] ?></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#general_settings" data-toggle="tab">General Settings</a></li>
                  <li><a href="#other_settings" data-toggle="tab">Other Settings</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="general_settings">
                    <form class="form-horizontal" role="form" method="post" name="PostPage" action="<?php echo $as_pageinfo['formAction'] ?>" enctype="multipart/form-data">
						<div class="form-group col-sm-12">
                        <label for="inputName" class="control-label">Site Name: </label>
                        <input type="text" class="form-control" id="inputName" name="set_sitename" value="<?php echo as_get_option('as_sitename') ?>"/>
                      </div>
					  <div class="form-group col-sm-12">
                        <label for="inputName" class="control-label">Site Address: </label>
                        <input type="text" class="form-control" id="inputName" name="set_siteurl" value="<?php echo as_get_option('as_siteurl') ?>"/>
                      </div>
					  <div class="form-group col-sm-12">
                        <label for="inputName" class="control-label">Site Tagline: </label>
                        <textarea class="form-control" name="set_tagline"><?php echo as_get_option('as_tagline') ?></textarea>
                      </div>
					  <div class="form-group col-sm-12">
                        <label for="inputName" class="control-label">Site Keywords (separated by commas: </label>
                        <textarea class="form-control" name="set_keywords"><?php echo as_get_option('as_keywords') ?></textarea>
                      </div>					  
					  <div class="form-group col-sm-12">
                        <label for="inputName" class="control-label">Site Description: </label>
                        <textarea class="form-control" style="height:100px;" name="set_description"><?php echo as_get_option('as_description') ?></textarea>
                      </div>
					  <div class="form-group col-sm-12">
                        <label for="inputName" class="control-label">Site Url Extension (.php, .html, .aspx, .js): </label>
						<input type="text" class="form-control" id="inputName" name="set_urlext" value="<?php echo as_urlExt ?>"/>
                      </div>
					  <div class="form-group col-sm-12">
                        <label for="inputName" class="control-label">Maintainance Mode: </label>
                        <select class="form-control" id="inputName" name="set_maintanance"/>
							<option value="<?php echo $page_homepage ?>">Disabled<?php //echo as_is_homepage($page_homepage) ?></option>
							<option value="0">Disable</option>
							<option value="1">Enable</option>
						  </select>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input name="SettingsGeneral" class="btn btn-primary form-control" type="submit" value="Save Settings" />
                        </div>
                      </div>
                    </form>
                  </div>
				  <div class="tab-pane" id="other_settings">
				  </div>
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
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