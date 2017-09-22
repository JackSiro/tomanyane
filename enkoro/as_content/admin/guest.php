<?php
	session_start();
	require( 'as_config.php' );
	include AS_FUNC.'as_dbconn.php';
	require AS_FUNC.'as_base.php';
	include AS_FUNC.'as_options.php';
	include AS_FUNC.'as_paging.php';
	include AS_FUNC.'as_posting.php';
	include AS_FUNC.'as_users.php';
 		
	$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
	 if ( $action != "forgot_password" && $action != "recover_password" && $action != "forgot_username" && $action != "recover_username" && !$as_loginid ) {
		as_login();
		exit;
	} 
	
	
	switch ( $action ) {
		case 'login':
			as_login();
			break;
		case 'logout':
			as_logout();
			break;
		case 'signout':
			as_logout();
			break;
		case 'register':
			as_register();
			break;
		case 'forgot_password': forgot_password();
			break;
		case 'recover_password': recover_password();
			break;
		case 'forgot_username': forgot_username();
			break;
		case 'recover_username': recover_username();
			break;		
		default:		
			as_dashboard();
	}

	function as_dashboard(){
		$results = array();
		$as_pageinfo['pageTitle'] = "Dashboard"; 
		
		require( "as_main.php" );
	}
	
	function forgot_username() {
		$results = array();
		$as_pageinfo['pageTitle'] = "Forgot Username";
		$as_pageinfo['pageAction'] = "ForgotUsername"; 
		
		if (as_clicked('ForgotUsername')) {
			$email = $_POST['username'];
			$password = md5($_POST['password']);
			as_recover_username($email, $password);
			header( "Location: as_guest.php?action=recover_username");		
		}  else {
			require( AS_CONT . "as_guest_forgot_username.php" );
		}	
	}

	  function forgot_password() {
		$results = array();
		$as_pageinfo['pageTitle'] = "Forgot Password";
		$as_pageinfo['pageAction'] = "ForgotPassword"; 
		
		if (as_clicked('ForgotPassword')) {
			$username = $_POST['username'];
			$email = $_POST['email'];
			as_recover_password($username, $email);
			header( "Location: as_guest.php?action=recover_password");		
		}  else {
			require( AS_CONT . "as_guest_forgot_password.php" );
		}	
		
	}

	function recover_username() {
		$results = array();
		$as_pageinfo['pageTitle'] = "Recover Username";
		$as_pageinfo['pageAction'] = "RecoveredUsername"; 
		require( AS_CONT . "as_guest_recover_username.php" );
		
	}

	function recover_password() {
		$results = array();
		$as_pageinfo['pageTitle'] = "Recover Password";
		$as_pageinfo['pageAction'] = "RecoveredPassword"; 
		
		if (as_clicked('RecoverPassword')) {
			$username = $_POST['username'];
			$password = md5($_POST['passwordcon']);
			as_change_password($username);
			header( "Location: .");		
		}  else {
			require( AS_CONT . "as_guest_recover_password.php" );
		}
	}

?>
