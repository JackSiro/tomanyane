<?php 
	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = "Dashboard";
	$as_pageinfo['pageAction'] = "Dashboard";
	
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
            <li class="active"><?php echo $pageAction ?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
		  <div class="row">
		  
			<!-- REPORT TABLE -->
            <div class="col-md-5">              
             <div class="box box-primary">
				<div class="box-body">	
					<div class="col-md-4">
						<center>
						<h3><?php echo as_total_complains_all() ?></h3>
						<hr><h4>Complains</h4>
						</center>
					</div> 
					<div class="col-md-8">
					  <table class="table table-condensed">
						<tr>
						  <td>Inbox</td>
						  <td>
							<div class="progress progress-xs progress-striped active" style="width:50px">
							  <div class="progress-bar progress-bar-danger" style="width: <?php echo as_total_complains_bystate(1)/as_total_complains_all()*100 ?>%"></div>
							</div>
						  </td>
						  <td><span class="badge bg-red"><?php echo as_total_complains_bystate(1)/as_total_complains_all()*100 ?>%</span></td>					  
						  <td><?php echo as_total_complains_bystate(1) ?></td>
						</tr>
						<tr>
						  <td>Progress</td>
						  <td>
							<div class="progress progress-xs progress-striped active" style="width:50px">
							  <div class="progress-bar progress-bar-yellow" style="width:  <?php echo as_total_complains_bystate(2)/as_total_complains_all()*100 ?>%"></div>
							</div>
						  </td>
						  <td><span class="badge bg-yellow"> <?php echo as_total_complains_bystate(2)/as_total_complains_all()*100 ?>%</span></td>			  
						  <td><?php echo as_total_complains_bystate(2) ?></td>
						</tr>
						<tr>
						  <td>Outbox</td>
						  <td>
							<div class="progress progress-xs progress-striped active" style="width:50px">
							  <div class="progress-bar progress-bar-primary" style="width:  <?php echo as_total_complains_bystate(3)/as_total_complains_all()*100 ?>%"></div>
							</div>
						  </td>
						  <td><span class="badge bg-light-blue"> <?php echo as_total_complains_bystate(3)/as_total_complains_all()*100 ?>%</span></td>			  
						  <td><?php echo as_total_complains_bystate(3) ?></td>
						</tr>
						<tr>
						  <td>Closed</td>
						  <td>
							<div class="progress progress-xs progress-striped active" style="width:50px">
							  <div class="progress-bar progress-bar-success" style="width: <?php echo as_total_complains_bystate(4)/as_total_complains_all()*100 ?>%"></div>
							</div>
						  </td>
						  <td><span class="badge bg-green"><?php echo as_total_complains_bystate(4)/as_total_complains_all()*100 ?>%</span></td>			  
						  <td><?php echo as_total_complains_bystate(4) ?></td>
						</tr>
						<tr>
						  <td>Trash</td>
						  <td>
							<div class="progress progress-xs progress-striped active" style="width:50px">
							  <div class="progress-bar progress-bar-success" style="width: <?php echo as_total_complains_bystate(5)/as_total_complains_all()*100 ?>%"></div>
							</div>
						  </td>
						  <td><span class="badge bg-green"><?php echo as_total_complains_bystate(5)/as_total_complains_all()*100 ?>%</span></td>			  
						  <td><?php echo as_total_complains_bystate(5) ?></td>
						</tr>
						<tr>
						  <td>Spam</td>
						  <td>
							<div class="progress progress-xs progress-striped active" style="width:50px">
							  <div class="progress-bar progress-bar-success" style="width: <?php echo as_total_complains_bystate(6)/as_total_complains_all()*100 ?>%"></div>
							</div>
						  </td>
						  <td><span class="badge bg-green"><?php echo as_total_complains_bystate(6)/as_total_complains_all()*100 ?>%</span></td>			  
						  <td><?php echo as_total_complains_bystate(6) ?></td>
						</tr>
						<tr>
						  <td>Drafted</td>
						  <td>
							<div class="progress progress-xs progress-striped active" style="width:50px">
							  <div class="progress-bar progress-bar-success" style="width: <?php echo as_total_complains_bystate(0)/as_total_complains_all()*100 ?>%"></div>
							</div>
						  </td>
						  <td><span class="badge bg-green"><?php echo as_total_complains_bystate(0)/as_total_complains_all()*100 ?>%</span></td>			  
						  <td><?php echo as_total_complains_bystate(0) ?></td>
						</tr>
					  </table>
					</div>
				</div>
				</div>
			</div>
			<!-- END REPORT TABLE -->
			
			 <!-- AREA CHART -->
            <div class="col-md-7">
              
				<div class="box box-primary">
					<div class="box-body">
					  <div class="chart">
						<canvas id="areaChart" style="height:250px"></canvas>
					  </div>
					</div>
				  </div>
				
            </div>
			<!-- END AREA CHART -->
			
		  </div>
			
          <div class="row">
            <div class="col-md-12">
				<div class="box box-info">
					<div class="box-header with-border">
					  <h3 class="box-title">Complains Overview</h3>
					  <div class="box-tools pull-right">
						<a href="<?php echo as_adminUrl ?>?as_request=complain_all" class="btn btn-sm btn-danger btn-flat pull-left">View All Complains</a>
					  </div>
					</div>
					<div class="box-body nav-tabs-custom">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="#comp_inbox" data-toggle="tab">INBOX</a></li>
						  <li><a href="#comp_progress" data-toggle="tab">PROGRESS</a></li>
						  <li><a href="#comp_outbox" data-toggle="tab">OUTBOX</a></li>
						</ul>
						<div class="tab-content">
							<div class="active tab-pane" id="comp_inbox">
								<h3>Complains in Inbox
									<div class="box-tools pull-right">
										<a href="<?php echo as_adminUrl ?>?as_request=complain_inbox" class="btn btn-sm btn-danger btn-flat pull-left">View All</a>
									</div>
								</h3>
								<div class="table-responsive">
								  <?php $as_db_query = "SELECT * FROM as_complain WHERE complain_state=1 ORDER BY complainid DESC LIMIT 10";
									$results = $database->get_results( $as_db_query );
									
									if ($database->as_num_rows( $as_db_query ) <= 0) { ?>
									<h4>There are no complains in inbox currently...</h4>					 
									<?php } else { ?>
									<table class="table no-margin">                      
									<?php foreach( $results as $row ) { ?>
										<tr onclick="location='<?php echo as_adminUrl ?>?as_request=complain_view&amp;as_complainid=<?php echo $row['complainid'] ?>'">
											<td><?php echo as_timeago_now($row['complain_posted']) ?></td>
											<td><b><?php echo $row['complain_title'] ?></b></td>
											<td><?php echo as_complain_category($row['complain_category']) ?></td>
										</tr>
									
									<?php } ?>			
									</table> 
									<?php } ?>
								</div>
							</div>
							<div class="tab-pane" id="comp_progress">
								<h3>Complains Being Worked On
									<div class="box-tools pull-right">
										<a href="<?php echo as_adminUrl ?>?as_request=complain_progress" class="btn btn-sm btn-warning btn-flat pull-left">View All</a>
									</div>
								</h3>
								<div class="table-responsive">
								  <?php $as_db_query = "SELECT * FROM as_complain WHERE complain_state=2 ORDER BY complainid DESC LIMIT 10";
									$results = $database->get_results( $as_db_query );
									
									if ($database->as_num_rows( $as_db_query ) <= 0) { ?>
									<h4>There are no complains in progress currently...</h4>					 
									<?php } else { ?>
									<table class="table no-margin">                      
									<?php foreach( $results as $row ) { ?>
										<tr onclick="location='<?php echo as_adminUrl ?>?as_request=complain_view&amp;as_complainid=<?php echo $row['complainid'] ?>'">
											<td><?php echo as_timeago_now($row['complain_posted']) ?></td>
											<td><b><?php echo $row['complain_title'] ?></b></td>
											<td><?php echo as_complain_category($row['complain_category']) ?></td>
										</tr>
									
									<?php } ?>			
									</table> 
									<?php } ?>
								</div>
							</div>
							<div class="tab-pane" id="comp_outbox">
								<h3>Complains in Outbox
									<div class="box-tools pull-right">
										<a href="<?php echo as_adminUrl ?>?as_request=complain_outbox" class="btn btn-sm btn-success btn-flat pull-left">View All</a>
									</div>
								</h3>
								<div class="table-responsive">
								  <?php $as_db_query = "SELECT * FROM as_complain WHERE complain_state=3 ORDER BY complainid DESC LIMIT 10";
									$results = $database->get_results( $as_db_query );
									
									if ($database->as_num_rows( $as_db_query ) <= 0) { ?>
									<h4>There are no complains in outbox currently...</h4>					 
									<?php } else { ?>
									<table class="table no-margin">                      
									<?php foreach( $results as $row ) { ?>
										<tr onclick="location='<?php echo as_adminUrl ?>?as_request=complain_view&amp;as_complainid=<?php echo $row['complainid'] ?>'">
											<td><?php echo as_timeago_now($row['complain_posted']) ?></td>
											<td><b><?php echo $row['complain_title'] ?></b></td>
											<td><?php echo as_complain_category($row['complain_category']) ?></td>
										</tr>
									
									<?php } ?>			
									</table> 
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		  </div>
          <div class="row">
		  				
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
       
<?php include AS_CONT."admin/theme_footer.php"; ?>
<!-- CHARTS JAVASCRIPT -->
    <script>
      $(function () {
        
        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas);

        var areaChartData = {
          labels: ["January", "February", "March", "April", "May", "June", "July"],
          datasets: [
            {
              label: "Electronics",
              fillColor: "rgba(210, 214, 222, 1)",
              strokeColor: "rgba(210, 214, 222, 1)",
              pointColor: "rgba(210, 214, 222, 1)",
              pointStrokeColor: "#c1c7d1",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(220,220,220,1)",
              data: [65, 59, 80, 81, 56, 55, 40]
            },
            {
              label: "Digital Goods",
              fillColor: "rgba(60,141,188,0.9)",
              strokeColor: "rgba(60,141,188,0.8)",
              pointColor: "#3b8bba",
              pointStrokeColor: "rgba(60,141,188,1)",
              pointHighlightFill: "#fff",
              pointHighlightStroke: "rgba(60,141,188,1)",
              data: [28, 48, 40, 19, 86, 27, 90]
            }
          ]
        };

        var areaChartOptions = {
          //Boolean - If we should show the scale at all
          showScale: true,
          //Boolean - Whether grid lines are shown across the chart
          scaleShowGridLines: false,
          //String - Colour of the grid lines
          scaleGridLineColor: "rgba(0,0,0,.05)",
          //Number - Width of the grid lines
          scaleGridLineWidth: 1,
          //Boolean - Whether to show horizontal lines (except X axis)
          scaleShowHorizontalLines: true,
          //Boolean - Whether to show vertical lines (except Y axis)
          scaleShowVerticalLines: true,
          //Boolean - Whether the line is curved between points
          bezierCurve: true,
          //Number - Tension of the bezier curve between points
          bezierCurveTension: 0.3,
          //Boolean - Whether to show a dot for each point
          pointDot: false,
          //Number - Radius of each point dot in pixels
          pointDotRadius: 4,
          //Number - Pixel width of point dot stroke
          pointDotStrokeWidth: 1,
          //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
          pointHitDetectionRadius: 20,
          //Boolean - Whether to show a stroke for datasets
          datasetStroke: true,
          //Number - Pixel width of dataset stroke
          datasetStrokeWidth: 2,
          //Boolean - Whether to fill the dataset with a color
          datasetFill: true,
          //String - A legend template
          legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
          //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
          maintainAspectRatio: true,
          //Boolean - whether to make the chart responsive to window resizing
          responsive: true
        };

        //Create the line chart
        areaChart.Line(areaChartData, areaChartOptions);
        
      });
    </script>
 <!-- CHARTS JAVASCRIPT -->
<?php include AS_CONT."admin/theme_bottom.php"; ?>
