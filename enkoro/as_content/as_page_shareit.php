<?php 
	
	$database = new As_Dbconn();	
	
	$as_request = isset( $_GET['as_request'] ) ? $_GET['as_request'] : "";
	$as_wordid = isset( $_GET['as_wordid'] ) ? $_GET['as_wordid'] : "";				
	
	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = "Share your Word/Phrase";
	
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
	
	as_user_to_login();
	
	$as_page = isset( $_GET['as_page'] ) ? $_GET['as_page'] : "";
	$word_id = isset( $_GET['as_wordid'] ) ? $_GET['as_wordid'] : "";
	if ($word_id)
		$as_pageinfo['formAction'] = "shareit".as_urlExt.'as_request=sharingit&&as_wordid='.$word_id;
	else 		
		$as_pageinfo['formAction'] = "shareit".as_urlExt;
	$as_tribeid = 1;
	
	if (as_clicked('ShareItNow')) {
		$wordid = as_post_text('word_id');
		$tribe = as_post_text('word_tribe');
		$plural = as_post_text('word_plural');
		$title = as_post_text('word_title');
		$content = as_post_text('word_content');
		$tageng = as_post_text('word_tageng');
		$tagswa = as_post_text('word_tagswa');
		$loginid = as_post_text('word_sharedby');
		
		//if ($word_id) as_new_word($title, $content, $plural, $tribe, $tageng, $tagswa, $loginid);
		//else as_update_word($wordid, $title, $content, $plural, $tageng, $tagswa, $loginid);
		as_new_word($title, $content, $plural, $tribe, $tageng, $tagswa, $loginid);	
		header( "Location: ".as_siteUrl."index".as_urlExt);
		exit();
	} 
	
	include as_site_theme("as_theme_header.php"); 
?>
	<!-- Page Container -->
<div class="as-container as-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="as-row">
    
    <!-- Main Column -->
    <div class="as-col m7">
    
      <div class="as-row-padding">
        <div class="as-col m12">
          <div class="as-card-2 as-round as-white">
            <div class="as-container as-padding">			
<?php 
	if ($word_id) {
		$as_format_query = "SELECT * FROM as_word WHERE wordid=$as_wordid";		
		if( $database->as_num_rows( $as_format_query ) > 0 ) {
			list( $wordid, $word_tribe, $word_title, $word_slag, $word_plural, $word_meaning, $word_tageng, $word_tagswa, $word_views, $word_state, $word_flagcount, $word_postedby, $word_posted, $word_updatedby, $word_updated) = $database->get_row( $as_format_query );
					
		} 
	}else {
		$word_tribe = ""; $word_title = ""; $word_plural = "";
		$word_meaning = ""; $word_tageng = ""; $word_tagswa = "";						
	}
	
	?>
				<form method="post" action="<?php echo $as_pageinfo['formAction'] ?>" >
					<input type="hidden" name="word_id" value="<?php echo $word_id ?>">
					<input type="hidden" name="word_sharedby" value="<?php echo $as_loginid ?>">
					<input type="hidden" name="word_tribe" value="<?php echo $as_tribeid ?>">
					<h4 class="as-opacity">Share a Word from your Community</h4>
					<h6>Your Word or Phrase here</h6>
					<div class="form-group">									
						<input type="text" class="form-control" name="word_title" value="<?php echo $word_title ?>" required>
					</div>				
					<h6>What does your word/phrase mean?</h6>
					<div class="form-group">									
						<textarea class="form-control" name="word_content" style="height:100px;" required><?php echo $word_meaning ?></textarea>
					</div>
					<h6>Your Word in Plural (optional)</h6>
					<div class="form-group">									
						<input type="text" class="form-control" name="word_plural" value="<?php echo $word_plural ?>">
					</div>
					<h6>Your Word in English (use comma to separate if more than one)</h6>
					<div class="form-group">									
						<input type="text" class="form-control" name="word_tageng" value="<?php echo $word_tageng ?>" required>
					</div>
					<h6>Your Word in Kiswahili (use comma to separate if more than one)</h6>
					<div class="form-group">									
						<input type="text" class="form-control" name="word_tagswa" value="<?php echo $word_tagswa ?>" required>
					</div>
					<button type="submit" name="ShareItNow" class="as-btn as-theme-d3 as-margin-bottom" ><i class="fa fa-pencil"></i> Share It</button>
               </form>
            </div>
          </div>
        </div>
      </div>
      

    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="as-col m5">
      <div class="as-card-2 as-round as-white as-center">
        <div class="as-container">
         <h4 class="as-center">My Profile</h4>
         <p class="as-center"><img src="<?php echo as_siteUrl ?>as_media/data/avatar3.png" class="as-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw as-margin-right as-text-theme"></i> Designer, UI</p>
         <p><i class="fa fa-home fa-fw as-margin-right as-text-theme"></i> London, UK</p>
         <p><i class="fa fa-birthday-cake fa-fw as-margin-right as-text-theme"></i> April 1, 1988</p>
        </div>
      </div>
      <br>
	</div>
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<?php  include as_site_theme("as_theme_footer.php");  ?>