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
            <li><a href="#">Members</a></li>
            <li class="active"><?php echo $pageTitle ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
             <?php 
             	$errorid = $as_pageinfo['error'];
		$as_db_query = "SELECT * FROM as_error_report WHERE errorid = '$errorid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
                    list( $errori, $title, $content, $created) = $database->get_row( $as_db_query );
		}
		
		 ?>
		
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Error - <?php echo $title ?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <?php echo $content ?>
                </div>
                <div class="box-footer clearfix">
                  <!-- <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Add New Member</a>
                  <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Members</a> -->
                </div>
              </div>
            </div>

<?php include AS_CONT."admin/theme_rightsidebar.php"; ?>	
			
          </div>
        </section>
      </div>


<?php include AS_CONT."admin/theme_footer.php"; ?>
<?php include AS_CONT."admin/theme_bottom.php"; ?>
