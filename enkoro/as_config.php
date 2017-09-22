<?php
/*
	AppSmata by Jackson Siro
	http://www.github.com/jacksiro

	File: as_functions/as_base.php
	Description: Sets up AppSmata environment, plus many globally useful functions

*/
	ini_set( "display_errors", true );
	date_default_timezone_set( "Africa/Nairobi" ); 
	$as_site_url = $_SERVER['HTTP_HOST'].strtr(dirname($_SERVER['SCRIPT_NAME']), '\\', '/');

	define( "AS_HOST", "localhost" );
	define( "AS_DB", "tujuane" );
	define( "AS_USER", "root" );
	define( "AS_PASS", ""  );
	define( "AS_ERROR_RECEIVER", "smataweb@gmail.com"  );
	define( "AS_ERROR_SENDER", "jaksiro@gmail.com"  );
	define( "AS_SITEURL", 'http://'.$as_site_url);

	
	/* * * * * * * * * * * * * * * *\
	*                               *
	*                               *
	*                               *
	\* * * * * * * * * * * * * * * */
	
	
	define( "as_urlExt", ".html" );
	define( 'as_maintainance', '0');
	
?>