<?php
$success = '';
$errorhtml = '';
$suggest = '';
$buttons = array();
$fields = array();
$fieldserrors = array();
$hidden = array();
	
	require_once AS_FUNC.'as_users.php';
	
	if (as_clicked('DatabaseSetup')) {
		$database = as_post_text('database');
		$username = as_post_text('username');
		$password = as_post_text('password');
		$emailto = as_post_text('emailto');
		$emailfrom = as_post_text('emailfrom');

		$fielderrors = array_merge($database, $username,$password, $emailto, $emailfrom);
		if (empty($fielderrors)) {
			$filename = "as_config.php";
			$lines = file($filename, FILE_IGNORE_NEW_LINES );
			$lines[14] = '	define( "AS_DB", "'.$database.'" );';
			$lines[15] = '	define( "AS_USER", "'.$username.'" );';
			$lines[16] = '	define( "AS_PASS", "'.$password.'"  );';
			$lines[17] = '	define( "AS_ERROR_RECEIVER", "'.$emailto.'"  );';
			$lines[18] = '	define( "AS_ERROR_SENDER", "'.$emailfrom.'"  );';
			
			file_put_contents($filename, implode("\n", $lines));
			header("location: ".AS_SITEURL);
		}
	}

	else if (as_clicked('SuperAdmin')) {
		$firstname = as_post_text('firstname');
		$surname = as_post_text('surname');
		$username = as_post_text('username');
		$email = as_post_text('email');
		$password = as_post_text('password');

		$fielderrors = array_merge($firstname, $surname,$username, $email, $password);
		if (empty($fielderrors)) {
			//as_add_new_user($firstname, $surname, $email, $username, $password, 1, 5);
			
			$New_Item_Details = array(
				'user_name' => $username,
				'user_fname' => $firstname,
				'user_sname' => $surname,
				'user_password' => md5($password),
				'user_email' => $email,
				'user_group' => 1,
				'user_level' => 5,
				'user_joined' => date('Y-m-d H:i:s'),
			);			
			$add_query = $database->as_insert( 'as_user', $New_Item_Details );
			//return $database->as_db_lastid();	
			/*$title = 'Congratulations for signing up on the next big site';
			$first_name = $firstname.' '.$surname;
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'To: '. $firstname.' '.$surname.' <'.$email.'>' . "\r\n";
			$headers .= 'From: '.as_siteTitle.' <'.AS_ERROR_SENDER.'>' . "\r\n";
		
			$message = '<p>Hi '.$first_name.',</p>';
			$message = '<p>This is a system email to inform you that your account creation on our site on '.date('Y-m-d at H:i:s').' was successfully.</p>';
			$message .= '<p>To login to your site you will either use the email you used or the username you used to created '.$username.' with the password you chose. Incase you have a problem to login simply use the password or username reset links on the site.</p>';
			$message = '<p><br><br>With regards, <br> Site Admin<br>This site.</p>';
			$message = '<p><br><br><pre>Dont reply to this email because it will go nowhere if you did so</p>';
			
			//mail( trim($_POST['email']), $title, $message, $headers); */

			header("location: ".AS_SITEURL);
		}
	}

	else if (as_clicked('SiteSetup')) {
		$sitename = as_post_text('sitename');
		$siteurl = as_post_text('siteurl');
		$tagline = as_post_text('tagline');
		$keywords = as_post_text('keywords');
		$description = as_post_text('description');

		$fielderrors = array_merge($sitename, $siteurl,$keywords, $description);
		if (empty($fielderrors)) {
			as_new_option('as_sitename', $sitename, 1);
			as_new_option('as_siteurl', $siteurl, 1);	
			as_new_option('as_tagline', $tagline, 0);	
			as_new_option('as_keywords', $keywords, 1);		
			as_new_option('as_description', $description, 1);		
			as_new_option('as_template', 'default', 1);
			as_new_option('as_homepage', 'default', 1);
			as_new_option('as_maintainance', '0', 1);
			as_new_option('as_urltype', '0', 1);
			as_new_option('as_urlext', '', 1);
			as_new_option('as_mainmenu', '1', 0);		
			as_new_option('as_sitetheme', 'Modern', 0);
			
			//site initialization
			as_system_new_page(1, 'Welcome to '.$sitename,
				'<h3>Welcome to the best site</h3><p>Everything starts here. This is a sample default page auto-created for you. You can modify it or simply create a new page when you login to your dashboard.<br><br>There are many options as well as tools awaiting you when you log in to your account.<br><br>System.</p>');
			as_system_new_menu('Main Menu', 'the menu created by default');
			as_system_new_menuitem(1, 'HomePage', 'index', 'site home page');	
			
			header("location: ".AS_SITEURL);
		}
	}	
	
	?>
<!DOCTYPE html>
<html>
	<head>
		<title>Checkout AppSmata</title>
		<style>
			body { font-family: arial,sans-serif; font-size:0px;margin: 50px 10px;	padding: 0; text-align: center;background: #EEE; color: darkgreen;	} h1{font-size:30px;} input[type="text"],input[type="email"],input[type="password"],textarea{font-size:20px;padding:5px;width:100%; color:#000; border:1px solid #999; border-radius: 5px; background:#EEE;} table{width:80%;margin:10px;} input[type="submit"]{background:#B00; color:#FFF; padding:10px 20px; border:1px solid #FFF; font-size:25px; border-radius: 5px; } img { border: 0; } .rounded {	-webkit-border-radius: 12px;	-moz-border-radius: 12px; border-radius: 12px;} .rounded_i {	-webkit-border-radius: 10px 10px 0px 0px;	-moz-border-radius: 10px 10px 0px 0px; border-radius: 10px 10px 0px 0px;} .rounded_ii { border: 1px solid #F00; margin-top:10px; padding:20px; -webkit-border-radius: 0px 0px 10px 10px;	-moz-border-radius: 0px 0px 10px 10px; border-radius: 0px 0px 10px 10px;} #content { margin: 0 auto;	width: 800px; } .title-section { background-color: #FF0000;	border: 1px solid #EEE; color: #fff; font-weight: bold; padding: 12px ;}#debug { margin-top: 50px; text-align:left;	}.main-section { border: 1px solid #B00; background:#FFF; margin: 5px;padding:10px;  font-size:20px;} .mid-section { border: 1px solid #F00; background:#FFF; margin-top: 10px; font-size:20px;}
		</style>
	</head>
	<body>
		<div id="content">
		  <div class="main-section rounded">
			<div class="title-section rounded_i">	
				<h1><?php echo $as_err['errtitle'] ?></h1>
			</div>
			<div class="mid-section">	
				<p><?php echo $as_err['errsumm'] ?></p>
			</div>	
			<form method="post" action="<?php //echo AS_SITEURL ?>" class="rounded_ii">						
<?php 
		if ($as_err['errno']==1){ 
			$fields = array(
				'database' => array('label' => 'Database Name:', 'type' => 'text', 'value' => AS_DB),
				'username' => array('label' => 'Database Username:', 'type' => 'text', 'value' => AS_USER),
				'password' => array('label' => 'Database Password:', 'type' => 'password', 'value' => ''),
				'emailto' => array('label' => 'Send Errors To (Email):', 'type' => 'email', 'value' => AS_ERROR_RECEIVER),
				'emailfrom' => array('label' => 'Send Errors From (Email):', 'type' => 'email', 'value' => AS_ERROR_SENDER),
			);
			
			$buttons = array('DatabaseSetup' => 'Connect to the Database');
		} 
		else if ($as_err['errno']==2){ 
			$fields = array(
				'firstname' => array('label' => 'First Name:', 'type' => 'text', 'value' => ''),
				'surname' => array('label' => 'Last Name:', 'type' => 'text', 'value' => ''),
				'username' => array('label' => 'Username:', 'type' => 'text', 'value' => ''),
				'email' => array('label' => 'Email Address:', 'type' => 'email', 'value' => ''),
				'password' => array('label' => 'Password:', 'type' => 'password', 'value' => ''),
			);
			
			$buttons = array('SuperAdmin' => 'Create An Administrator');
		} 
		else if ($as_err['errno']==3){ 
			$fields = array(
				'sitename' => array('label' => 'Site Name:', 'type' => 'text', 'value' => ""),
				'siteurl' => array('label' => 'Site Url:', 'type' => 'text', 'value' => AS_SITEURL()),
				'tagline' => array('label' => 'Tagline:', 'type' => 'text', 'value' => ""),
				'keywords' => array('label' => 'Keywords:', 'type' => 'text', 'value' => ""),
				'description' => array('label' => 'Description:', 'type' => 'text', 'value' => ""),
			);
			
			$buttons = array('SiteSetup' => 'Save Options');
		} 
		?>
	<?php if (count($fields)) { ?>
			<table>
	<?php foreach($fields as $name => $field) { ?>
				<tr>	
						<th><?php echo as_html($field['label']) ?></th>	
						<td><?php echo'<input type="'.as_html($field['type']).'" size="24" name="'.as_html($name).'" value="'.as_html($field['value']).'" autocomplete="off" />'; ?></td>
		<?php if (isset($fielderrors[$name])) 
			echo '<td class="msg-error"><small>'.as_html($fielderrors[$name]).'<small></td>';
		else ?>
				<td></td>
					</tr>			
	<?php } ?>
			</table>
				<?php } 
		foreach ($buttons as $name => $value)
			echo '<input type="submit" name="'.as_html($name).'" value="'.as_html($value).'" />';
		foreach ($hidden as $name => $value)
			echo '<input type="hidden" name="'.as_html($name).'" value="'.as_html($value).'" />';
	?>	
<?php ?>
			</form>
		  </div>
		</div>
	</body>
</html>	
