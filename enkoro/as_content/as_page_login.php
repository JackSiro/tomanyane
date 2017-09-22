<?php

	$inloginname=as_post_text('loginname');
	$inloginkey=as_post_text('loginkey');
	$inremember=as_post_text('remember_me');

	if (as_clicked('DoLogin') && (strlen($inloginname) || strlen($inloginkey)) ) {
		if (strpos($inloginname, '@')!==false) {// handles can't contain @ symbols
			$matchusers=as_db_user_find_by_email($inloginname);
		} else {
			$matchusers=as_db_user_find_by_username($inloginname);
		}
		if (count($matchusers)==1) { 
			$inuserid=$matchusers[0];
			$as_db_query = "SELECT * FROM as_user WHERE userid='$inuserid'";
			$database = new As_Dbconn();
			list( $userid, $user_name, $user_fname, $user_sname, $user_sex, $user_password, $user_location, 
			$user_mobile, $user_email, $user_group, $user_level) = $database->get_row( $as_db_query );
			
			if (as_login_user($inuserid, md5($inloginkey))) { 
				$_SESSION['78e9e89c281686f4e051fe42c1675150'] = $inuserid;	
				$_SESSION['db0f6f37ebeb6ea09489124345af2a45'] = $user_level;	
				header('Location: index.html'.$inuserid);
			} else {
				header('Location: password_wrong');	
				//$errors['password']=as_lang('users/password_wrong');
			}
		} else
			//$errors['emailhandle']=as_lang('users/user_not_found');
			header('Location: user_not_found');
	}
		
	if (as_user_is_logged()) { ?>
				<?php if (as_user_is_admin($user_level)) { ?>
                    <li style="background:darkred">
						<a href="admin.html" >Administrator</a>
					</li>
				<?php } ?>
					<li class="dropdown" style="background:darkgreen">
					
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown"><?php echo $user_fname.' '.$user_sname ?><b class="caret"></b></a>
						<ul class="dropdown-menu">
                            <li>
                                <a href="account">My Account</a>
                            </li>
                            <li>
                                <a href="inbox">Notifications</a>
                            </li>
                            <li>
                                <a href="logout">Logout</a>
                            </li>
                        </ul>
					</li>
	<?php } else {  ?>
					<li class="dropdown" style="background:darkgreen">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown">Login <b class="caret"></b></a>						
					<div class="dropdown-menu login-box">
						<form action="<?php echo as_siteurl() ?>" method="post" class="form-lognbx">
							<div class="control-group form-group lognbx">
								<input type="text" name="loginname" class="form-control" id="loginname" required data-validation-required-message="Please enter your username or email." placeholder="Email or Username">
							</div>
							<div class="control-group form-group lognbx">
								<input type="password" name="loginkey" class="form-control" id="loginname" required data-validation-required-message="Please enter your password." placeholder="Password">
							</div>
							<div class="control-group form-group lognbx">
								<input type="checkbox" name="remember_me" id="remember_me" value="1">
								<label for="remember_me">Remember Me</label>
								<input type="hidden" name="code" value="0-1480960571-941aa1f6c9275b1640edcd1f60750a896c4d7ac6">
							</div>
							<div class="control-group form-group lognbx">
								<input type="submit" value="Login" class="btn btn-warning form-control" name="DoLogin">
							</div>
							<div class="control-group form-group lognbx">
								<a href="register" class="btn btn-success form-control">Register</a>
							</div>
						</form>						
					</div>					
                    </li>
		<?php } ?>