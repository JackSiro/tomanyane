<?php 
	$as_pageinfo = array();
	$as_pageinfo['formAction'] = "?as_request=complain_view&amp;as_complainid=".$as_complainid;
	
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
						
	$as_db_query = "SELECT * FROM as_complain WHERE complainid = '$as_complainid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $complainid, $complain_cat, $complain_title) = $database->get_row( $as_db_query );
		$as_pageinfo['complain'] = $complainid;
	} else  {
		return false;
		header( "Location: ".as_adminUrl."as_complains.php");
	}
					
	$as_pageinfo['pageTitle'] = "View Complain";
	$as_pageinfo['pageAction'] = "Complain Information";
	
	if (as_clicked('CancelPost')) {
		header( "Location: ".as_adminUrl."?as_request=complain_all");
					
	} else if (as_clicked('PostAndClose')) {
		as_edit_complain($as_complainid);			
		header( "Location: ".as_adminUrl."?as_request=complain_all");
					
	} else if (as_clicked('PostAndAdd')) {
		as_edit_complain($as_complainid);			
		header( "Location: ".as_adminUrl."?as_request=complain_new");
					
	}
	
	$storyid = $as_pageinfo['story'];
	$as_db_query = "SELECT * FROM as_story WHERE storyid = '$storyid'";
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $storyid, $story_cat, $story_slug, $story_title, $other_details, $story_content, $story_postedby, $story_posted, $story_price, $story_views, $story_state, $story_img, $story_seller, $story_updated, $story_updatedby) = $database->get_row( $as_db_query );
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
            <div class="col-md-8">
             
				<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Story: <?php echo $story_title ?></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" name="PostStory" action="<?php echo $as_pageinfo['formAction'] ?>">
                  <div class="box-body">
				  
					<div class="form-group">
                      <label for="Title">Name of the Story *</label>
                      <input type="text" class="form-control" name="title" value="<?php echo $story_title ?>">
                    </div>
                                      <div class="form-group">
                      <label for="Slug">Slug of the Story *</label>
                      <input type="text" class="form-control" name="slug" value="<?php echo $story_slug ?>">
                    </div>
					
				  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label>Category *</label>
                      <select class="form-control" name="category">
                        <option value="<?php echo $story_cat ?>">Please Select</option>										
						<option value="1">Agriculture & Food</option>	
						<option value="2">Construction & Industrial</option>	
						<option value="3">Animals & Pets</option>	
						<option value="4">Electronics & Video</option>	
						<option value="5">Fashion & Beauty</option>	
						<option value="6">Home, Furniture & Garden</option>	
						<option value="7">Mobile Phones & Tablets</option>	
						<option value="8">Real Estate</option>	
						<option value="9">Hobbies, Art & Sport</option>	
                      </select>
                    </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                      <label>Colour *</label>
                      <select class="form-control" name="colour">
                        <option value="<?php echo $other_details ?>">Please Select</option>										
						<option value="1">white</option>	
						<option value="2">Yellow</option>	
						<option value="3">Orange</option>	
						<option value="4">Red</option>	
						<option value="5">Pink</option>	
						<option value="6">Maroon</option>	
						<option value="7">Green</option>	
						<option value="8">Blue</option>	
						<option value="9">Black</option>
						<option value="9">Silver</option>
						<option value="10">Other</option>
                      </select>
                    </div>
                    </div>
                  </div>
				  
					 <div class="row">
                    <div class="col-lg-6">
						<div class="form-group">
						  <label for="Price">Price (KSh) *</label>
						  <input type="text" class="form-control" name="price" value="<?php echo $story_price ?>">
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
						  <label for="Weight">Weight (KGs)</label>
						  <input type="text" class="form-control" name="weight">
						</div>
					</div>
					</div>
					
					<div class="row">
					<div class="col-lg-6">
					<div class="form-group">
						<label for="description">Describe the Story (500 max) *</label>
						<textarea name="content" style="height:130px;" class="form-control"  /><?php echo $story_content ?>"</textarea>
					</div>
					
                    <div class="form-group">
                      <label for="NewStoryImg">Upload an Image</label>
                      <input type="file" name="NewStoryImg">
                    </div>
					</div>
					
					<div class="col-lg-6">
						<div class="form-group">
						<input type="hidden" name="PrevStoryImg" value="<?php echo $story_img ?>">		
						<div style="border:2px solid #006400; background: url('<?php echo as_mainUrl().'/as_media/image/'.$story_img ?>');background-size:cover;background-repeat: no-repeat; background-position: center center; height:220px;" >
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
										<input name="ResetStory" class="btn btn-primary" type="reset" class="form-control" value="Reset This" />
									</div>
								</div>
								
							   </div>
							</div>
							
							<div class="col-md-6">
								<div class="row">
								 <div class="col-md-6">
									<div class="form-group">
										<input name="PostStory" class="btn btn-primary" style="float:right;" type="submit" class="form-control" value="Save & Close" />
									</div>
								</div>
								
								<div class="col-md-6">
									<div class="form-group">
										<input name="PostStoryAdd" class="btn btn-primary" type="submit" class="form-control" value="Save & Add" />
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
