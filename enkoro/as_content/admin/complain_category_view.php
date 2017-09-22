<?php 
	$as_pageinfo = array();
	$as_pageinfo['formAction'] = "?as_request=complain_category_view&amp;as_catid=".$as_catid;
	
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
						
	$as_db_query = "SELECT * FROM as_category WHERE catid = '$as_catid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
				list( $catid, $cat_slug, $cat_title) = $database->get_row( $as_db_query );
		$as_pageinfo['category'] = $catid;
	} else  {
		return false;
		require_once AS_FUNC."as_paging.php";
		header( "Location: ".as_adminUrl."?as_request=complain_category_view");
	}
					
	$as_pageinfo['pageTitle'] = "View Category";
	$as_pageinfo['pageAction'] = "Category Information";
	
	if (as_clicked('CancelPost')) {
		header( "Location: ".as_adminUrl."?as_request=complain_category_all");
					
	} else if (as_clicked('PostAndClose')) {
		as_edit_category($as_catid);			
		header( "Location: ".as_adminUrl."?as_request=complain_category_all");
					
	} else if (as_clicked('PostAndClose')) {
		as_edit_category($as_catid);			
		header( "Location: ".as_adminUrl."?as_request=complain_category_all");
					
	} 
	require_once AS_FUNC."as_paging.php";
	$catid = $as_pageinfo['category'];
	$as_db_query = "SELECT * FROM as_category WHERE catid = '$catid'";
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $catid, $cat_slug, $cat_title, $cat_content) = $database->get_row( $as_db_query );
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
            <li class="active">Category: <?php echo $pageTitle ?></li>
          </ol>
        </section>

        <section class="content">
         
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
             
				<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Category: <?php echo $cat_title ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" name="PostCategory" action="<?php echo $as_pageinfo['formAction'] ?>">
                  <div class="box-body">
				  
					<div class="form-group">
                      <label for="Title">Name of the Category *</label>
                      <input type="text" class="form-control" name="title" value="<?php echo $cat_title ?>">
                    </div>
				  <div class="form-group">
                      <label for="slug">Slug of the Category *</label>
                      <input type="text" class="form-control" name="slug" value="<?php echo $cat_slug?>">
                    </div>
				  
					<div class="form-group">
						<label for="description">Describe the Category (500 max) *</label>
						<textarea name="content" class="form-control"  /><?php echo $cat_content ?></textarea>
					</div>
					
                    <div class="form-group">
                      <label for="exampleInputFile">Add an Icon</label>
                      <input type="file" id="exampleInputFile">
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
										<input name="ResetCategory" class="btn btn-primary" type="reset" class="form-control" value="Reset This" />
									</div>
								</div>
								
							   </div>
							</div>
							
							<div class="col-md-6">
								<div class="row">
								 <div class="col-md-6">
									<div class="form-group">
										<input name="PostCategory" class="btn btn-primary" style="float:right;" type="submit" class="form-control" value="Save & Close" />
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<input name="PostCategoryAdd" class="btn btn-primary" type="submit" class="form-control" value="Save & Add" />
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
