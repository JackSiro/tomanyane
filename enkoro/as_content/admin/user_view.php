<?php 
	$as_pageinfo = array();
	$as_pageinfo['pageTitle'] = "Member Profile";
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
	$database = new As_Dbconn();
	$as_userid = isset( $_GET['as_userid'] ) ? $_GET['as_userid'] : "";			
	$as_db_query = "SELECT * FROM as_user WHERE userid = '$as_userid'";
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $userid, $user_name, $user_fname, $user_sname, $user_sex, $user_password, $user_mobile, $user_email, $user_group, $user_level, $user_avatar, $user_joined, $user_lastseen, $user_updated) = $database->get_row( $as_db_query );
		$as_pageinfo['user'] = $userid;
	} 
	$as_pageinfo['pageAction'] = $user_fname.' '.$user_sname;
	$as_pageinfo['formAction'] = "?as_request=user_view&&as_userid=".$as_userid;
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
	
	$fielderrors = array();
	$inuserid = as_post_text('userid');
	$inusername = as_post_text('username');
	$inuserfname = as_post_text('userfname');
	$inusersname = as_post_text('usersname');
	$inusersex = as_post_text('usersex');
	$inusermobile = as_post_text('usermobile');
	$inuseremail = as_post_text('useremail');
	$inusergroup = as_post_text('usergroup');
	$inuseravatar = as_post_text('useravatar');
	if (as_clicked('UpdateProfile')) {
		/*$raw_file_name = basename($_FILES["NewItemImg"]["name"]);
		$temp_file_name = $_FILES["NewItemImg"]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'slide_'.time().'.'.$upload_file_ext[1];
		$target_file = AS_TARGET . $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
		if (move_uploaded_file($temp_file_name, $target_file)) $as_saleitemimg = $finalname;
		else $as_saleitemimg = as_post_text('PrevItemImg');*/	
		$Update_User_Details = array(
			'user_name' => $inusername,
			'user_fname' => $inuserfname,
			'user_sname' => $inusersname,
			'user_sex' => $inusersex,
			'user_mobile' => $inusermobile,
			'user_email' => $inuseremail,
			'user_group' => $inusergroup,
		    'user_updated' => date('Y-m-d H:i:s'),
		);
		$where_clause = array('userid' => $inuserid);
		$updated = $database->as_update( 'as_user', $Update_User_Details, $where_clause, 1 );
		if( $updated )	{	}			
		header( "Location: ".as_adminUrl."?as_request=user_view&&as_userid=".$inuserid);
	} 
	include AS_CONT."admin/theme_header.php";
?>
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
			<?php include AS_CONT."admin/theme_leftsidebar.php"; ?>
        </section>
        <!-- /.sidebar -->
      </aside>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?php echo 'Administrator | <small style="text-transform:uppercase">'.$as_pageinfo['pageTitle'].'</small>' ?>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><?php echo $as_pageinfo['pageTitle'] ?></a></li>
            <li class="active"><?php echo $as_pageinfo['pageAction'] ?></li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img class="profile-user-img img-responsive img-circle" src="as_media/avata/<?php echo $user_avatar ?>" alt="User profile picture">
                  <h3 class="profile-username text-center"><?php echo $user_fname.' '.$user_sname ?></h3>
                  <p class="text-muted text-center"><?php echo as_user_grp($user_group) ?> (<?php echo as_user_sex($user_sex) ?>)</p>
                  <ul class="list-group list-group-unbordered">
                    <li class="list-group-item">
                      <b>Joined</b> <a class="pull-right"><?php echo as_timeago_now($user_joined) ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Updated</b> <a class="pull-right"><?php echo as_timeago_now($user_updated) ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Last Seen</b> <a class="pull-right"><?php echo as_timeago_now($user_lastseen) ?></a>
                    </li>
                  </ul>
                  <!--<a href="#" class="btn btn-primary btn-block"><b>Flag</b></a>-->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
              <!-- About Me Box -->
              <!--<div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About Me</h3>
                </div>
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Education</strong>
                  <p class="text-muted">
                    B.S. in Computer Science from the University of Tennessee at Knoxville
                  </p>
                  <hr>
                  <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                  <p class="text-muted">Malibu, California</p>
                  <hr>
                  <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                  <p>
                    <span class="label label-danger">UI Design</span>
                    <span class="label label-success">Coding</span>
                    <span class="label label-info">Javascript</span>
                    <span class="label label-warning">PHP</span>
                    <span class="label label-primary">Node.js</span>
                  </p>
                  <hr>
                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div><! -- /.box-body - ->
              </div>--><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#activity" data-toggle="tab">Profile View</a></li>
                  <li><a href="#timeline" data-toggle="tab">Activity</a></li>
                  <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <div class="post">
						<h4><a href="#">Sex:</a> <?php echo as_user_sexfull($user_sex) ?></h4>
						<h4><a href="#">Username:</a> <?php echo $user_name ?></h4>
						<h4><a href="#">Mobile Phone:</a> <?php echo $user_mobile ?></h4>
						<h4><a href="#">Email Address:</a> <?php echo $user_email ?></h4>						
					</div>
                    <div class="post">
						<h4><a href="#">User Group: </a> <?php echo as_user_grp($user_group) ?></h4>
						<h4><a href="#">User Level: </a> <?php echo as_user_lvl($user_level) ?></h4>
					</div>
                    <div class="post">
						<h4><a href="#">Register/Joined: </a> <?php echo $user_joined ?></h4>
						<h4><a href="#">Profile updated:</a> <?php echo $user_updated ?></h4>
						<h4><a href="#">Last Seen Online:</a> <?php echo $user_lastseen ?></h4>
					</div>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <ul class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                      </li>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-envelope bg-blue"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>
                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a class="btn btn-primary btn-xs">Read more</a>
                            <a class="btn btn-danger btn-xs">Delete</a>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-user bg-aqua"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
                          <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request</h3>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <li>
                        <i class="fa fa-comments bg-yellow"></i>
                        <div class="timeline-item">
                          <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>
                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                          </div>
                        </div>
                      </li>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                      </li>
                      <!-- END timeline item -->
                      <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                      </li>
                    </ul>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" role="form" method="post" name="PostUser" action="<?php echo $as_pageinfo['formAction'] ?>" enctype="multipart/form-data">
                       <input type="hidden" name="userid" value="<?php echo $userid ?>"/>
					  <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">First Name: </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" name="userfname" value="<?php echo $user_fname ?>"/>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Last Name: </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" name="usersname" value="<?php echo $user_sname ?>"/>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Username: </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" name="username" value="<?php echo $user_name ?>"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email Address: </label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail" name="useremail" value="<?php echo $user_email ?>"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Mobile Phone: </label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputName" name="usermobile" value="<?php echo $user_mobile ?>"/>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">User Sex: </label>
                        <div class="col-sm-10">
                          <select class="form-control" id="inputName" name="usersex"/>
							<option value="<?php echo $user_sex ?>"><?php echo as_user_sexfull($user_sex) ?></option>
							<option value="1">Male</option>
							<option value="2">Female</option>
						  </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">User Group: </label>
                        <div class="col-sm-10">
                          <select class="form-control" id="inputName" name="usergroup"/>
							<option value="<?php echo $user_group ?>"><?php echo as_user_grp($user_group) ?></option>
							<option value="0">Normal Member</option>
							<option value="2">Client Member</option>
							<option value="1">Administrator</option>
						  </select>
                        </div>
                      </div>
                      <!--<div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Experience</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>-->
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <input name="UpdateProfile" class="btn btn-danger" type="submit" class="form-control" value="Update Profile" />
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div>
        </section>
      </div>
<?php include AS_CONT."admin/theme_footer.php"; ?>
<!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
<?php include AS_CONT."admin/theme_control_sidebar.php"; ?>
</ul>
          </div>
<?php include AS_CONT."admin/theme_settings_tab.php"; ?>
</div>
      </aside>
      <div class="control-sidebar-bg"></div>
    </div>
<?php include AS_CONT."admin/theme_bottom.php"; ?>