<?php 

	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
						
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
            <li><a href="#">Items</a></li>
            <li class="active"><?php echo $pageTitle ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
             
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Items</h3>
                  <div class="box-tools pull-right">
                    <a href="as_items.php?as_request=new_item" class="btn btn-box-tool"><i class="fa fa-plus"></i></a>
                    <a href="#" class="btn btn-box-tool" ><i class="fa fa-trash"></i></a>
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                  <?php $as_db_query = "SELECT * FROM as_error_report ORDER BY errorid DESC LIMIT 20";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $as_db_query );
		?>
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Title</th>
                          <th>Content</th>
                          <th>Created</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='as_site.php?as_request=view_error&amp;as_errorid=<?php echo $row['errorid'] ?>'">
		          <td><?php echo $row['title'] ?></td>
		          <td><?php echo $row['content'] ?>/=</td>
                          <td style="text-align:right;"><?php echo date("j/m/y", strtotime($row['created'])); ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="box-footer clearfix">
                  <a href="as_site.php?as_request=view_errors" class="btn btn-sm btn-default btn-flat pull-right">View All Errors</a> 
                </div>
              </div>
            </div>

<?php include AS_CONT."admin/theme_rightsidebar.php"; ?>	
			
          </div>
        </section>
      </div>


<?php include AS_CONT."admin/theme_footer.php"; ?>
<?php include AS_CONT."admin/theme_bottom.php"; ?>
