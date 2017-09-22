<?php 
	$as_pageinfo = array();
	$as_pageinfo['pageTitle'] = "New Page";
	$as_pageinfo['pageAction'] = "Add a New Page";
	$as_pageinfo['formAction'] = "?as_request=page_new";
	$database = new As_Dbconn();
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
	
	if (as_clicked('CancelPost')) {
		header( "Location: ".as_adminUrl."?as_request=page_all");
	} else if (as_clicked('PostAndClose')) {
		as_add_new_page();			
		header( "Location: ".as_adminUrl."?as_request=page_all");
	} else if (as_clicked('PostAndAdd')) {
		as_add_new_page();			
		header( "Location: ".as_adminUrl."?as_request=page_new");
	}
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
			<div class="col-md-4">
				<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recent Pages</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
				<?php 
					$as_db_query = "SELECT * FROM as_page WHERE page_state =1";
					$results = $database->get_results( $as_db_query );
					?>
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <?php foreach( $results as $row ) { ?>
					<li><b><?php echo $row['page_title'] ?></b>
					<hr class="hor_ln"><li>
					<?php } ?><br>
				  </ul>
                </div>
                <div class="box-footer text-center">
                  <a href="as_categories.php" class="uppercase">View All Pages</a>
                </div>
              </div>
			</div>
            <div class="col-md-8">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $as_pageinfo['pageAction'].' on '.as_siteTitle ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" name="PostNow" action="<?php echo $as_pageinfo['formAction'] ?>" enctype="multipart/form-data">
                  <div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label for="page_title">Title of the Page *</label>
							  <input type="text" class="form-control" name="page_title" required>
							</div>
						</div>
					</div>
					
					<input type="hidden" name="page_user" id="loginid" value="<?php echo $as_loginid ?>">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label for="page_title">Page Slug (for Url generation) *</label>
							  <input type="text" class="form-control" name="page_slug" required>
							</div>
						</div>
					</div>
					
					<div class="row">
                      <div class="col-lg-12">                     
						<div class="form-group">
							<label for="page_content">Page Content</label>
							<textarea class="form-control input-lg" name="page_content" id="full_post"></textarea>
						</div>					
                    </div>                    
                  </div>
					<div class="box-footer">			
						<div class="row">
							 <div class="col-md-6">
								<div class="row">
								 <div class="col-md-6">
									<div class="form-group">
										<input name="CancelPost" class="btn btn-primary form-control" style="float:right;" type="submit" value="Cancel This" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input name="ResetPost" class="btn btn-primary form-control" type="reset" value="Reset This" />
									</div>
								</div>
							   </div>
							</div>
							<div class="col-md-6">
								<div class="row">
								 <div class="col-md-6">
									<div class="form-group">
										<input name="PostAndClose" class="btn btn-primary form-control" style="float:right;" type="submit" value="Save & Close" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input name="PostAndAdd" class="btn btn-primary form-control" type="submit" value="Save & Add" />
									</div>
								</div>
							   </div>
							</div>
						</div>	
					</div>
                    </form>                      			
                  </div><!-- /.box-body -->
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
