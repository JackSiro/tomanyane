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
	$as_errorid = isset( $_GET['as_errorid'] ) ? $_GET['as_errorid'] : "";
	
        switch ( $as_request) {
		case 'login':
			as_login();
			break;
		case 'logout':
			as_logout();
			break;
		case 'new_error':
			as_new_error();
			break;
		case 'view_error':
			as_view_error($as_errorid);
			break;
		default:
			as_errors();
	}
		
	function as_errors() {
                $results = array();
		$as_pageinfo['pageTitle'] = "Latest Errors";
		$as_pageinfo['pageAction'] = "Latest Error Reports";
		require( AS_CONT . "/as_error_all.php" );
	}

       function as_view_error($as_errorid) {
       		$results = array();
       		
  		$as_db_query = "SELECT * FROM as_error_report WHERE errorid = '$as_errorid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
                    list( $errorid, $category, $title) = $database->get_row( $as_db_query );
		    $as_pageinfo['error'] = $errorid;
		} else  {
		    return false;
		    header( "Location: ".as_siteUrl()."as_site.php?as_request=view_errors");
		}
		                
		$as_pageinfo['pageTitle'] = "View error";
		
		require( AS_CONT."as_admin/as_error_view.php" );
		
	}
?>
