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
            <li><a href="#">Locations</a></li>
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
             	$itemid = $as_pageinfo['location'];
		$as_db_query = "SELECT * FROM as_location WHERE itemid = '$itemid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
                    list( $itemid, $location, $title, $colour, $content, $userid, $posted, $price, $views, $istate, $fullname, $mobile, $email, $location, $filename) = $database->get_row( $as_db_query );
		}
		
		 ?>
		
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Location - <?php echo $title ?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="table-responsive">
                 	<table class="table no-margin">
                 	    <tr><td>Location</td><td> - </td><td> <?php echo as_item_locationt($location) ?></td></tr>            	     
                 	    <tr><td>Description</td><td> - </td><td> <?php echo $content ?></td></tr>             	     
                 	    <tr><td>Colour</td><td> - </td><td> <?php echo $colour ?></td></tr>                    	     
                 	    <tr><td>Posted</td><td> - </td><td> <?php echo $posted ?></td></tr>                 	     
                 	    <tr><td>Price</td><td> - </td><td> <?php echo $price ?></td></tr>                 	     
                 	    <tr><td>Viewed</td><td> - </td><td> <?php echo $views ?> times</td></tr> 
                 	 </table>
                 	 <hr>
                 	 <h1>Seller Information</h1>
                 	 <table class="table no-margin">           	     
                 	    <tr><td>Seller</td><td> - </td><td> <?php echo $fullname ?></td></tr>                 	     
                 	    <tr><td>Mobile</td><td> - </td><td> <?php echo $mobile ?></td></tr>                 	     
                 	    <tr><td>Email Address</td><td> - </td><td> <?php echo $email ?></td></tr>                 	     
                 	    <tr><td>Location</td><td> - </td><td> <?php echo $location ?></td></tr>                 	     
                 	    <tr><td>Image</td><td> - </td><td> <?php echo $filename ?></td></tr>
                 	</table>
                  </div>
                </div>
                <div class="box-footer clearfix">
                  <a href="javascript::;" class="btn btn-sm btn-info btn-flat pull-left">Add New Location</a>
                  <a href="javascript::;" class="btn btn-sm btn-default btn-flat pull-right">View All Locations</a>
                </div>
              </div>
            </div>

<?php include AS_CONT."admin/theme_rightsidebar.php"; ?>	
			
          </div>
        </section>
      </div>


<?php include AS_CONT."admin/theme_footer.php"; ?>
<?php include AS_CONT."admin/theme_bottom.php"; ?>
