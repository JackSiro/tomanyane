<?php 
	$as_pageinfo = array();
	$as_pageinfo['pageTitle'] = "New Site User";
	$as_pageinfo['pageAction'] = "Add a New Site User";
	$as_pageinfo['formAction'] = "?as_request=user_new";

	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
						
	if (as_clicked('CancelPost')) {
		header( "Location: ".as_adminUrl."?as_request=user_all");
					
	} else if (as_clicked('PostAndClose')) {
		as_add_new_user();			
		header( "Location: ".as_adminUrl."?as_request=user_all");
					
	} else if (as_clicked('PostAndAdd')) {
		as_add_new_user();			
		header( "Location: ".as_adminUrl."?as_request=user_all");
					
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
            <li><a href="#">Site Users</a></li>
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
                  <h3 class="box-title">Add a New Site User</h3>
                </div>

                <form role="form" method="post" name="PostUser" action="<?php echo $as_pageinfo['formAction'] ?>" enctype="multipart/form-data">
                  <div class="box-body">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
							 <div class="col-md-6">
								<div class="form-group">
								  <label for="user_fname">First Name *</label>
								  <input type="text" class="form-control" name="user_fname">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
								  <label for="user_sname">Second Name *</label>
								  <input type="text" class="form-control" name="user_sname">
								</div>
							</div>								
						  </div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="row">
							 <div class="col-md-6">
								<div class="form-group">
								  <label for="user_sex">Sex *</label>								  
								  <div class="row">
									<div class="col-md-4">
										<div class="form-group">
										  <input type="radio" name="user_sex" value="1" checked> Male
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="form-group">
										  <input type="radio" name="user_sex" value="2" > Female
										</div>
									</div>	
									
									<div class="col-md-4">
										<div class="form-group">
										  <input type="radio" name="user_sex" value="0" > Other
										</div>
									</div>
								  </div>
								  
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
								  <label for="user_mobile">Mobile *</label>
								  <input type="text" class="form-control" name="user_mobile">
								</div>
							</div>								
						  </div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="row">
							 <div class="col-md-6">
								<div class="form-group">
								  <label for="user_location">User Location *</label>
								  <input type="text" class="form-control" name="user_location">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
								  <label for="user_avatar">User Avatar *</label>
								  <input class="form-control" name="user_avatar" type="file" accept="image/*">
								</div>
							</div>								
						  </div>
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12">
							<div class="row">
							 <div class="col-md-6">
								<div class="form-group">
								  <label for="user_email">Email Address *</label>
								  <input type="email" class="form-control" name="user_email">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
								  <label for="user_name">Preffered Username *</label>
								  <input type="text" class="form-control" name="user_name">
								</div>
							</div>								
						  </div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="row">
							 <div class="col-md-6">
								<div class="form-group">
								  <label for="user_password">Preffered Password *</label>
								  <input type="password" class="form-control" name="user_password">
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
								  <label for="user_password2">Confirm Password *</label>
								  <input type="password" class="form-control" name="user_password2">
								</div>
							</div>								
						  </div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="row">
							 <div class="col-md-6">
								<div class="form-group">
								  <label for="user_group">User Group *</label>
								  <select class="form-control" name="user_group">
									<option value="0">Kenyan</option>
									<option value="1">Administrator</option>
								  </select>
								</div>
							</div>
							
							<div class="col-md-6">
								<div class="form-group">
								  <label for="user_level">User Level *</label>
								  <select class="form-control" name="user_level">
									<option value="0">User</option>
									<option value="1">Editor</option>
									<option value="2">Expert</option>
									<option value="3">Manager</option>
									<option value="4">Admin</option>
									<option value="5">Super-Admin</option>
								  </select>
								</div>
							</div>								
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
										<input name="SaveClose" class="btn btn-primary" style="float:right;" type="submit" class="form-control" value="Save & Close" />
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<input name="SaveAdd" class="btn btn-primary" type="submit" class="form-control" value="Save & Add" />
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
<?php include AS_CONT."admin/theme_bottom.php"; ?>
