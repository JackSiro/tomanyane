<?php
	
	session_start();
	require( 'as_config.php' );
	include AS_FUNC.'as_dbconn.php';
	require AS_FUNC.'as_base.php';
	include AS_FUNC.'as_options.php';
	include AS_FUNC.'as_paging.php';
	include AS_FUNC.'as_posting.php';
	include AS_FUNC.'as_users.php';
	
	$as_request = isset( $_GET['as_request'] ) ? $_GET['as_request'] : "";
	$as_catid = isset( $_GET['as_catid'] ) ? $_GET['as_catid'] : "";
	
        switch ( $as_request) {
		case 'login':
			as_login();
			break;
		case 'logout':
			as_logout();
			break;
		case 'new_category':
			as_new_category();
			break;
		case 'view_category':
			as_view_category($as_catid);
			break;
		default:
			as_categories();
	}
			
	function as_new_category(){
		$results = array();
		$as_pageinfo['pageTitle'] = "New Category";
		$as_pageinfo['pageAction'] = "Add a New Category";
		$as_pageinfo['formAction'] = "as_categories.php?as_request=new_category";
  
		if (as_clicked('CancelPost')) {
			header( "Location: ".as_siteLynk()."as_categories.php");
						
		} else if (as_clicked('PostCategory')) {
			as_add_new_category();			
			header( "Location: ".as_siteLynk()."as_categories.php");
						
		} else if (as_clicked('PostCategoryAdd')) {
			as_add_new_category();			
			header( "Location: ".as_siteLynk()."as_categories.php?as_request=new_category");
						
		} else {
			require( AS_CONT."as_admin/as_category_new.php" );
		}
			
	}
	
	function as_categories() {
                $results = array();
		$as_pageinfo['pageTitle'] = "Latest Categories";
		$as_pageinfo['pageAction'] = "Latest Categories";
		require( AS_CONT . "/as_category_all.php" );
	}

        function as_view_category($as_catid) {
       		$results = array();
       		$as_pageinfo['formAction'] = "as_categories.php?as_request=view_category&amp;as_catid=".$as_catid;
       		
  		$as_db_query = "SELECT * FROM as_category WHERE catid = '$as_catid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
                    list( $catid, $cat_slug, $cat_title) = $database->get_row( $as_db_query );
		    $as_pageinfo['category'] = $catid;
		} else  {
		    return false;
		    header( "Location: ".as_siteLynk()."as_categories.php");
		}
		                
		$as_pageinfo['pageTitle'] = "View Category";
		$as_pageinfo['pageAction'] = "Category Information";
		
		if (as_clicked('CancelPost')) {
			header( "Location: ".as_siteLynk()."as_categories.php");
						
		} else if (as_clicked('PostCategory')) {
			as_edit_category($as_catid);			
			header( "Location: ".as_siteLynk()."as_categories.php");
						
		} else if (as_clicked('PostCategoryAdd')) {
			as_edit_category($as_catid);			
			header( "Location: ".as_siteLynk()."as_categories.php?as_request=new_category");
						
		} else {
			require( AS_CONT."as_admin/as_category_view.php" );
		}
	}
?>
