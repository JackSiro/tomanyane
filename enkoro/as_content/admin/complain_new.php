<?php 
	$as_pageinfo = array();
	$as_pageinfo['pageTitle'] = "New Complain";
	$as_pageinfo['pageAction'] = "Add a New Complain";
	$as_pageinfo['formAction'] = "?as_request=complain_new";

	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
				
	if (as_clicked('CancelPost')) {
		header( "Location: ".as_adminUrl."?as_request=complain_all");
	} else if (as_clicked('PostAndClose')) {
		as_add_new_complain();			
		header( "Location: ".as_adminUrl."?as_request=complain_all");
	} else if (as_clicked('PostAndAdd')) {
		as_add_new_complain();			
		header( "Location: ".as_adminUrl."?as_request=complain_new");
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
            <li><a href="#">Stories</a></li>
            <li class="active"><?php echo $pageTitle ?></li>
          </ol>
        </section>

        <section class="content">
         
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
             
			  <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Add a New Complain</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" name="PostNow" action="<?php echo $as_pageinfo['formAction'] ?>" enctype="multipart/form-data">
                  <div class="box-body">
				  
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label for="complain_title">Title of the Complain *</label>
							  <input type="text" class="form-control" name="complain_title">
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label for="complain_category">Category *</label>
							  <select class="form-control" name="complain_category">
							  <?php echo as_select_category_complains() ?>	
							  </select>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <label for="complain_location">Location *</label>
								<input type="text" class="form-control" name="complain_location" placeholder="Nairobi, Kenya">
							</div>
						</div>
					</div>
					
				  <div class="row">
                    <div class="col-lg-12">
						<input type="hidden" name="posting_by" value="<?php echo $as_loginid ?>">
						<div class="form-group">
							<label for="complain_summary">Summary of the Complain</label>
							<textarea name="complain_summary" class="form-control"  /></textarea>
						</div>
					</div>
					</div>
					<div class="row">
                    <div class="col-lg-12">                     
						<div class="form-group">
							<label for="complain_content">Complain description</label>
							<textarea class='form-control input-lg' name='complain_content' id='full_post'></textarea>
						</div>					
                    </div>                    
                  </div>
				  
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
							  <input type="text" class="form-control" name="complain_complainer" placeholder="Kenyan">
							  <select class="form-control" name="complain_complainerid">
								<option value="0"> Select Kenyan </option>
								<?php echo as_select_complainer() ?>
							  </select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">		
							<div class="form-group">						
								<label for="complain_img">Upload an Image (5MB max) *</label>
								<input class="form-control" name="complain_img" accept="image/*" type="file" multiple="true">
							</div>
						</div>
					</div>
										
					<div class="box-footer">			
						<div class="row">
							 <div class="col-md-6">
								<div class="row">
								 <div class="col-md-6">
									<div class="form-group">
										<input name="CancelPost" class="btn btn-primary" style="float:right;" type="submit" class="form-control" value="Cancel This" />
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<input name="ResetPost" class="btn btn-primary" type="reset" class="form-control" value="Reset This" />
									</div>
								</div>
								
							   </div>
							</div>
							
							<div class="col-md-6">
								<div class="row">
								 <div class="col-md-6">
									<div class="form-group">
										<input name="PostAndClose" class="btn btn-primary" style="float:right;" type="submit" class="form-control" value="Save & Close" />
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<input name="PostAndAdd" class="btn btn-primary" type="submit" class="form-control" value="Save & Add" />
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

