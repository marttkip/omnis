
    <section id="about-us">
        <div class="container">
			<div class="center wow fadeInDown">
				<h1>About <?php echo $company_details['company_name'];?></h1>
				<p class="lead"><?php echo $company_details['about'];?></p>
			</div>
			
			<!-- about us slider -->
			<div id="about-slider">
				<div id="carousel-slider" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
				  	<ol class="carousel-indicators visible-xs">
					    <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
					    <li data-target="#carousel-slider" data-slide-to="1"></li>
					    <li data-target="#carousel-slider" data-slide-to="2"></li>
				  	</ol>

					<div class="carousel-inner">
						<div class="item active">
							<img src="http://placehold.it/1160x400/55a4da/ffffff&text=Company image" class="img-responsive" alt=""> 
					   </div>
					   <div class="item">
							<img src="http://placehold.it/1160x400/e67e22/ffffff&text=Company image" class="img-responsive" alt=""> 
					   </div> 
					   <div class="item">
							<img src="http://placehold.it/1160x400/8e44ad/ffffff&text=Company image" class="img-responsive" alt=""> 
					   </div> 
					</div>
					
					<a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
						<i class="fa fa-angle-left"></i> 
					</a>
					
					<a class=" right carousel-control hidden-xs"href="#carousel-slider" data-slide="next">
						<i class="fa fa-angle-right"></i> 
					</a>
				</div> <!--/#carousel-slider-->
			</div><!--/#about-slider-->
			
			<!-- Our Skill -->
			<div class="skill-wrap clearfix">
			
				<div class="center wow fadeInDown">
					<h1>Our mission</h1>
					<p class="lead"><?php echo $company_details['mission'];?></p>
				</div>
	
            </div><!--/.our-skill-->
			
			<!-- Our Skill -->
			<div class="skill-wrap clearfix">
			
				<div class="center wow fadeInDown">
					<h1>Our vision</h1>
					<p class="lead"><?php echo $company_details['vision'];?></p>
				</div>
	
            </div><!--/.our-skill-->
			
			<!-- Our Skill -->
			<div class="skill-wrap clearfix col-md-7">
			
				<div class="wow fadeInDown">
					<h1 class="center">Our objectives</h1>
					<p class="lead"><?php echo $company_details['objectives'];?></p>
				</div>
	
            </div><!--/.our-skill-->
			
			<!-- Our Skill -->
			<div class="skill-wrap clearfix col-md-5">
			
				<div class="wow fadeInDown">
					<h1 class="center">Our core values</h1>
					<p class="lead"><?php echo $company_details['core_values'];?></p>
				</div>
	
            </div><!--/.our-skill-->
			
		</div><!--/.container-->
    </section><!--/about-us-->
	