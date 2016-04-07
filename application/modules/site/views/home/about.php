	
       	<!-- PANEL 1 -->
        <div class="container pm-containerPadding-top-120 pm-containerPadding-bottom-90">
        	<div class="row">
            
            	<!-- Column 1 -->
                <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-columnPadding-30 pm-column-spacing wow fadeInUp animated" data-wow-delay="0.3s" data-wow-offset="50" data-wow-duration="1s">
                
                	<a href="#" class="fa fa-plus-square pm-icon-btn"></a>
                                        
                    <h6 class="pm-column-title">Our mission</h6>
                    
                    <div class="pm-title-divider"></div>
                    
                    <p><?php echo implode(' ', array_slice(explode(' ', strip_tags($company_details['mission'])), 0, 10));?></p>
                    
                    <a href="#" class="pm-standard-link">view our services <i class="fa fa-plus"></i></a>
                    
                </div>
                <!-- Column 1 end -->
                
                <!-- Column 2 -->
                <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-columnPadding-30 pm-column-spacing wow fadeInUp animated
" data-wow-delay="0.6s" data-wow-offset="50" data-wow-duration="1s">
                    
                    <a href="#" class="fa fa-medkit pm-icon-btn"></a>
                    
                    <h6 class="pm-column-title">Our vision</h6>
                    
                    <div class="pm-title-divider"></div>
                    
                    <p><?php echo implode(' ', array_slice(explode(' ', strip_tags($company_details['vision'])), 0, 10));?></p>
                    
                    <a href="#" class="pm-standard-link">Learn More <i class="fa fa-plus"></i></a>
                    
                </div>
                <!-- Column 2 end -->
                
                <!-- Column 3 -->
                <div class="col-lg-4 col-md-4 col-sm-12 pm-center pm-columnPadding-30 wow fadeInUp animated
" data-wow-delay="0.9s" data-wow-offset="50" data-wow-duration="1s">
                	
                    <a href="#" class="fa fa-ambulance pm-icon-btn"></a>
                    
                    <h6 class="pm-column-title">Our promise</h6>
                    
                    <div class="pm-title-divider"></div>
                    
                    <p><?php echo implode(' ', array_slice(explode(' ', strip_tags($company_details['objectives'])), 0, 9));?></p>
                    
                    <a href="#" class="pm-standard-link">Learn More <i class="fa fa-plus"></i></a>
                    
                </div>
                <!-- Column 3 end -->
                
            </div>
        </div>
        <!-- PANEL 1 end -->
        
        <!-- PANEL 2 -->
        <div class="pm-column-container pm-parallax-panel" style="background-color:#20bac7; background-image:url(<?php echo base_url().'assets/themes/medicallink/'?>img/home/video-panel-bg.jpg);" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="100">
        
        	<!-- Column message -->
        	<div class="pm-column-container-message">
            	<p><strong>Did you know?</strong>  celiac diesease can go undetected for years</p>
            </div>
            <!-- Column message end -->
        
        	<div class="container pm-containerPadding-top-50 pm-containerPadding-bottom-80">
            
            	<div class="row">
                	<div class="col-lg-6 col-md-6 col-sm-12 pm-column-spacing">
                    
                        <h4>Take a tour of our medical facility</h4>
                        
                        <div class="pm-video-container" style="background-image:url(<?php echo base_url().'assets/images/reception_thumb.jpg'?>);">
                        
                        	<div class="pm-video-overlay">
                                <a href="<?php echo base_url().'assets/images/reception.jpg'?>" data-rel="prettyPhoto" class="pm-video-activator-btn fa fa-play expand lightbox"></a>
                            </div>
                        	
                        </div>
                        
                        <a href="<?php echo site_url().'gallery';?>" class="pm-rounded-btn pm-center-align">View our gallery <i class="fa fa-plus"></i></a>
                        
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-12">
                    	
                        <h4>Our departments</h4>
                        <p class="light">We offer the best. </p>
                        
                        <!-- Bootstrap accordion system -->
                        <div id="accordion" class="panel-group">
                        	
                            <?php
							//if users exist display them
							if ($departments->num_rows() > 0)
							{
								$count = 0;
								foreach($departments->result() as $cat)
								{
									$count++;
									$department_id = $cat->department_id;
									$department_status = $cat->department_status;
									$department_name = $cat->department_name;
									$department_web_name = $this->site_model->create_web_name($department_name);
									
									echo
									'
									<!-- accordion item '.$count.' -->
									<div class="panel panel-default">
									
										<div class="panel-heading">
											<h4 class="panel-title"><i class="fa fa-plus"></i><a class="pm-accordion-link collapsed" href="#collapse'.$count.'" data-parent="#accordion" data-toggle="collapse">'.$department_name.'</a></h4>
										</div>
										
										<div class="panel-collapse collapse" id="collapse'.$count.'" style="height: 0px;">
											<div class="panel-body">
												<a href="'.site_url().'services" class="pm-standard-link pm-no-margin">Services <i class="fa fa-angle-right"></i></a>
											</div>
										</div>
										
									</div>
									<!-- accordion item '.$count.' end -->
									';
								}
							}
							?>
                            
                        </div>
                        <!-- Bootstrap accordion system end -->
                        
                    </div>
                    
                </div>
            
            </div>
        
        </div>
        <!-- PANEL 2 end -->