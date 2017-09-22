<?php
/*
	AppSmata by Jackson Siro
	http://www.github.com/jacksiro

	File: as_functions/as_base.php
	Description: Sets up AppSmata environment, plus many globally useful functions

*/

	function as_get_request_content()
	{
		if (as_to_override(__FUNCTION__)) { $args=func_get_args(); return as_call_override(__FUNCTION__, $args); }
				
		$requestlower = strtolower(as_request());
		$requestparts = as_request_parts();
		$request_one = strtolower($requestparts[0]);
		if (count($requestparts)>1) {
			$request_two = strtolower($requestparts[1]);
		} else $request_two = "";
				  
		$as_request = isset( $_GET['as_request'] ) ? $_GET['as_request'] : "";
		/*		
		if ($request_one == 'admin') {
			$_COOKIE['as_admin_last'] = $requestlower; // for navigation tab now...
			setcookie('as_admin_last', $_COOKIE['as_admin_last'], 0, '/', AS_COOKIE_DOMAIN); // ...and in future
		}*/
		
		$as_loginid = isset( $_SESSION['78e9e89c281686f4e051fe42c1675150'] ) ? $_SESSION['78e9e89c281686f4e051fe42c1675150'] : "";			
		$as_group = isset( $_SESSION['db0f6f37ebeb6ea09489124345af2a45'] ) ? $_SESSION['db0f6f37ebeb6ea09489124345af2a45'] : "";			
		
		if (as_is_page_homepage($request_one)) {
			$as_content = require( "as_page_home.php" );
			exit();
		} 
		
		switch ( $request_one ) {
			case 'index'.as_urlExt:	
				$as_content = require( "as_page_home.php" );
				break;
			case 'signout'.as_urlExt:	
				$as_content = as_logout();
				break;	
			case 'signin'.as_urlExt:			
				$as_content = require( "as_account_signin.php" );
				break;
			case 'signup'.as_urlExt:			
				$as_content = require( "as_account_signup.php" );
				break;	
			case 'forgotten'.as_urlExt:	
				$as_content = require( "as_account_forgotten.php" );
				break;
			case 'username'.as_urlExt:	
				$as_content = require( "as_account_username.php" );
				break;	
			case 'account'.as_urlExt:	
				$as_content = require( "as_account_account.php" );
				break;				
			case 'shareit'.as_urlExt:
				$as_content = require( "as_page_shareit.php" );
				break;	
			case 'catagoue':
				$request_two = strtolower($requestparts[1]);
				
				break;	
			case 'admin'.as_urlExt:					
				if (as_user_is_admin($user_level)) {
					switch ( $as_request ) {
						case 'user_new':
							$as_content = require( AS_CONT."admin/user_new.php" );
							break;
						case 'user_view':
							$as_content = require( AS_CONT."admin/user_view.php" );
							break;
						case 'user_admin':
							$as_content = require( AS_CONT."admin/user_admin.php" );
							break;
						case 'user_all':
							$as_content = require( AS_CONT."admin/user_all.php" );
							break;	
						case 'user_client':
							$as_content = require( AS_CONT."admin/user_client.php" );
							break;	
						case 'saleitem_new':
							$as_content = require( AS_CONT."admin/saleitem_new.php" );
							break;
						case 'saleitem_view':
							$as_content = require( AS_CONT."admin/saleitem_view.php" );
							break;
						case 'saleitem_all':
							$as_content = require( AS_CONT."admin/saleitem_all.php" );
							break;	
						case 'saleitem_category_new':
							$as_content = require( AS_CONT."admin/saleitem_category_new.php" );
							break;
						case 'saleitem_category_all':
							$as_content = require( AS_CONT."admin/saleitem_category_all.php" );
							break;		
						case 'menu_new':
							$as_content = require( AS_CONT."admin/menu_new.php" );
							break;
						case 'menu_view':
							$as_content = require( AS_CONT."admin/menu_view.php" );
							break;
						case 'menu_all':
							$as_content = require( AS_CONT."admin/menu_all.php" );
							break;	
						case 'menuitem_new':
							$as_content = require( AS_CONT."admin/menuitem_new.php" );
							break;
						case 'menuitem_view':
							$as_content = require( AS_CONT."admin/menuitem_view.php" );
							break;
						case 'menuitem_all':
							$as_content = require( AS_CONT."admin/menuitem_all.php" );
							break;	
						case 'page_new':
							$as_content = require( AS_CONT."admin/page_new.php" );
							break;
						case 'page_view':
							$as_content = require( AS_CONT."admin/page_view.php" );
							break;
						case 'page_all':
							$as_content = require( AS_CONT."admin/page_all.php" );
							break;	
						case 'widghet_new':
							$as_content = require( AS_CONT."admin/widghet_new.php" );
							break;
						case 'widghet_view':
							$as_content = require( AS_CONT."admin/widghet_view.php" );
							break;
						case 'widghet_all':
							$as_content = require( AS_CONT."admin/widghet_all.php" );
							break;
						case 'settings_general':
							$as_content = require( AS_CONT."admin/settings_general.php" );
							break;
						case 'settings_slideshow':
							$as_content = require( AS_CONT."admin/settings_slideshow.php" );
							break;
						case 'settings_widghets':
							$as_content = require( AS_CONT."admin/settings_widghets.php" );
							break;		
						case 'settings_countries':
							$as_content = require( AS_CONT."admin/settings_countries.php" );
							break;		
						default:						
							$as_content = require( AS_CONT."admin/adashboard.php" );
					}
				} else {
					$as_content = header('Location: '.as_setLink('index'));
				}
				break;	
			default:		
				$matchpages = as_find_menuitem_byrequest(str_replace(as_urlExt, "", $request_one));					
				if (count($matchpages)==1) {
					$inpageid=$matchpages[0];
					$as_content = require( "as_page_viewer.php" );
				} else {
					$as_content = require( "as_page_404.php" );
				}
		}
		
		return $as_content;
	}

	global $as_usage;
	require_once AS_FUNC.'as_users.php';	
	as_get_request_content();
	
	function as_find_menuitem_byrequest($request)
	{
		$database = new As_Dbconn();		
		$as_db_query = "SELECT * FROM as_menu_item WHERE menuitem_link = '$request' AND menuitem_state =1";
		$results = $database->get_results( $as_db_query );
		foreach( $results as $row )
		{
		    return $row['menuitem_page'];                  
		}	
	}
	
	function as_is_page_homepage($request){		
		$database = new As_Dbconn();		
		if (empty($request)) {
			return true;
		} else {
			$matchpages= as_find_menuitem_byrequest(str_replace(as_urlExt, "", $request));			
			if (count($matchpages)==1) { 
				$as_db_query = "SELECT * FROM as_page WHERE pageid='".$matchpages[0]."'";
				list( $pageid,$page_homepage) = $database->get_row( $as_db_query );
				if ($page_homepage == 1) return true;
				else return false;
			} else return false;
		}
	}
		
?>