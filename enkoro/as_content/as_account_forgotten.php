<?php include as_site_theme("as_theme_header.php"); ?>
<section>
	

<div id="container">
<p id="back-top"> <a href="#top"><span></span></a> </p>
<div class="container">
<div id="notification"> </div>
<div class="row">
<div class="span9">
	<div class="row">
<div class="span9  " id="content">  <div class="breadcrumb">
        <a href="http://localhost/writers/admin/index.php?route=common/home">Home</a>
         &raquo; <a href="http://localhost/writers/admin/index.php?route=account/account">Account</a>
         &raquo; <a href="http://localhost/writers/admin/index.php?route=account/forgotten">Forgotten Password</a>
      </div>
  <h1>Forgot Your Password?</h1>
  <div class="box-container">
    <form action="http://localhost/writers/admin/index.php?route=account/forgotten" method="post" enctype="multipart/form-data" id="forgotten">
      <p>Enter the e-mail address associated with your account. Click submit to have your password e-mailed to you.</p>
      <h2>Your E-Mail Address</h2>
      <div class="content">
        <table class="form">
          <tr>
            <td>E-Mail Address:</td>
            <td><input type="text" name="email" value="" /></td>
          </tr>
        </table>
      </div>
      <div class="buttons">
        <div class="left"><a href="http://localhost/writers/admin/index.php?route=account/login" class="button"><span>Back</span></a></div>
        <div class="right">
          <a onclick="$('#forgotten').submit();" class="button"><span>Continue</span></a>
        </div>
      </div>
    </form>
  </div>
  </div>
  	</div>
</div>
<aside class="span3" id="column-right">
    <div class="box account">
  <div class="box-heading">Account</div>
  <div class="box-content">
    <ul class="acount">
            <li><a href="http://localhost/writers/admin/index.php?route=account/login">Login</a> / <a href="http://localhost/writers/admin/index.php?route=account/register">Register</a></li>
      <li><a href="http://localhost/writers/admin/index.php?route=account/forgotten">Forgotten Password</a></li>
            <li><a href="http://localhost/writers/admin/index.php?route=account/account">My Account</a></li>
            <li><a href="http://localhost/writers/admin/index.php?route=account/address">Address Books</a></li>
      <li><a href="http://localhost/writers/admin/index.php?route=account/wishlist">Wish List</a></li>
      <li><a href="http://localhost/writers/admin/index.php?route=account/order">Order History</a></li>
      <li><a href="http://localhost/writers/admin/index.php?route=account/download">Downloads</a></li>
      <li><a href="http://localhost/writers/admin/index.php?route=account/return">Returns</a></li>
      <li><a href="http://localhost/writers/admin/index.php?route=account/transaction">Transactions</a></li>
      <li><a href="http://localhost/writers/admin/index.php?route=account/newsletter">Newsletter</a></li>
          </ul>
  </div>
</div>
  </aside>
  
<div class="clear"></div>
</div>
</div>
</div>
<div class="clear"></div>
</section>
<?php include as_site_theme("as_theme_header.php"); ?>
