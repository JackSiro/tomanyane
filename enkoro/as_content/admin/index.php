<?php
/*
	AppSmata by Jackson Siro
	http://www.github.com/jacksiro

	File: as_functions/as_base.php
	Description: Sets up AppSmata environment, plus many globally useful functions

*/

	session_start();
	require( 'as_config.php' );
	include AS_FUNC.'as_dbconn.php';
	require AS_FUNC.'as_base.php';
	include AS_FUNC.'as_options.php';
	include AS_FUNC.'as_paging.php';
	include AS_FUNC.'as_posting.php';
	include AS_FUNC.'as_users.php';
 	
	as_site_options();	
 	$request = as_request(0);
	as_siteUrl = as_mainUrl();
	as_siteTitle = as_siteTitle;
	
	$as_userid = isset( $_SESSION['78e9e89c281686f4e051fe42c1675150'] ) ? $_SESSION['78e9e89c281686f4e051fe42c1675150'] : "";
	$as_user_group = isset( $_SESSION['db0f6f37ebeb6ea09489124345af2a45'] ) ? $_SESSION['db0f6f37ebeb6ea09489124345af2a45'] : "";
	$as_user_mode = isset( $_SESSION['651d6ea06d660c1e492c80a6c3875ce5'] ) ? $_SESSION['651d6ea06d660c1e492c80a6c3875ce5'] : "";
	//$as_user_msg = isset( $_SESSION['651d6ea06d660c1e492c80a6c3875ce5'] ) ? $_SESSION['651d6ea06d660c1e492c80a6c3875ce5'] : "";
	
	if (as_user_is_logged()) {
		switch ( $request ) {
			case 'logout': case 'signout':
				as_logout();
				break;
			case 'as_users.html':		
				require( "as_users.php" );
				break;	
			case 'as_categories.html': 		
				require( "as_categories.php" );
				break;	
			case 'as_complains.html':		
				require( "as_complains.php" );
				break;	
			case 'as_pages.html':	
				require( "as_pages.php" );
				break;		
			case 'as_site.html':	
				require( "as_site.php" );
				break;		
			case 'index.html':	
				require( "as_main.php" );
				break;		
			default:		
				//require( "as_main.php" );
				as_signin();
		}
	}	else {
		switch ( $request ) {		
			case 'login': case 'signin':
				as_signin();
				break;
			case 'about.html':	
				require( "as_main.php" );
				break;		
			case 'index.html':	
				require( "as_main.php" );
				break;		
			default:		
				require( "as_guest_mode.php" );
		}
	}
	

	/*
	switch ( $request ) {
		case 'login': case 'signin':
			as_signin();
			break;
		case 'logout': case 'signout':
			as_logout();
			break;
		case 'as_users.html':		
			require( "as_users.php" );
			break;	
		case 'as_categories.html': 		
			require( "as_categories.php" );
			break;	
		case 'as_complains.html':		
			require( "as_complains.php" );
			break;	
		case 'as_pages.html':	
			require( "as_pages.php" );
			break;		
		case 'as_site.html':	
			require( "as_site.php" );
			break;		
		case 'index.html':	
			require( "as_main.php" );
			break;		
		default:		
			//require( "as_main.php" );
			as_signin();
	}
	*/
?>
