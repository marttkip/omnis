<?php echo $this->load->view('site/includes/sub_header', '', TRUE);?>
<!-- PANEL 1 -->
<div class="container pm-containerPadding-top-120 pm-containerPadding-bottom-90">
	<div class="row">
    
    	<!-- Column 1 -->
        <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-columnPadding-30 pm-column-spacing wow fadeInUp animated" data-wow-delay="0.3s" data-wow-offset="50" data-wow-duration="1s">
        
        	<a href="#" class="typcn typcn-map pm-icon-btn"></a>
                                
            <h6 class="pm-column-title">Our mission</h6>
            
            <div class="pm-title-divider"></div>
            
           <p> <?php echo $company_details['mission'];?></p>
            
        </div>
        <!-- Column 1 end -->
        
        <!-- Column 2 -->
        <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-columnPadding-30 pm-column-spacing wow fadeInUp animated
" data-wow-delay="0.6s" data-wow-offset="50" data-wow-duration="1s">
            
            <a href="#" class="typcn typcn-group pm-icon-btn"></a>
            
            <h6 class="pm-column-title">Our vision</h6>
            
            <div class="pm-title-divider"></div>
            
            <p><?php echo $company_details['vision'];?></p>
            
        </div>
        <!-- Column 2 end -->
        
        <!-- Column 3 -->
        <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-columnPadding-30 wow fadeInUp animated
" data-wow-delay="0.9s" data-wow-offset="50" data-wow-duration="1s">
        	
            <a href="#" class="typcn typcn-weather-sunny pm-icon-btn"></a>
            
            <h6 class="pm-column-title">Our promise</h6>
            
            <div class="pm-title-divider"></div>
            
            <p><?php echo $company_details['objectives'];?></p>
            
        </div>
        <!-- Column 3 end -->
        
    </div>
</div>
<!-- PANEL 1 end -->

<!-- PANEL 2 -->
<div class="pm-column-container testimonials pm-parallax-panel" style="background-color:#20bac7; background-image:url(img/news-post/author-bg.jpg); background-repeat:repeat-y;" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="-50">

	<div class="container pm-containerPadding-top-110 pm-containerPadding-bottom-80">
    	<div class="row">
        
        	<div class="col-lg-12 pm-column-spacing pm-center">
            
            	<h5 class="light">Meet the administrator</h5>
                
                <p class="light">The link keeps medical practices moving forward</p>
                
            </div>
        
        	<div class="col-lg-4 col-md-4 col-sm-12 pm-column-spacing col-lg-offset-4 col-md-offset-4">
        	
                <!-- Staff profile -->
                <div class="pm-staff-profile-parent-container">
                
                    <div class="pm-staff-profile-container" style="background-image:url(<?php echo base_url();?>assets/images/harriet.jpg);">
                
                        <div class="pm-staff-profile-overlay-container">
                        
                            <ul class="pm-staff-profile-icons">
                                <li><a href="#" class="fa fa-twitter"></a></li>
                                <li><a href="#" class="fa fa-facebook"></a></li>
                                <li><a href="#" class="fa fa-google-plus"></a></li>
                                <li><a href="#" class="fa fa-linkedin"></a></li>
                            </ul>
                            
                            <div class="pm-staff-profile-quote">
                                <p>Harriet Koyoson is</p>
                            </div>
                        
                        </div>
                                                
                        <a href="#" class="pm-staff-profile-expander fa fa-plus"></a>
                                            
                    </div>
                    
                    <div class="pm-staff-profile-info">
                        <p class="pm-staff-profile-name light">Mrs. Harriet Koyoson</p>
                        <p class="pm-staff-profile-title light">Clinic Administrator</p>
                    </div>
                    
                </div>                    
                <!-- Staff profile end -->
                
            </div>
        
        </div><!-- /.row -->
    </div><!-- /.container -->

</div>
<!-- PANEL 2 end -->

<!-- PANEL 3 -->
<div class="container pm-containerPadding-top-100 pm-containerPadding-bottom-80">

	<div class="row">
    	<div class="col-lg-12 pm-columnPadding30 pm-center">
        	
            <h5>We stand by our track record</h5>
            <div class="pm-column-title-divider">
            	<img height="29" width="29" src="<?php echo site_url();?>assets/themes/medicallink/img/logo-small.png" alt="icon">
            </div>
            
        </div>
    </div>

	<div class="row">
    
    	<div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">
        	
            <p class="typcn typcn-group pm-static-icon"></p>
            
            <!-- milestone -->
            <div class="milestone">
                <div class="milestone-content">                         
                    <span data-speed="2000" data-stop="21348" class="milestone-value"></span>
                    <div class="milestone-description">Patients Treated</div>
                </div>
            </div>
            <!-- milestone end -->
            
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">
        	
            <p class="fa fa-ambulance pm-static-icon"></p>
            
            <!-- milestone -->
            <div class="milestone">
                <div class="milestone-content">                         
                    <span data-speed="2000" data-stop="548" class="milestone-value"></span>
                    <div class="milestone-description">Emergency Patients Treated</div>
                </div>
            </div>
            <!-- milestone end -->
            
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">
        	
            <p class="typcn typcn-phone pm-static-icon"></p>
            
            <!-- milestone -->
            <div class="milestone">
                <div class="milestone-content">                         
                    <span data-speed="2000" data-stop="3490" class="milestone-value"></span>
                    <div class="milestone-description">Appointments Booked</div>
                </div>
            </div>
            <!-- milestone end -->
            
        </div>
        
        <div class="col-lg-3 col-md-6 col-sm-6 desktop pm-center pm-columnPadding-30 pm-column-spacing">
        	
            <p class="typcn typcn-mortar-board pm-static-icon"></p>
            
            <!-- milestone -->
            <div class="milestone">
                <div class="milestone-content">                         
                    <span data-speed="2000" data-stop="439" class="milestone-value"></span>
                    <div class="milestone-description">Practioneers Trained</div>
                </div>
            </div>
            <!-- milestone end -->
            
        </div>
    
    </div>

</div>
<!-- PANEL 3 end -->

<!-- PANEL 4 -->
<div class="pm-column-container testimonials pm-parallax-panel" style="background-color:#20bac7; background-image:url(img/home/testimonials-bg.jpg); background-repeat:repeat-y;" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="-50">

	<div class="container pm-containerPadding-top-110 pm-containerPadding-bottom-80">
    	<div class="row">
        
        	<div class="col-lg-6 col-md-6 col-sm-12 pm-column-spacing pm-columnPadding-30">
            
            	<h4 class="light">Our Philosophy and Values</h4>
                
                <div class="pm-divider light"></div>
                
                <br />
                
                <p class="light"><?php echo $company_details['about'];?></p>
                
                <p class="light"><?php //echo $company_details['core_values'];?></p>
                
            </div>
        
        	<div class="col-lg-6 col-md-6 col-sm-12 pm-column-spacing">
            
            	<h4 class="light">Our core strengths</h4>
                
                <div class="pm-divider light"></div>
                
                <br />
                
                <!-- Progress bar -->
                <div class="pm-progress-bar-description" id="pm-progress-bar-desc-1">
                    Research &amp; Development
                    <div class="pm-progress-bar-diamond"></div>
                    <span>90%</span>
                </div>
                <div class="pm-progress-bar">  
                    <span data-width="90" class="pm-progress-bar-outer" id="pm-progress-bar-1"> 
                        <span class="pm-progress-bar-inner"></span> 
                    </span>
                </div>
                <!-- Progress bar end -->
                
                <!-- Progress bar -->
                <div class="pm-progress-bar-description" id="pm-progress-bar-desc-2">
                    Personal Health Care
                    <div class="pm-progress-bar-diamond"></div>
                    <span>100%</span>
                </div>
                <div class="pm-progress-bar">  
                    <span data-width="100" class="pm-progress-bar-outer" id="pm-progress-bar-2"> 
                        <span class="pm-progress-bar-inner"></span> 
                    </span>
                </div>
                <!-- Progress bar end -->
                
                <!-- Progress bar -->
                <div class="pm-progress-bar-description" id="pm-progress-bar-desc-3">
                    Program Development
                    <div class="pm-progress-bar-diamond"></div>
                    <span>75%</span>
                </div>
                <div class="pm-progress-bar">  
                    <span data-width="75" class="pm-progress-bar-outer" id="pm-progress-bar-3"> 
                        <span class="pm-progress-bar-inner"></span> 
                    </span>
                </div>
                <!-- Progress bar end -->
                
                <!-- Progress bar -->
                <div class="pm-progress-bar-description" id="pm-progress-bar-desc-4">
                    Event Co-ordination
                    <div class="pm-progress-bar-diamond"></div>
                    <span>60%</span>
                </div>
                <div class="pm-progress-bar">  
                    <span data-width="60" class="pm-progress-bar-outer" id="pm-progress-bar-4"> 
                        <span class="pm-progress-bar-inner"></span> 
                    </span>
                </div>
                <!-- Progress bar end -->
                
            </div>
        
        	
        
        </div><!-- /.row -->
    </div><!-- /.container -->

</div>
<!-- PANEL 4 end -->

<!-- PANEL 5 -->
<div class="container pm-containerPadding-top-90 pm-containerPadding-bottom-30">

	<div class="row">
    	<div class="col-lg-12 pm-columnPadding30 pm-center">
        	
           <h5>See what our patients are saying</h5>
            <div class="pm-column-title-divider">
            	<img height="29" width="29" src="<?php echo site_url();?>assets/themes/medicallink/img/logo-small.png" alt="icon">
            </div>

            
        </div>
    </div>
    
    <div class="row pm-containerPadding-top-30 pm-containerPadding-bottom-60 pm-center">
    
    	<!-- Column 1 -->
        <div class="col-lg-4 col-md-4 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing">
        	
            <!-- Single testimonial -->
            <div class="pm-single-testimonial-shortcode">
            	
            	<div style="background-image:url(img/information/avatar1.jpg);" class="pm-single-testimonial-img-bg">
                    <div class="pm-single-testimonial-avatar-icon">
                        <img width="33" height="41" class="img-responsive" src="<?php echo site_url();?>assets/themes/medicallink/img/logo-small.png">
                    </div>
                </div>
                
                <p class="name">dave johnson</p>
                <p class="title">Electrical Engineer</p>
                
                <div class="pm-single-testimonial-divider"></div>
                
                <p class="quote">“Eum cu tantas legere complectitur, hinc utamur ea eam. Eum patrioque mnesarchum eu, diam erant convenire et vis. Et essent evertitur sea.”</p>
                
                 <div class="pm-single-testimonial-divider"></div>
                 
                 <p class="date">June 2014</p>
            
            </div>
            <!-- Single testimonial end -->
            
      	</div>
        <!-- Column 1 end -->
        
        <!-- Column 2 -->
        <div class="col-lg-4 col-md-4 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing">
        	
            <!-- Single testimonial -->
            <div class="pm-single-testimonial-shortcode">
            	
            	<div style="background-image:url(img/information/avatar2.jpg);" class="pm-single-testimonial-img-bg">
                    <div class="pm-single-testimonial-avatar-icon">
                        <img width="33" height="41" class="img-responsive" src="<?php echo site_url();?>assets/themes/medicallink/img/logo-small.png">
                    </div>
                </div>
                
                <p class="name">nicole cadby</p>
                <p class="title">Graphic designer</p>
                
                <div class="pm-single-testimonial-divider"></div>
                
                <p class="quote">“Eum cu tantas legere complectitur, hinc utamur ea eam. Eum patrioque mnesarchum eu, diam erant convenire et vis. Et essent evertitur sea.”</p>
                
                 <div class="pm-single-testimonial-divider"></div>
                 
                 <p class="date">September 2014</p>
            
            </div>
            <!-- Single testimonial end -->
            
      </div>
        <!-- Column 2 end -->
        
        <!-- Column 3 -->
        <div class="col-lg-4 col-md-4 col-sm-12 desktop pm-center pm-columnPadding-30 pm-column-spacing">
        	
            <!-- Single testimonial -->
            <div class="pm-single-testimonial-shortcode">
            	
            	<div style="background-image:url(img/information/avatar3.jpg);" class="pm-single-testimonial-img-bg">
                    <div class="pm-single-testimonial-avatar-icon">
                        <img width="33" height="41" class="img-responsive" src="<?php echo site_url();?>assets/themes/medicallink/img/logo-small.png">
                    </div>
                </div>
                
                <p class="name">mike stanton</p>
                <p class="title">College Professor</p>
                
                <div class="pm-single-testimonial-divider"></div>
                
                <p class="quote">“Eum cu tantas legere complectitur, hinc utamur ea eam. Eum patrioque mnesarchum eu, diam erant convenire et vis. Et essent evertitur sea.”</p>
                
                 <div class="pm-single-testimonial-divider"></div>
                 
                 <p class="date">December 2014</p>
            
          </div>
            <!-- Single testimonial end -->
            
      </div>
        <!-- Column 3 end -->
        
    </div>

</div>
<!-- PANEL 5 end -->
