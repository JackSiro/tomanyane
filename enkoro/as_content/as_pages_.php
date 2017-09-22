<?php
/*
	AppSmata by Jackson Siro
	http://www.github.com/jacksiro

	File: as_functions/as_base.php
	Description: Sets up AppSmata environment, plus many globally useful functions

*/


	function as_get_request_contentx()
	{
		if (as_to_override(__FUNCTION__)) { $args=func_get_args(); return as_call_override(__FUNCTION__, $args); }

		$requestlower = strtolower(as_request());
		$requestparts = as_request_parts();
		$request_one = strtolower($requestparts[0]);
		$routing = as_page_routing();

		if (isset($routing[$requestlower])) {
			as_set_template($request_one);
			$as_content = require AS_CONT.$routing[$requestlower];

		} elseif (isset($routing[$request_one.'/'])) {
			as_set_template($request_one);
			$as_content = require AS_CONT.$routing[$request_one.'/'];

		} elseif (is_numeric($requestparts[0])) {
			as_set_template('question');
			$as_content = require AS_CONT.'pages/question.php';

		} else {
			as_set_template(strlen($request_one) ? $request_one : 'qa'); // will be changed later
			$as_content = require AS_CONT.'pages/default.php'; // handles many other pages, including custom pages and page modules
		}

		if ($request_one == 'admin') {
			$_COOKIE['as_admin_last'] = $requestlower; // for navigation tab now...
			setcookie('as_admin_last', $_COOKIE['as_admin_last'], 0, '/', AS_COOKIE_DOMAIN); // ...and in future
		}

		if (isset($as_content))
			as_set_form_security_key();

		return $as_content;
	}

	function as_page_routing()
	{
		if (as_to_override(__FUNCTION__)) { $args=func_get_args(); return as_call_override(__FUNCTION__, $args); }

		return array(
			'account' => 'account.php',
			'activity/' => 'activity.php',
			'admin/' => 'admin/admin-default.php',
			'admin/approve' => 'admin/admin-approve.php',
			'admin/categories' => 'admin/admin-categories.php',
			'admin/flagged' => 'admin/admin-flagged.php',
			'admin/hidden' => 'admin/admin-hidden.php',
			'admin/layoutwidgets' => 'admin/admin-widgets.php',
			'admin/moderate' => 'admin/admin-moderate.php',
			'admin/pages' => 'admin/admin-pages.php',
			'admin/plugins' => 'admin/admin-plugins.php',
			'admin/points' => 'admin/admin-points.php',
			'admin/recalc' => 'admin/admin-recalc.php',
			'admin/stats' => 'admin/admin-stats.php',
			'admin/userfields' => 'admin/admin-userfields.php',
			'admin/usertitles' => 'admin/admin-usertitles.php',
			'answers/' => 'answers.php',
			'ask' => 'ask.php',
			'categories/' => 'categories.php',
			'comments/' => 'comments.php',
			'confirm' => 'confirm.php',
			'favorites' => 'favorites.php',
			'favorites/questions' => 'favorites-list.php',
			'favorites/users' => 'favorites-list.php',
			'favorites/tags' => 'favorites-list.php',
			'feedback' => 'feedback.php',
			'forgot' => 'forgot.php',
			'hot/' => 'hot.php',
			'ip/' => 'ip.php',
			'login' => 'login.php',
			'logout' => 'logout.php',
			'messages/' => 'messages.php',
			'message/' => 'message.php',
			'questions/' => 'questions.php',
			'register' => 'register.php',
			'reset' => 'reset.php',
			'search' => 'search.php',
			'tag/' => 'tag.php',
			'tags' => 'tags.php',
			'unanswered/' => 'unanswered.php',
			'unsubscribe' => 'unsubscribe.php',
			'updates' => 'updates.php',
			'user/' => 'user.php',
			'users' => 'users.php',
			'users/blocked' => 'users-blocked.php',
			'users/special' => 'users-special.php',
		);
	}
	
	function as_get_request_content()
	{
		if (as_to_override(__FUNCTION__)) { $args=func_get_args(); return as_call_override(__FUNCTION__, $args); }
		
		$requestlower = strtolower(as_request());
		$requestparts = as_request_parts();
		$request_one = strtolower($requestparts[0]);
		//$routing = as_page_routing();
		
		/*		
		if (isset($routing[$requestlower])) {
			//as_set_template($request_one);
			$as_content = require AS_CONT.$routing[$requestlower];

		} elseif (isset($routing[$request_one.'/'])) {
			//as_set_template($request_one);
			$as_content = require AS_CONT.$routing[$request_one.'/'];

		} elseif (is_numeric($requestparts[0])) {
			//as_set_template('question');
			$as_content = require AS_CONT.'pages_question.php';

		} else {
			//as_set_template(strlen($request_one) ? $request_one : 'js'); // will be changed later
			$as_content = require AS_CONT.'as_pages_default.php'; // handles many other pages, including custom pages and page modules
		}
		*/
				
		if ($request_one == 'admin') {
			$_COOKIE['as_admin_last'] = $requestlower; // for navigation tab now...
			setcookie('as_admin_last', $_COOKIE['as_admin_last'], 0, '/', AS_COOKIE_DOMAIN); // ...and in future
		}
		
		switch ( $request_one ) {
			case 'signout':
				$as_content = as_logout();
				break;
			case 'account': 
			case 'account'.as_urlExt:
				$as_content = require( "as_account.php" );
				break;	
			case 'checkout': case 'checkout'.as_urlExt:
				$as_content = require( "as_checkout.php" );
				break;	
			case 'catagoue': case 'categories'.as_urlExt:
				$as_content = require( "as_categories.php" );
				break;	
			case 'xcheckout': case 'xcheckout'.as_urlExt:
				$as_content = require( "as_checkout.php" );
				break;	
			case 'index.html':	
				$as_content = require( "as_main.php" );
				break;		
			default:		
				$as_content = require( "as_main.php" );
		}
		
		//if (isset($as_content)) as_set_form_security_key();
		
		return $as_content;
	}

	
//	Below are the steps that actually execute for this file - all the above are function definitions
	global $as_usage;
	require_once AS_FUNC.'as_users.php';
	
	as_get_request_content();
	/*
	as_report_process_stage('init_page');
	as_db_connect('as_page_db_fail_handler');

	as_page_queue_pending();
	as_load_state();
	as_check_login_modules();

	if (AS_DEBUG_PERFORMANCE)
		$as_usage->mark('setup');

	as_check_page_clicks();

	$as_content = as_get_request_content();
	
	if (is_array($as_content)) {
		if (AS_DEBUG_PERFORMANCE)
			$as_usage->mark('view');

		as_output_content($as_content);

		if (AS_DEBUG_PERFORMANCE)
			$as_usage->mark('theme');

		if (as_do_content_stats($as_content) && AS_DEBUG_PERFORMANCE)
			$as_usage->mark('stats');

		if (AS_DEBUG_PERFORMANCE)
			$as_usage->output();
	}

	as_db_disconnect(); */

	
?>