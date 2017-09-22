<?php       
		$siteurl = explode('/',$_SERVER['REQUEST_URI']);

		$username = isset ( $_COOKIE['tujuane_username']) ? $_COOKIE['tujuane_username'] : "";
		$words = isset ( $_GET["start"]) ? $_GET["start"] : "";
	  
		as_homepage($words);
		
		function as_homepage($words) {
	  
			$results = array();	 
			$as_pageinfo['pageTitle'] = as_get_option('sitename');
			$as_pageinfo['startfrom'] = $words;
			//setcookie('temp_task', '', time()+60*60*24*365, '/', as_getUrl());
			//setcookie('temp_word', '', time()+60*60*24*365, '/', as_getUrl());
			//setcookie('temp_plural', '', time()+60*60*24*365, '/', as_getUrl());
			//setcookie('temp_meaning', '', time()+60*60*24*365, '/', as_getUrl());
			//setcookie('temp_swa_word',  '', time()+60*60*24*365, '/', as_getUrl());
			//setcookie('temp_tag_word', '', time()+60*60*24*365, '/', as_getUrl());
		
		       require( AS_CONT."as_admin/as_homepage.php" );
		
	}
	  
?>