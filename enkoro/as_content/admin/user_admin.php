<?php 
	$as_pageinfo = array();
	$as_pageinfo['pageTitle'] = "Site Admins";
	$as_pageinfo['pageAction'] = "Site Admins";
	$as_pageinfo['formAction'] = "?as_request=user_admin";
	
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
						
	if (as_clicked('AddAdmin')) {
		as_add_admin($_POST['admin_username']);			
		header( "Location: ".as_adminUrl."?as_request=user_admin");
					
	}				
	include AS_CONT."admin/theme_header.php";
?>
      <aside class="main-sidebar">
        <section class="sidebar">
			<?php include AS_CONT."admin/theme_leftsidebar.php"; ?>
		</section>
      </aside>
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            <?php echo 'Administrator | <small style="text-transform:uppercase">'.$pageAction.'</small>' ?>
          </h1>
          <ol class="breadcrumb">            
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Site Admin</a></li>
            <li class="active">New Site Admin</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          
          <div class="row">
            <!-- Left col -->
            <div class="col-md-12">
             
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Site Administrators</h3>
                  <div class="box-tools pull-right">
                    <a href="as_users.php?as_request=new_user" class="btn btn-box-tool"><i class="fa fa-plus"></i></a>
                    <a href="#" class="btn btn-box-tool" ><i class="fa fa-trash"></i></a>
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                  <?php $as_db_query = "SELECT * FROM as_user WHERE user_group > 0 ORDER BY userid DESC LIMIT 20";
					$database = new As_Dbconn();
					
					$results = $database->get_results( $as_db_query );
					?>
                    <table class="table no-margin">
                      <thead>
                        <tr><th> </th>
                          <th>Name</th>
                          <th>Username</th>
                          <th>Level</th>
                          <th>Email</th>
                          <th>Active</th>
                        </tr>
                      </thead>
					<tbody>
                    <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='as_users.php?as_request=view_user&amp;as_userid=<?php echo $row['userid'] ?>'">
		          <td><img class="iconic" src="<?php echo as_mainUrl_Ava().'/'.$row['user_avatar'] ?>" /></td>
                  <td><?php echo $row['user_fname'].' '.$row['user_sname'] ?></td>
				  <td><?php echo $row['user_name'].' - '.as_user_sex($row['user_name']) ?></td>				  
				  <td><?php echo as_user_lvl($row['user_level']) ?></td>
				  <td><?php echo $row['user_email'] ?></td>
		          <td><?php echo as_online_last($row['user_lastseen']) ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="box-footer clearfix">
                  <a href="as_users.php?as_request=new_user" class="btn btn-sm btn-info btn-flat pull-left">Add New Site Admin</a>
                  <!-- <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Site Users</a> -->
                </div>
              </div>
            
			</div>
	
			
          </div>
        </section>
      </div>


<?php include AS_CONT."admin/theme_footer.php"; ?>
<?php include AS_CONT."admin/theme_bottom.php"; ?>
