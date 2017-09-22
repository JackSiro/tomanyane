<?php 
    
	$database = new As_Dbconn();	
	$as_db_query = "SELECT * FROM as_page WHERE page_homepage=1";		
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $pageid,$page_homepage,$page_title,$page_content,$page_slug, $page_state,$page_views) = $database->get_row( $as_db_query );
				
	}
	
	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = $page_title;
	$as_pageinfo['pageContent'] = $page_content;
	
	require_once AS_FUNC."as_paging.php";
	require_once AS_CONT.'as_homepage.php';
	
?>