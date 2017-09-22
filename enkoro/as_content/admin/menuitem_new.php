<?php 
	$as_pageinfo = array();
	$as_pageinfo['pageTitle'] = "New Menu Item";
	$as_pageinfo['pageAction'] = "Add a New Menu Item";
	$as_pageinfo['formAction'] = "?as_request=menuitem_new";
	$database = new As_Dbconn();
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
	
	if (as_clicked('CancelPost')) {
		header( "Location: ".as_adminUrl."?as_request=menuitem_all");
	} else if (as_clicked('PostAndClose')) {
		as_add_new_menuitem();			
		header( "Location: ".as_adminUrl."?as_request=menuitem_all");
	} else if (as_clicked('PostAndAdd')) {
		as_add_new_menuitem();			
		header( "Location: ".as_adminUrl."?as_request=menuitem_new");
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
                  <h3 class="box-title">Recent Menu Items</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
				<?php 
					$as_db_query = "SELECT * FROM as_menu_item WHERE menuitem_state =1";
					$results = $database->get_results( $as_db_query );
					?>
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <?php foreach( $results as $row ) { ?>
					<li class="list_items"><h4><?php echo $row['menuitem_title'].' ('.as_type_of_link($row['menuitem_type']).')' ?></h4>
					<a href="<?php echo as_type_of_linkshow($row['menuitem_type'], $row['menuitem_link']) ?>" target="_blank"><?php echo $row['menuitem_link'] ?></a><li>
					<?php } ?><br>
				  </ul>
                </div>
                <div class="box-footer text-center">
                  <a href="?as_request=menuitem_all" class="uppercase">View All MenuItems</a>
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
							  <label for="menuitem_title">Title of the Menu Item *</label>
							  <input type="text" class="form-control" name="menuitem_title" placeholder="menu item title" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label for="menuitem_menu">Menu of the Menu Item *</label>
							  <select class="form-control" name="menuitem_menu" required>
							  <?php echo as_select_menu_menuitems() ?>	
							  </select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label for="menuitem_link">Link of the Menu Item *</label>
							  <h5>Current Type of Link: <b><span id="link_type">Normal Link</span></b> - 
							  <a onclick="document.getElementById('ExtraModal').style.display='block'" href="#"> Change Type </a>
							  </h5>

								<!-- The Modal -->
								<div id="ExtraModal" class="as_modal">
									
									<div class="box box-primary as_modal_content as_animate" >
										<div class="box-header with-border">
										  <h3 class="box-title">Choose Type of Link</h3>
										  <div class="box-tools pull-right">
											<span class="btn btn-box-tool" onclick="getChosenType(1)"  title="Close This Modal"><i class="fa fa-times"></i></span>
										  </div>
										</div>
										<div class="box-body">
										  <ul class="products-list product-list-in-box">
											<li><h2 class="btn btn-primary btn_choose" onclick="getChosenType(1)">Normal Link</h2></li>				
											<li><h2 class="btn btn-primary btn_choose" onclick="getChosenType(2)">External Link</h2></li>				
											<li><h2 class="btn btn-primary btn_choose" onclick="getChosenType(3)">Custom Page Link</h2></li>
										  </ul>
										</div>
									</div>
								</div>
								
							  <input type="hidden" name="menuitem_type" id="item_type" value="1">
							  <input type="hidden" name="menuitem_user" id="loginid" value="<?php echo $as_loginid ?>">
							  <input type="url" class="form-control" name="menuitem_link" id="external_link" placeholder="menu item link" style="display:none;" >
							  <select class="form-control" id="page_link" name="menuitem_page" style="display:none;" >
								<option value="0"> Select Page </option>
								<?php echo as_select_pages() ?>
							  </select>
							  <label for="menuitem_link" id="custom_link_opt" style="display:none;">Custom Link *</label>
							   <input type="text" class="form-control" name="menuitem_link" id="normal_link" placeholder="menu item link" >
						  </div>
						</div>
					</div>
					<div class="row">
                      <div class="col-lg-12">                     
						<div class="form-group">
							<label for="menuitem_content">Menu Item Description (Optional)</label>
							<textarea class='form-control' name='menuitem_content' ></textarea>
						</div>					
                    </div>                    
                  </div>
					<div class="box-footer">			
						<div class="row">
							 <div class="form-group">
								<div class="col-sm-12">
								  <input type="submit" class="btn_submit btn btn-info" value="Cancel This" name="CancelPost" />
								  <input type="reset" class="btn_submit btn btn-primary" value="Reset This" name="ResetPost" />
								  <input type="submit" class="btn_submit btn btn-success" value="Save & Close" name="PostAndClose" />
								  <input type="submit" class="btn_submit btn btn-warning" value="Save & Add" name="PostAndAdd" />
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
<script>
	// Get the modal
	var modal = document.getElementById('ExtraModal');
	
	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
	
	function getChosenType(tno){
		var typeshow;
		document.getElementById('ExtraModal').style.display='none';
		document.getElementById("item_type").value = tno;
		
		if (tno == 1) {
			typeshow = 'Normal Link';
			document.getElementById('normal_link').style.display='block';
			document.getElementById('custom_link_opt').style.display='none';
			document.getElementById('external_link').style.display='none';
			document.getElementById('page_link').style.display='none';
		} else if (tno == 2) {
			typeshow = 'External Link';
			document.getElementById('normal_link').style.display='none';
			document.getElementById('custom_link_opt').style.display='none';
			document.getElementById('external_link').style.display='block';
			document.getElementById('page_link').style.display='none';
		} else if (tno == 3) {
			typeshow = 'Page Link';
			document.getElementById('normal_link').style.display='block';
			document.getElementById('custom_link_opt').style.display='block';
			document.getElementById('external_link').style.display='none';
			document.getElementById('page_link').style.display='block';
		} else {
			typeshow = 'Normal Link';
			document.getElementById('normal_link').style.display='block';
			document.getElementById('custom_link_opt').style.display='none';
			document.getElementById('external_link').style.display='none';
			document.getElementById('page_link').style.display='none';
		}
		document.getElementById("link_type").innerHTML = typeshow;
		
	}
</script>