<!DOCTYPE html>
<html>
	<title><?php echo $pageTitle ?></title>
	<meta name="keywords" content="<?php echo $pageKeywords ?>">
	<meta name="description" content="<?php echo $pageDescription ?>">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?php echo as_siteUrl ?>as_themes/tujuane/css/as-styles.css">
	<link rel="stylesheet" href="<?php echo as_siteUrl ?>as_themes/tujuane/css/as-styles1.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
	html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
	</style>
	<body class="as-theme-l5">

	<!-- Navbar -->
	<div class="as-top">
	 <ul class="as-navbar as-theme-d2 as-left-align as-large">
	  <li class="as-hide-medium as-hide-large as-opennav as-right">
		<a class="as-padding-large as-hover-white as-large as-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
	  </li>
	  <li><a href="#" class="as-padding-large as-theme-d4"><i class="fa fa-home as-margin-right"></i>Logo</a></li>
	  <li class="as-hide-small"><a href="#" class="as-padding-large as-hover-white" title="News"><i class="fa fa-globe"></i></a></li>
	  <li class="as-hide-small"><a href="#" class="as-padding-large as-hover-white" title="Account Settings"><i class="fa fa-user"></i></a></li>
	  <li class="as-hide-small"><a href="#" class="as-padding-large as-hover-white" title="Messages"><i class="fa fa-envelope"></i></a></li>
	  <li class="as-hide-small as-dropdown-hover">
		<a href="#" class="as-padding-large as-hover-white" title="Notifications"><i class="fa fa-bell"></i><span class="as-badge as-right as-small as-green">3</span></a>     
		<div class="as-dropdown-content as-white as-card-4">
		  <a href="#">One new friend request</a>
		  <a href="#">John Doe posted on your wall</a>
		  <a href="#">Jane likes your post</a>
		</div>
	  </li>
	  <li class="as-hide-small as-right"><a href="#" class="as-padding-large as-hover-white" title="My Account"><img src="<?php echo as_siteUrl ?>as_media/data/avatar2.png" class="as-circle" style="height:25px;width:25px" alt="Avatar"></a></li>
	 </ul>
	</div>

	<!-- Navbar on small screens -->
	<div id="navDemo" class="as-hide as-hide-large as-hide-medium as-top" style="margin-top:51px">
	  <ul class="as-navbar as-left-align as-large as-theme">
		<li><a class="as-padding-large" href="#">Link 1</a></li>
		<li><a class="as-padding-large" href="#">Link 2</a></li>
		<li><a class="as-padding-large" href="#">Link 3</a></li>
		<li><a class="as-padding-large" href="#">My Profile</a></li>
	  </ul>
	</div>