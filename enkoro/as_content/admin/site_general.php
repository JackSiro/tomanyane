<?php 
	
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
            <li><a href="#">Site</a></li>
            <li class="active"><?php echo $pageTitle ?></li>
          </ol>
        </section>

        <section class="content">
         
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
             
	      <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">General Site Settings</h3>
                </div>
                
                <form role="form" method="post" name="SiteSettings" action="<?php echo $as_pageinfo['formAction'] ?>">
                  <div class="box-body">
				  
					<div class="form-group">
                      <label for="title">Name of the Client's Site *</label>
                      <input type="text" class="form-control" name="sitename" value="<?php echo as_get_option('sitename') ?>">
                    </div>
					
					<div class="form-group">
                      <label for="keywords">Keywords of the Client's Site *</label>
                      <input type="text" class="form-control" name="keywords" value="<?php echo as_get_option('keywords') ?>">
                    </div>
								  
					<div class="form-group">
						<label for="description">Description of Client's Site *</label>
						<textarea name="description" class="form-control"  /><?php echo as_get_option('description') ?></textarea>
					</div>
					
					<div class="form-group">
                      <label for="siteurl">Url of the Client's Site *</label>
                      <input type="text" class="form-control" name="siteurl" value="<?php echo as_get_option('siteurl') ?>">
                    </div>
					
					<div class="form-group">
                      <label for="adminsite">Name of the Admin's Site *</label>
                      <input type="text" class="form-control" name="adminsite" value="<?php echo as_get_option('adminsite') ?>">
                    </div>
					
					<div class="form-group">
                      <label for="adminurl">Url of the Admin's Site *</label>
                      <input type="text" class="form-control" name="adminurl" value="<?php echo as_get_option('adminurl') ?>">
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
										<input name="GeneralSettings" class="btn btn-primary" type="submit" class="form-control" value="Save Changes" />
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

<?php include AS_CONT."admin/theme_rightsidebar.php"; ?>	
			
          </div>
        </section>
      </div>


<?php include AS_CONT."admin/theme_footer.php"; ?>
<?php include AS_CONT."admin/theme_bottom.php"; ?>
