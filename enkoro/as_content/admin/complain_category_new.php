<?php 		

	$as_pageinfo = array();
	$as_pageinfo['pageTitle'] = "New Complain Category";
	$as_pageinfo['pageAction'] = "Add a New Complain Category";
	$as_pageinfo['formAction'] = "?as_request=complain_category_new";
	
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
						
	if (as_clicked('CancelPost')) {
		header( "Location: ".as_adminUrl."?as_request=complain_category_all");
	} else if (as_clicked('PostAndClose')) {
		as_add_new_category();			
		header( "Location: ".as_adminUrl."?as_request=complain_category_all");
	} else if (as_clicked('PostAndAdd')) {
		as_add_new_category();			
		header( "Location: ".as_adminUrl."?as_request=complain_category_new");
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
            <li><a href="#">Categories</a></li>
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
                  <h3 class="box-title">Add a New Category</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" name="PostNow" action="<?php echo $as_pageinfo['formAction'] ?>" enctype="multipart/form-data">
                  <div class="box-body">
					<input type="hidden" name="postingby" value="<?php echo $as_loginid ?>">
					<div class="form-group">
                      <label for="category_title">Name of the Category *</label>
                      <input type="text" class="form-control" name="category_title">
                    </div>
                    <div class="form-group">						
						<label for="category_icon">Upload an Icon (5MB max) *</label>
						<input class="form-control" name="category_icon" type="file" accept="image/*">						
					</div>	
				  
					<div class="form-group">
						<label for="description">Describe the Category (500 max) *</label>
						<textarea name="category_content" class="form-control"  /></textarea>
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

			<div class="col-md-4">
				<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Recent Categories</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
				<?php $as_db_query = "SELECT * FROM as_complain_category ORDER BY categoryid DESC LIMIT 20";
					$database = new As_Dbconn();
					
					$results = $database->get_results( $as_db_query );
					?>
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <?php foreach( $results as $row ) { ?>
					<li><img class="iconic" src="<?php echo as_mainUrl_Media().'posts/'.$row['category_icon'] ?>" />
					<b><?php echo $row['category_title'] ?></b>
					<hr class="hor_ln"><li>
					<?php } ?><br>
				  </ul>
                </div>
                <div class="box-footer text-center">
                  <a href="as_categories.php" class="uppercase">View All categories</a>
                </div>
              </div>
			</div>
			
          </div>
        </section>
      </div>


<?php include AS_CONT."admin/theme_footer.php"; ?>
<?php include AS_CONT."admin/theme_bottom.php"; ?>
