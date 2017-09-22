<?php 
	$as_pageinfo = array();
	$as_pageinfo['pageTitle'] = "Latest Complain Categories";
	$as_pageinfo['pageAction'] = "Latest Categories";
	
	require_once AS_FUNC."as_posting.php";
	require_once AS_FUNC."as_paging.php";
						
	$database = new As_Dbconn();
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
            <li><a href="#">Categories</a></li>
            <li class="active"><?php echo $pageTitle ?></li>
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
                  <h3 class="box-title">Latest Categories</h3>
                  <div class="box-tools pull-right">                    
                    <a href="?as_request=complain_category_new" class="btn btn-box-tool"><i class="fa fa-plus"></i></a>
                    <a href="#" class="btn btn-box-tool" ><i class="fa fa-trash"></i></a>
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                  <?php $as_db_query = "SELECT * FROM as_complain_category ORDER BY categoryid DESC LIMIT 20";
					//$database = new As_Dbconn();
					
					$results = $database->get_results( $as_db_query );
					?>
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Category</th>
                          <th>Description</th>
                          <th>Complains</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='as_request=complain_category_view&amp;as_complain_categoryid=<?php echo $row['categoryid'] ?>'">       
					<td><img class="iconic" src="<?php echo as_siteUrl.'as_media/posts/'.$row['category_icon'] ?>" /></td>
					<td><?php echo $row['category_title'] ?></td>
					<td><?php echo $row['category_content'] ?></td>
					<td><?php echo as_total_category_complains($row['categoryid']) ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="box-footer clearfix">
                  <a href="?as_request=complain_category_new" class="btn btn-sm btn-info btn-flat pull-left">Add New Category</a>
                  <!-- <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Categories</a> -->
                </div>
              </div>
            </div>
	
			
          </div>
        </section>
      </div>


<?php include AS_CONT."admin/theme_footer.php"; ?>
<?php include AS_CONT."admin/theme_bottom.php"; ?>
