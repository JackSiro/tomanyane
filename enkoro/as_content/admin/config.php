 <?php
	ini_set( "display_errors", true );
	date_default_timezone_set( "Africa/Nairobi" ); 
	$as_site_url = $_SERVER['HTTP_HOST'].strtr(dirname($_SERVER['SCRIPT_NAME']), '\\', '/');
	
	define( "AS_HOST", "localhost" );
	define( "AS_DB", "tujuane_cars" );
	define( "AS_USER", "tujuane_cars" );
	define( "AS_PASS", "Am2zealous" );
	define( "AS_ACC", "as_account/" );
	define( "AS_CONT", "as_include/" );
	define( "AS_THEME", "as_themes/" );
	define( "AS_CONT", "as_content/" );
	define( "AS_APP", "as_apps/" );
        define( "AS_FUNC", "as_functions/" );
	define( "AS_SITEURL", $as_site_url);
         


       define( "AS_E_TOP", '<html><head><title>Something is not Right</title><style>
			body { font-family: arial,sans-serif; font-size:0px;margin: 50px 10px;	padding: 0; text-align: center;	} h1{font-size:30px;}
			img { border: 0; }
			.rounded {	-webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 5px;}
			#content { margin: 0 auto;	width: 750px; }
			#error-section { background-color: #000;	border: 1px solid #a1b4d9; color: #fff; font-weight: bold; padding: 12px ;}				
			#debug { margin-top: 50px; text-align:left;	}
			 #lower-section { border: 1px solid #a1b4d9; margin: 10px 0;padding:10px;  font-size:20px;}
		</style></head><body text="#000000" bgcolor="#ffffff" dir="ltr"><div id="content"><div id="error-section" class="rounded">
		<h1>Something is not Right!</h1></div><div id="lower-section" class="rounded">');

       define( "AS_I_TOP", '<html><head><title>A Few Fixes</title><style>
			body { font-family: arial,sans-serif; font-size:0px;margin: 50px 10px;	padding: 0; text-align: center;	} h1{font-size:30px;}
                        input,textarea{font-size:20px;padding:5px;width:100%;} table{width:80%;margin:10px;}
			img { border: 0; }.submit_this{width:50%;}
			.rounded {	-webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 5px;}
			#content { margin: 0 auto;	width: 750px; }
			#error-section { background-color: #000;	border: 1px solid #a1b4d9; color: #fff; font-weight: bold; padding: 12px ;}				
			#debug { margin-top: 50px; text-align:left;	}
			 #lower-section { border: 1px solid #a1b4d9; margin: 10px 0;padding:10px;  font-size:20px;}
		</style></head><body text="#000000" bgcolor="#ffffff" dir="ltr"><div id="content"><div id="error-section" class="rounded"><h1>');
       define( "AS_I_TOP_A", '</h1></div><div id="lower-section" class="rounded">');
       
      define( "AS_E_BOT", 'Thank you for noticing this.<br>We\'re working to fix this as quickly as possible. <br>Please check back again soon.
            </div></div></div></body></html>');


      define( "AS_I_BOT", '</div></div></div></body></html>');

      define( "AS_I_BOT_A", '</div></div></div></body></html>');

      define( "AS_I_BOT_B", '</div></div></div></body></html>');

      define( "AS_I_BOT_C", '</div></div></div></body></html>');


?>
