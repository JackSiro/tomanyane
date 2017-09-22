<?php
	
	$request_two = strtolower($requestparts[1]);
	switch ( $request_two ) {
		case 'signin.html':			
			as_page_account_signin();
			break;
		case 'signup.html':			
			as_page_account_signup();
			break;	
		case 'signout.html':	
			as_logout();
			break;		
		case 'forgotten.html':	
			as_page_account_forgotten();
			break;
		case 'username.html':	
			as_page_account_username();
			break;			
		default:		
			require( "as_main.php" );
	}
	
		
	function as_page_account_signin()
	{
		//loginname=jacksiro&loginkey=Am2zealous&LetMeIn=SIGN+IN
		$inloginname = as_post_text('loginname');
		$inloginkey = as_post_text('loginkey');
		$inremember = as_post_text('remember_me');

		if (as_clicked('LetMeIn') && (strlen($inloginname) || strlen($inloginkey)) ) {
			if (strpos($inloginname, '@')!==false) {// handles can't contain @ symbols
				$matchusers=as_db_user_find_by_email($inloginname);
			} else {
				$matchusers=as_db_user_find_by_username($inloginname);
			}
			
			if (count($matchusers)==1) { 
				$inuserid=$matchusers[0];
				$as_db_query = "SELECT * FROM as_user WHERE userid='$inuserid'";
				$database = new As_Dbconn();
				list( $userid, $user_name, $user_fname, $user_sname, $user_sex, $user_password, $user_location, 
				$user_mobile, $user_email, $user_group, $user_level) = $database->get_row( $as_db_query );
				
				if (as_login_user($userid, md5($inloginkey))) {
					as_set_logged_in_user($userid, $user_name, $user_level);	
					header('Location: index'.as_urlExt );
				} else {
					header('Location: account/password_wrong'.as_urlExt );	
					//$errors['password']=as_lang('users/password_wrong');
				}
			} else {
				//$errors['emailhandle']=as_lang('users/user_not_found');
				header('Location: account/user_not_found'.as_urlExt );
			}
		}
			
		$as_pageinfo = array();	 
		$as_pageinfo['pageTitle'] = 'Sign in to your Account';
	
		require_once AS_FUNC."as_paging.php";
		$as_content = require AS_CONT.'as_account_signin.php';
		
		return $as_content;
	}
	
	function as_page_account_signup()
	{		
		$infirstname = as_post_text('user_firstname');
		$inlastname = as_post_text('user_lastname');
		$inemail = as_post_text('user_email');
		$inusername = as_post_text('user_name');
		$inphone = as_post_text('user_phone');
		$inpassword = as_post_text('user_password');
		$inconfirm = as_post_text('user_confirm');
		$incompany = as_post_text('user_company');
		$inaddress1 = as_post_text('user_address_1');
		$inaddress2 = as_post_text('user_address_2');
		$incity = as_post_text('user_city');
		$incountryid = as_post_text('user_country_id');
		$inzoneid = as_post_text('user_zone_id');
		$insubscribe = as_post_text('user_subscribe');
		$inagree = as_post_text('user_agree');

		if (as_clicked('SignMeUp') && (strlen($infirstname) || strlen($inlastname) || strlen($inemail) || strlen($inusername) ||strlen($inphone) || strlen($inpassword) || strlen($inconfirm) || strlen($incompany) || strlen($inaddress1) || strlen($inaddress2) || strlen($incity) || strlen($incountryid) || strlen($inzoneid) || strlen($inagree)) ) {
			if (strpos($inemail, '@')!==false) {// handles can't contain @ symbols
				$matchusers=as_db_user_find_by_email($inemail);
			} else {
				$matchusers=as_db_user_find_by_username($inusername);
			}
			
			if (count($matchusers)>1) { 
				
				header('Location: account/username_exists'.as_urlExt );
			} else {
				//$userid = as_add_new_user($infirstname, $inlastname, $inemail, $inusername, $inphone, $inconfirm, $inaddress1, $incity, $incountryid, $inzoneid, $incompany='', $inaddress2='');
				$userid = as_add_new_user($infirstname, $inlastname, $inemail, $inusername, MD5($inconfirm), 1, 1);				
				as_set_logged_in_user($userid, $inusername, 1);
				header('Location: account/index'.as_urlExt );
			}
		}
			
		$as_pageinfo = array();	 
		$as_pageinfo['pageTitle'] = 'Sign up to your Account';
	
		require_once AS_FUNC."as_paging.php";
		$as_content = require AS_CONT.'as_account_signup.php';
		
		if ( isset( $_GET['country_id'] ) ) {
			
		}
		return $as_content;
	}
		
	function as_page_account_forgotten()
	{
		$as_pageinfo = array();	 
		$as_pageinfo['pageTitle'] = 'Recover your password';
		
		require_once AS_FUNC."as_paging.php";
		$as_content = require AS_CONT.'as_account_signin.php';
		
		return $as_content;
	}
		
	function as_page_account_username()
	{
		$as_pageinfo = array();	 
		$as_pageinfo['pageTitle'] = 'Recover your username';
		
		require_once AS_FUNC."as_paging.php";
		$as_content = require AS_CONT.'as_account_signin.php';
		
		return $as_content;
	}
		
	function as_page_account_404()
	{
		$as_pageinfo = array();	 
		$as_pageinfo['pageTitle'] = 'Did you get lost';
		
		require_once AS_FUNC."as_paging.php";
		$as_content = require AS_CONT.'as_page_error.php';
		
		return $as_content;
	}
	

?>