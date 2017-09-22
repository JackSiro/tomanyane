<?php
		as_user_to_login();
		$as_pageinfo = array();	 
		$as_pageinfo['pageTitle'] = 'Sign in to your Account';
	
		require_once AS_FUNC."as_paging.php";
		
		include as_site_theme("as_theme_header.php");
 ?>
<!-- /.navbar -->

	<header id="head" class="secondary"></header>

		
	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.html">Home</a></li>
			<li class="active">Sign In</li>
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
							<h3 class="thin text-center">Sign in to your account</h3>
							<p class="text-center text-muted">Don't have an acoount? <a href="<?php echo as_siteUrl.'signup'.as_urlExt ?>">Sign Up Now</a></p>
							<hr>
							
							<form action="<?php echo as_siteUrl.'signin'.as_urlExt ?>" method="post" enctype="multipart/form-data" id="login">
								<div class="top-margin">
									<label>Username/Email <span class="text-danger">*</span></label>
									<input type="text" name="loginname" class="form-control" autocomplete="off" required>
								</div>
								<div class="top-margin">
									<label>Password <span class="text-danger">*</span></label>
									<input type="password" name="loginkey" class="form-control" autocomplete="off" required>
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										<b><a href="">Forgot password?</a></b>
									</div>
									<div class="col-lg-4 text-right">
										<input class="btn btn-action" type="submit" name="LetMeIn" value="SIGN IN"/>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->
			<!--
			<div class="box-content">
			<ul class="acount">
					<li><a href="<?php// echo as_siteUrl ?>account/login">Login</a> / <a href="<?php //echo as_siteUrl ?>account/register">Register</a></li>
			  <li><a href="<?php //echo as_siteUrl ?>account/forgotten">Forgotten Password</a></li>
					<li><a href="<?php //echo as_siteUrl ?>account/account">My Account</a></li>
					<li><a href="<?php //echo as_siteUrl ?>account/address">Address Books</a></li>
			  <li><a href="<?php //echo as_siteUrl ?>account/wishlist">Wish List</a></li>
			  <li><a href="<?php //echo as_siteUrl ?>account/order">Order History</a></li>
			  <li><a href="<?php //echo as_siteUrl ?>account/download">Downloads</a></li>
			  <li><a href="<?php //echo as_siteUrl ?>account/return">Returns</a></li>
			  <li><a href="<?php //echo as_siteUrl ?>account/transaction">Transactions</a></li>
			  <li><a href="<?php //echo as_siteUrl ?>account/newsletter">Newsletter</a></li>
				  </ul>
		  </div>-->
		</div>
	</div>	<!-- /container -->

<?php  include as_site_theme("as_theme_footer.php");  ?>