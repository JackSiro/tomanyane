<?php 
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
            <li><a href="#">Applications</a></li>
            <li class="active"><?php echo $pageTitle ?></li>
          </ol>
        </section>

        <section class="content">
         
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
			
             <div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Slide 1</h3>
                </div>
				
				<form role="form" method="post" name="SaveSlideshow" action="<?php echo $as_pageinfo['formAction'] ?>" enctype="multipart/form-data">
				  <div class="box-body">
					<div class="row">
					  <div class="col-lg-6">
						<div class="form-group">
							<label for="title_slide1">Title of Slide 1 *</label>
							<input type="text" class="form-control" name="title_slide1" value="<?php echo $as_pageinfo['title_slide1'] ?>">
						</div>
						<div class="form-group">
							<label for="link_slide1">Slide 1 Link *</label>
							<input type="text" class="form-control" name="link_slide1" value="<?php echo $as_pageinfo['link_slide1'] ?>">
						</div>
						<div class="form-group">
							<input type="file" class="form-control" accept="image/*" name="image_slide1">
						</div>
					  </div>
						
					  <div class="col-lg-6">	
						<div class="form-group">
						<input type="hidden" name="slide_slide1" value="<?php echo $as_pageinfo['image_slide1'] ?>">		
						<div style="border:2px solid #006400; background: url('<?php echo as_mainUrl().'/as_media/slide/'.$as_pageinfo['image_slide1'] ?>');background-size:cover;background-repeat: no-repeat; background-position: center center; height:140px;" >
							</div>
						</div>
						
						<div class="form-group">
							<input name="Slideshow1" class="btn btn-primary" type="submit" class="form-control" value="Save Changes" />
						</div>
					  </div>
					</div>
				 </div>
				</form>                       			
			</div>
		  
		  
             <div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Slide 2</h3>
                </div>
				
				<form role="form" method="post" name="SaveSlideshow" action="<?php echo $as_pageinfo['formAction'] ?>" enctype="multipart/form-data">
				  <div class="box-body">
					<div class="row">
					  <div class="col-lg-6">
						<div class="form-group">
							<label for="title_slide2">Title of Slide 2 *</label>
							<input type="text" class="form-control" name="title_slide2" value="<?php echo $as_pageinfo['title_slide2'] ?>">
						</div>
						<div class="form-group">
							<label for="link_slide2">Slide 2 Link *</label>
							<input type="text" class="form-control" name="link_slide2" value="<?php echo $as_pageinfo['link_slide2'] ?>">
						</div>
						<div class="form-group">
							<input type="file" class="form-control" accept="image/*" name="image_slide2">
						</div>
					  </div>
						
					  <div class="col-lg-6">	
						<div class="form-group">
						<input type="hidden" name="slide_slide2" value="<?php echo $as_pageinfo['image_slide2'] ?>">		
						<div style="border:2px solid #006400; background: url('<?php echo as_mainUrl().'/as_media/slide/'.$as_pageinfo['image_slide2'] ?>');background-size:cover;background-repeat: no-repeat; background-position: center center; height:140px;" >
							</div>
						</div>
						
						<div class="form-group">
							<input name="Slideshow2" class="btn btn-primary" type="submit" class="form-control" value="Save Changes" />
						</div>
					  </div>
					</div>
				 </div>
				</form>                       			
			</div>
		  
		  
             <div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Slide 3</h3>
                </div>
				
				<form role="form" method="post" name="SaveSlideshow" action="<?php echo $as_pageinfo['formAction'] ?>" enctype="multipart/form-data">
				  <div class="box-body">
					<div class="row">
					  <div class="col-lg-6">
						<div class="form-group">
							<label for="title_slide3">Title of Slide 3 *</label>
							<input type="text" class="form-control" name="title_slide3" value="<?php echo $as_pageinfo['title_slide3'] ?>">
						</div>
						<div class="form-group">
							<label for="link_slide3">Slide 3 Link *</label>
							<input type="text" class="form-control" name="link_slide3" value="<?php echo $as_pageinfo['link_slide3'] ?>">
						</div>
						<div class="form-group">
							<input type="file" class="form-control" accept="image/*" name="image_slide3">
						</div>
					  </div>
						
					  <div class="col-lg-6">	
						<div class="form-group">
						<input type="hidden" name="slide_slide3" value="<?php echo $as_pageinfo['image_slide3'] ?>">		
						<div style="border:2px solid #006400; background: url('<?php echo as_mainUrl().'/as_media/slide/'.$as_pageinfo['image_slide3'] ?>');background-size:cover;background-repeat: no-repeat; background-position: center center; height:140px;" >
							</div>
						</div>
						
						<div class="form-group">
							<input name="Slideshow3" class="btn btn-primary" type="submit" class="form-control" value="Save Changes" />
						</div>
					  </div>
					</div>
				 </div>
				</form>                       			
			</div>
			
			
             <div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Slide 4</h3>
                </div>
				
				<form role="form" method="post" name="SaveSlideshow" action="<?php echo $as_pageinfo['formAction'] ?>" enctype="multipart/form-data">
				  <div class="box-body">
					<div class="row">
					  <div class="col-lg-6">
						<div class="form-group">
							<label for="title_slide4">Title of Slide 4 *</label>
							<input type="text" class="form-control" name="title_slide4" value="<?php echo $as_pageinfo['title_slide4'] ?>">
						</div>
						<div class="form-group">
							<label for="link_slide4">Slide 4 Link *</label>
							<input type="text" class="form-control" name="link_slide4" value="<?php echo $as_pageinfo['link_slide4'] ?>">
						</div>
						<div class="form-group">
							<input type="file" class="form-control" accept="image/*" name="image_slide4">
						</div>
					  </div>
						
					  <div class="col-lg-6">	
						<div class="form-group">
						<input type="hidden" name="slide_slide4" value="<?php echo $as_pageinfo['image_slide4'] ?>">		
						<div style="border:2px solid #006400; background: url('<?php echo as_mainUrl().'/as_media/slide/'.$as_pageinfo['image_slide4'] ?>');background-size:cover;background-repeat: no-repeat; background-position: center center; height:140px;" >
							</div>
						</div>
						
						<div class="form-group">
							<input name="Slideshow4" class="btn btn-primary" type="submit" class="form-control" value="Save Changes" />
						</div>
					  </div>
					</div>
				 </div>
				</form>                       			
			</div>
		  
		</div>

<?php include AS_CONT."admin/theme_rightsidebar.php"; ?>	
			
          </div>
        </section>
      </div>


<?php include AS_CONT."admin/theme_footer.php"; ?>
<?php include AS_CONT."admin/theme_bottom.php"; ?>
