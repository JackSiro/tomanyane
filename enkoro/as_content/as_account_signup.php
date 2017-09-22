<?php
	as_user_to_login();
	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = 'Sign Up to your Account';
	$as_pageinfo['formAction'] = "signup".as_urlExt."?as_request=user_signup";

	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
						
	$fielderrors = array();

	if (as_clicked('SignMeUp')) {
		$database = new As_Dbconn();			
		
		$infirstname = as_post_text('signup_firstname');
		$insurname = as_post_text('signup_surname');
		$ingender = as_post_text('signup_sex');
		$inmobile = as_post_text('signup_mobile');
		$inemail = as_post_text('signup_email');
		$inusername = as_post_text('signup_username');
		$inpassword = as_post_text('signup_password');
		$inpasscon = as_post_text('signup_passconfirm');
		
		$fielderrors = array_merge($infirstname, $insurname, $ingender, $inmobile, $inemail, $inusername, $inpassword, $inpasscon);
		if (empty($fielderrors)) {
			$matchuseremails=as_db_user_find_by_email($inemail);
			$matchusernames=as_db_user_find_by_username($inusername);
			
			if (count($matchuseremails)==1) {
				$as_errmsg_arr[] = 'The email '.$inemail.' is already in use.';
				$as_errflag = true;
			}

			if (count($matchusernames)==1) {
				$as_errmsg_arr[] = 'The email '.$inusername.' is already in use.';
				$as_errflag = true;
			}
			
			if ( preg_match('/\s/',$inusername) ) {
				$as_errmsg_arr[] = 'Your username should be one word, you may use underscore to join 2 words.';
				$as_errflag = true;
			}
			
			if ( preg_match('/\-/',$inusername) ) {
				$as_errmsg_arr[] = 'Your username should contain hyphen (-), you may use underscore (_) instead to join 2 words.';
				$as_errflag = true;
			}
			
			if($inpasscon != $inpassword) {
				$as_errmsg_arr[] = 'Your passwords do not match.';
				$as_errflag = true;		
			}
			if (strlen($inusername) < 5 ) {
				$as_errmsg_arr[] = 'Your username is too short. It should be at least five (5) characters';
				$as_errflag = true;		
			} 
			if($as_errflag) {
				$_SESSION['AS_ERRMSG_ARR'] = $as_errmsg_arr;
				session_write_close();
				
				//setcookie('temp_firstname', $infirstname, time()+60*60*24*365, '/', as_siteUrl);
				//setcookie('temp_surname', $insurname, time()+60*60*24*365, '/', as_siteUrl);
				//setcookie('temp_username',  $inusername, time()+60*60*24*365, '/', as_siteUrl);
				//setcookie('temp_email', $inemail, time()+60*60*24*365, '/', as_siteUrl);
				
				header( "Location: ".as_siteUrl."signup".as_urlExt);
				exit();
			}
		
			$New_User_Details = array(		
				'user_fname' => $infirstname,
				'user_sname' => $insurname,
				'user_sex' => $ingender,
				'user_name' => $inusername,
				'user_mobile' => $inmobile,
				'user_email' => $inemail,
				'user_password' => md5($inpassword),
				'user_joined' => date('Y-m-d H:i:s'),
			);
			$add_query = $database->as_insert( 'as_user', $New_User_Details );
			as_set_logged_in_user($database->as_db_lastid(), $inusername, 0);
			$as_errmsg_arr[] = 'You have signed up successfully. Welcome to '.as_siteTitle;
			$as_errflag = true;
			$_SESSION['AS_ERRMSG_ARR'] = $as_errmsg_arr;
			header( "Location: ".as_siteUrl."index".as_urlExt);
		} else {
			$as_errmsg_arr[] = 'Unfortunately your sign up process failed. Please try again.';
			$as_errflag = true;
			$_SESSION['AS_ERRMSG_ARR'] = $as_errmsg_arr;
			header( "Location: ".as_siteUrl."signup".as_urlExt);
		}
	} 
	
	include as_site_theme("as_theme_header.php");
 ?>
<!-- /.navbar -->

	<header id="head" class="secondary"></header>

		
	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index<?php echo as_urlExt ?>">Home</a></li>
			<li class="active">Sign Up</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title"><?php echo $as_pageinfo['pageTitle'] ?></h1>
				</header>
				<?php as_feedback_message() ?>
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Sign up a new account</h3>
							<p class="text-center text-muted">Already have an Account? <a href="signin.html">Sign In</a></p>
							
							<hr>

							<form role="form" method="post" name="PostNow" action="<?php echo $as_pageinfo['formAction'] ?>" enctype="multipart/form-data">
						 
								<div class="row top-margin">
									<div class="col-sm-6">
										<label>First Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="signup_firstname" autocomplete="off" required>
									</div>
									<div class="col-sm-6">
										<label>Last Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="signup_surname" autocomplete="off" required>
									</div>
								</div>
								
								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Sex: <span class="text-danger">*</span></label>
										<div class="form-control">
											<label>Male: &nbsp;<input type="radio" value="1" name="signup_sex" required>&nbsp;</label>&nbsp;&nbsp;
											<label>Female: &nbsp;<input type="radio" value="2" name="signup_sex" required>&nbsp;</label>
										</div>
									</div>
									<div class="col-sm-6">
										<label>Mobile Phone: <span class="text-danger">*</span></label>
										<input type="text" class="form-control" name="signup_mobile" autocomplete="off" required>
									</div>
								</div>
								
								<div class="top-margin">
									<label>Email Address <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="signup_email" autocomplete="off" required>
								</div>

								<div class="top-margin">
									<label>Preffered Username: <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="signup_username" autocomplete="off" required>
								</div>

								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Preffered Password: <span class="text-danger">*</span></label>
										<input type="password" class="form-control" name="signup_password" autocomplete="off" required>
									</div>
									<div class="col-sm-6">
										<label>Confirm Password: <span class="text-danger">*</span></label>
										<input type="password" class="form-control" name="signup_passconfirm" autocomplete="off" required>
									</div>
								</div>
								
								<hr>
								<div class="row">
									<div class="col-lg-8">
										<label class="checkbox">
											<input type="checkbox" name="signup_terms" required> 
											I've read the <a href="page_terms.html">Terms and Conditions</a>
										</label>                        
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" name="SignMeUp" type="submit">SIGN UP</button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->

<?php  include as_site_theme("as_theme_footer.php");  ?>