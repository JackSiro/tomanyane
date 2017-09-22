<?php 
	$as_pageinfo = array();
	$as_pageinfo['pageTitle'] = "Custom Pages";
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
	$database = new As_Dbconn();
	$as_pageid = isset( $_GET['as_pageid'] ) ? $_GET['as_pageid'] : "";			
	$as_db_query = "SELECT * FROM as_page WHERE pageid = '$as_pageid'";
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $pageid, $page_homepage, $page_title, $page_content, $page_slug, $page_state, $page_views, $page_created, $page_createdby, $page_updated, $page_updatedby) = $database->get_row( $as_db_query );
				
	}
	$as_pageinfo['pageAction'] = "Page View";
	$as_pageinfo['formAction'] = "?as_request=page_view&&as_pageid=".$as_pageid;
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
	
	$fielderrors = array();
	$inpageid = as_post_text('pageid');
	$inpagetitle = as_post_text('pagetitle');
	$inpageslug = as_post_text('pageslug');
	$inpagecontent = as_post_text('pagecontent');
	$inpagehome = as_post_text('pageishome');
	if (as_clicked('UpdateItem')) {
		$Update_Page_Details = array(
			'page_title' => $inpagetitle,
			'page_slug' => $inpageslug,
			'page_content' => $inpagecontent,
			'page_homepage' => $inpagehome,
		    'page_updated' => date('Y-m-d H:i:s'),
		);
		$where_clause = array('pageid' => $inpageid);
		$updated = $database->as_update( 'as_page', $Update_Page_Details, $where_clause, 1 );
		if( $updated )	{	}			
		header( "Location: ".as_adminUrl."?as_request=page_view&&as_pageid=".$inpageid);
	} else if (as_clicked('UnpublishItem')) {
		$Update_Page_Details = array(
			'page_title' => $inpagetitle,
			'page_slug' => $inpageslug,
			'page_content' => $inpagecontent,
			'page_state' => 2,
			'page_homepage' => $inpagehome,
		    'page_updated' => date('Y-m-d H:i:s'),
		);
		$where_clause = array('pageid' => $inpageid);
		$updated = $database->as_update( 'as_page', $Update_Page_Details, $where_clause, 1 );
		if( $updated )	{	}			
		header( "Location: ".as_adminUrl."?as_request=page_view&&as_pageid=".$inpageid);
	} else if (as_clicked('DeleteItem')) {
		$Update_Page_Details = array(
			'page_title' => $inpagetitle,
			'page_slug' => $inpageslug,
			'page_content' => $inpagecontent,
			'page_state' => 3,
			'page_homepage' => $inpagehome,
		    'page_updated' => date('Y-m-d H:i:s'),
		);
		$where_clause = array('pageid' => $inpageid);
		$updated = $database->as_update( 'as_page', $Update_Page_Details, $where_clause, 1 );
		if( $updated )	{	}			
		header( "Location: ".as_adminUrl."?as_request=page_all");
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
            <div class="col-md-3">
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive" src="as_media/posts/as_page.png" alt="Page Icon">
                  <h3 class="profile-username text-center"><?php echo $page_title ?></h3>
                  <p class="text-muted text-center"><?php echo as_get_itemState($page_state) ?></p>
				  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Created:</b> <a class="pull-right"><?php echo as_timeago_now($page_created) ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Updated:</b> <a class="pull-right"><?php echo as_timeago_now($page_updated) ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Views</b> <a class="pull-right"><?php echo $page_views ?></a>
                    </li>
                  </ul>
				  <a href="#" class="btn btn-primary btn-block"><b><?php echo as_get_itemState($page_state) ?></b></a>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
             
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Page View</a></li>
                  <li><a href="#settings" data-toggle="tab">Update Page</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <div class="post">
						<h4><a href="#"><?php echo $page_title ?></a> </h4>						
					</div>
                    <div class="post">
						<h5><a href="#"><?php echo $page_content ?></a></h4>
					</div>
                  </div> 
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" role="form" method="post" name="PostPage" action="<?php echo $as_pageinfo['formAction'] ?>" enctype="multipart/form-data">
                       <input type="hidden" name="pageid" value="<?php echo $pageid ?>"/>
					  <div class="form-group col-sm-12">
                        <label for="inputName" class="control-label">Page Title: </label>
                        <input type="text" class="form-control" id="inputName" name="pagetitle" value="<?php echo $page_title ?>"/>
                      </div>
					  <div class="form-group col-sm-12">
                        <label for="inputName" class="control-label">Page Slug (used in url generation): </label>
                        <input type="text" class="form-control" id="inputName" name="pageslug" value="<?php echo $page_slug ?>"/>
                      </div>
					  <div class="form-group col-sm-12">
                        <label for="inputName" class="control-label">Page Content: </label>
                        <textarea class="form-control input-lg" name="pagecontent" id="full_post"><?php echo $page_content ?></textarea>
                      </div>
					  <div class="form-group col-sm-12">
                        <label for="inputName" class="col-sm-2 control-label">Is Homepage: </label>
                        <div class="col-sm-10">
                          <select class="form-control" id="inputName" name="pageishome"/>
							<option value="<?php echo $page_homepage ?>"><?php echo as_is_homepage($page_homepage) ?></option>
							<option value="0">False</option>
							<option value="1">True</option>
						  </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input type="submit" class="btn_submit btn btn-primary" value="Update Page" name="UpdateItem" />
                          <input type="submit" class="btn_submit btn btn-danger" value="Unpublish Page" name="UnpublishItem" />
                          <input type="submit" class="btn_submit btn btn-danger" value="Delete Page" name="DeleteItem" />
                        </div>
                      </div>
					  
                    </form>
                  </div><!-- /.tab-pane -->
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