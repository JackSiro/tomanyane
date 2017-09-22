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
            <li><a href="#">Locations</a></li>
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
                  <h3 class="box-title">Add a New Location</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" name="PostLocation" action="<?php echo $as_pageinfo['formAction'] ?>">
                  <div class="box-body">
				  
					<div class="form-group">
                      <label for="Title">Name of the Location *</label>
                      <input type="text" class="form-control" name="title">
                    </div>
				  
                                        <div class="form-group">
						
						<label for="filename">Upload an Icon (5MB max) *</label>
						<input class="form-control" name="filename" type="file" accept="image/*">
						
					</div>	
					<div class="form-group">
						<label for="description">Describe the Location (500 max) *</label>
						<textarea name="content" class="form-control"  /></textarea>
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
										<input name="ResetLocation" class="btn btn-primary" type="reset" class="form-control" value="Reset This" />
									</div>
								</div>
								
							   </div>
							</div>
							
							<div class="col-md-6">
								<div class="row">
								 <div class="col-md-6">
									<div class="form-group">
										<input name="PostLocation" class="btn btn-primary" style="float:right;" type="submit" class="form-control" value="Save & Close" />
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<input name="PostLocationAdd" class="btn btn-primary" type="submit" class="form-control" value="Save & Add" />
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
