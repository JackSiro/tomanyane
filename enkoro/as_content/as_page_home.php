<?php 
	
	$database = new As_Dbconn();	
	$as_db_query = "SELECT * FROM as_page WHERE page_homepage=1";		
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $pageid,$page_homepage,$page_title,$page_content,$page_slug, $page_state,$page_views) = $database->get_row( $as_db_query );
				
	}
	
	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = $page_title;
	$as_pageinfo['pageContent'] = $page_content;
	$as_pageinfo['formAction'] = "shareit".as_urlExt;
	
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
	
	$as_request = isset( $_GET['as_request'] ) ? $_GET['as_request'] : "";
	$as_wordid = isset( $_GET['as_wordid'] ) ? $_GET['as_wordid'] : "";				
	
	as_user_to_login();
		
	if (as_clicked('ShareItNow')) {
		$title = as_post_text('word_title');
		$content = as_post_text('word_content');
		$loginid = as_post_text('word_sharedby');
		$fielderrors = array_merge($title, $content);
		if (empty($fielderrors)) {
			$wordid = as_new_word_quick($title, $content, $loginid);
		}
		header( "Location: ".as_siteUrl."shareit".as_urlExt."?as_request=sharingit&&as_wordid=".$wordid);
		exit();
	} 
	
	$as_page = isset( $_GET['as_page'] ) ? $_GET['as_page'] : "";
	$word_id = isset( $_GET['as_wordid'] ) ? $_GET['as_wordid'] : "";
	include as_site_theme("as_theme_header.php"); 
?>
	<!-- Page Container -->
<div class="as-container as-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="as-row">
    <!-- Left Column -->
    <?php include as_site_theme("as_theme_sidebar_left.php") ?>
    <!-- Middle Column -->
    <div class="as-col m7">
    
      <div class="as-row-padding">
        <div class="as-col m12">
          <div class="as-card-2 as-round as-white">
            <div class="as-container as-padding">
				<form method="post" action="<?php echo $as_pageinfo['formAction'] ?>" >
					<input type="hidden" name="word_sharedby" value="<?php echo $as_loginid ?>">
					<h4 class="as-opacity">Share a Word from your Community</h4>
					<h6>Your Word or Phrase here</h6>
					<div class="form-group">									
						<input type="text" class="form-control" name="word_title" required>
					</div>				
					<h6>What does your word/phrase mean?</h6>
					<div class="form-group">									
						<textarea class="form-control" name="word_content" style="height:100px;" required></textarea>
					</div>
					<button type="submit" name="ShareItNow" class="as-btn as-theme-d3 as-margin-bottom" ><i class="fa fa-pencil"></i> Share It</button>
               </form>
            </div>
          </div>
        </div>
      </div>
<?php 
	$as_db_post_query = "SELECT * FROM as_word WHERE word_state=1 ORDER BY word_posted DESC";				
	$results = $database->get_results( $as_db_post_query );
	$post_id =0;
	foreach( $results as $row ) { 
		if ($post_id == 10) break; ?>
	<div class="as-container as-card-2 as-white as-round as-margin"><br>
        <img src="<?php echo as_siteUrl ?>as_media/data/avatar5.png" alt="Avatar" class="as-left as-circle as-margin-right" style="width:60px">
        <span class="as-right as-opacity"><?php echo as_timeago_now($row['word_posted']) ?></span>
        <h4><?php echo as_kenyan_name($row['word_postedby']) ?> &raquo; <?php echo $row['word_tribe'] ?></h4><br>
        <hr class="as-clear">
		<h3><?php echo $row['word_title'] ?></h3>
        <p><?php echo substr($row['word_meaning'], 0,200) ?></p>
        <button type="button" class="as-btn as-theme-d3 as-margin-bottom"><i class="fa fa-thumbs-up"></i>  Like</button> 
        <button type="button" class="as-btn as-theme-d3 as-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
      </div>  

<?php $post_id++; } ?>
      
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <?php include as_site_theme("as_theme_sidebar_right.php") ?>
    
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<?php  include as_site_theme("as_theme_footer.php");  ?>