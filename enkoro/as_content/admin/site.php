<?php
	
	session_start();
	require( 'as_config.php' );
	require AS_FUNC.'as_base.php';
	include AS_FUNC.'as_dbconn.php';
	include AS_FUNC.'as_options.php';
	include AS_FUNC.'as_paging.php';
	include AS_FUNC.'as_posting.php';
	include AS_FUNC.'as_users.php';
 		
	$as_request = isset( $_GET['as_request'] ) ? $_GET['as_request'] : "";
	$as_userid = isset( $_GET['as_userid'] ) ? $_GET['as_userid'] : "";
	$username = isset ( $_COOKIE["as_site_username"]) ? $_COOKIE["as_site_username"] : "";
	
        switch ( $as_request) {
		case 'login':
			as_login();
			break;
		case 'logout':
			as_logout();
			break;
		case 'as_site_slides':
			as_site_slides();
			break;
		default:
			as_site_general();
	}
	
	function as_site_general(){
		$results = array();
		$as_pageinfo['pageTitle'] = "General Settings";
		$as_pageinfo['pageAction'] = "Site Settings";
		$as_pageinfo['formAction'] = "as_site.php";
		$as_loginid = $_SESSION['78e9e89c281686f4e051fe42c1675150'];
		
		if (as_clicked('GeneralSettings')) {
			
			as_set_option('sitename', $_POST['sitename'], $as_loginid);	
			as_set_option('keywords', $_POST['keywords'], $as_loginid);
			as_set_option('description', $_POST['description'], $as_loginid);
			as_set_option('siteurl', $_POST['siteurl'], $as_loginid);
			as_set_option('adminsite', $_POST['adminsite'], $as_loginid);
			as_set_option('adminurl', $_POST['adminurl'], $as_loginid);
			
			header( "Location: ".as_siteLynk()."as_site.php");						
		}  else if (as_clicked('CancelPost')) {
			header( "Location: ".as_siteLynk()."as_site.php");						
		}  else {
			require( AS_CONT."as_admin/as_site_general.php" );
		}
	}
	
	function as_site_slides(){
		$results = array();
		$as_pageinfo['pageTitle'] = "Slideshow";
		$as_pageinfo['pageAction'] = "Manage Slideshows";
		$as_pageinfo['formAction'] = "as_site.php?as_request=as_slideshow";
  		
  		$as_db_query = "SELECT * FROM as_slideshow WHERE slag = 'slide1'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $slideid, $slag, $title, $link, $image) = $database->get_row( $as_db_query );
		    $as_pageinfo['title_slide1'] = $title;
		    $as_pageinfo['link_slide1'] = $link;
		    $as_pageinfo['image_slide1'] = $image;
		} else  {
		    as_new_slideshow('Slide 1', 'Slide 1 Title', as_mainUrl(), 'slide1.jpg');  	 
		}
  		
  		$as_db_query = "SELECT * FROM as_slideshow WHERE slag = 'slide2'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $slideid, $slag, $title, $link, $image) = $database->get_row( $as_db_query );
		    $as_pageinfo['title_slide2'] = $title;
		    $as_pageinfo['link_slide2'] = $link;
		    $as_pageinfo['image_slide2'] = $image;
		} else  {
		    as_new_slideshow('Slide 2', 'Slide 2 Title', as_mainUrl(), 'slide2.jpg');  	 
		}
		
		$as_db_query = "SELECT * FROM as_slideshow WHERE slag = 'slide3'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $slideid, $slag, $title, $link, $image) = $database->get_row( $as_db_query );
		    $as_pageinfo['title_slide3'] = $title;
		    $as_pageinfo['link_slide3'] = $link;
		    $as_pageinfo['image_slide3'] = $image;
		} else  {
		    as_new_slideshow('Slide 3', 'Slide 3 Title', as_mainUrl(), 'slide3.jpg');  	 
		}
		
		$as_db_query = "SELECT * FROM as_slideshow WHERE slag = 'slide4'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
            list( $slideid, $slag, $title, $link, $image) = $database->get_row( $as_db_query );
		    $as_pageinfo['title_slide4'] = $title;
		    $as_pageinfo['link_slide4'] = $link;
		    $as_pageinfo['image_slide4'] = $image;
		} else  {
		    as_new_slideshow('Slide 4', 'Slide 4 Title', as_mainUrl(), 'slide4.jpg');  	    		
		}
		
		if (as_clicked('ResetDefaults')) {
			header( "Location: ".as_siteLynk()."as_site.php?as_request=as_slideshow");
						
		} else if (as_clicked('Slideshow1')) {
			as_edit_slideshow('slide1', 1);			
			header( "Location: ".as_siteLynk()."as_site.php?as_request=as_slideshow");
						
		} else if (as_clicked('Slideshow2')) {
			as_edit_slideshow('slide2', 2);			
			header( "Location: ".as_siteLynk()."as_site.php?as_request=as_slideshow");
						
		} else if (as_clicked('Slideshow3')) {
			as_edit_slideshow('slide3', 3);			
			header( "Location: ".as_siteLynk()."as_site.php?as_request=as_slideshow");
						
		} else if (as_clicked('Slideshow4')) {
			as_edit_slideshow('slide4', 4);			
			header( "Location: ".as_siteLynk()."as_site.php?as_request=as_slideshow");
						
		}  else {
			require( AS_CONT."as_admin/as_site_slides.php" );
		}
			
	}
	
?>
