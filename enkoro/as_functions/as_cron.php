<?php 
	//INSERT INTO as_cron (title, content, created) VALUES ( 'tujuane.net', '5990974', '2015-11-23');
	
	//from http://php.net/manual/en/function.get-meta-tags.php
	
	function as_alexa_site_rank($siteurl) {
		$date_now = date('Y-m-d H:i:s');
		$alexa = 'http://www.alexa.com/siteinfo/';
		$tags = get_meta_tags($alexa.$siteurl);
		$alexa_siterank = preg_replace('/[^0-9]/', '', $tags['description']);	
		$result = as_db_query("INSERT INTO as_cron (title, content, created) VALUES('$siteurl', '$alexa_siterank', '$date_now')");	
		echo $alexa_siterank.' - '.$siteurl.'<br>';
	}

?>