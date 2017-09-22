<?php
	
	$as_request = isset( $_GET['as_request'] ) ? $_GET['as_request'] : "";
	$as_userid = isset( $_GET['as_userid'] ) ? $_GET['as_userid'] : "";
	
    switch ( $as_request) {
		case 'login':
			as_login();
			break;
		case 'logout':
			as_logout();
			break;
		case 'new_user':
			as_new_user();
			break;
		case 'view_user':
			as_view_user($as_userid);
			break;
		case 'admin_users':
			as_admin_users();
			break;
		default:
			as_users();
	}
	
	function as_new_user(){
		$results = array();
		$as_pageinfo['pageTitle'] = "New Site User";
		$as_pageinfo['pageAction'] = "Add a New Site User";
		$as_pageinfo['formAction'] = "as_users.php?as_request=new_user";
  
		if (as_clicked('CancelPost')) {
			header( "Location: ".as_siteLynk()."as_users.php");
						
		} else if (as_clicked('SaveClose')) {
			as_add_new_user();			
			header( "Location: ".as_siteLynk()."as_users.php");
						
		} else if (as_clicked('SaveAdd')) {
			as_add_new_user();			
			header( "Location: ".as_siteLynk()."as_users.php?as_request=new_user");
						
		} else {
			require( AS_CONT."as_admin/as_user_new.php" );
		}
			
	}
	
	function as_users() {
        $results = array();
		$as_pageinfo['pageTitle'] = "Latest Users";
		$as_pageinfo['pageAction'] = "Latest Users";
		require( AS_CONT . "as_user_all.php" );
	}

	function as_admin_users() {
        $results = array();
		$as_pageinfo['pageTitle'] = "Site Admins";
		$as_pageinfo['pageAction'] = "Site Admins";
		$as_pageinfo['formAction'] = "as_users.php?as_request=admin_users";
            if (as_clicked('AddAdmin')) {
			as_add_admin($_POST['admin_username']);			
			header( "Location: ".as_siteLynk()."as_users.php?as_request=admin_users");
						
		} else {
			require( AS_CONT."as_admin/as_user_admin.php" );
		}
		
	}

   function as_view_user($as_userid) {
		$results = array();
		$as_pageinfo['formAction'] = "as_users.php?as_request=view_user&amp;as_userid=".$as_userid;
		
  		$as_db_query = "SELECT * FROM as_user WHERE userid = '$as_userid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
                    list( $userid, $user_name, $user_fname) = $database->get_row( $as_db_query );
		    $as_pageinfo['user'] = $userid;
		} else  {
		    return false;
		    header( "Location: ".as_siteLynk()."as_users.php");
		}
		                
		$as_pageinfo['pageTitle'] = "View User";
		$as_pageinfo['pageAction'] = "user Information";
		
		if (as_clicked('CancelPost')) {
			header( "Location: ".as_siteLynk()."as_users.php");
						
		} else if (as_clicked('PostUser')) {
			as_edit_user($as_userid);			
			header( "Location: ".as_siteLynk()."as_users.php");
						
		} else if (as_clicked('PostUserAdd')) {
			as_edit_user($as_userid);			
			header( "Location: ".as_siteLynk()."as_users.php?as_request=new_user");
						
		} else {
			require( AS_CONT."as_admin/as_user_view.php" );
		}
	}
?>
