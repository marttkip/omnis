      
		<?php echo $this->load->view('site/includes/sub_header', '', TRUE);?>
        
        
        <!-- BODY CONTENT starts here -->
                
        <!-- PANEL 1 -->
        <div class="container pm-containerPadding-top-100 pm-containerPadding-bottom-90">
        
        	<div class="row">
            	
                <?php
				if($services->num_rows() > 0)
				{
					foreach($services->result() as $serv)
					{
						$service_name = $serv->service_name;
						$service_web_name = $this->site_model->create_web_name($service_name);
						$department_name = $serv->department_name;
						$department_web_name = $this->site_model->create_web_name($department_name);
						$description = $serv->service_description;
						$service_image = $serv->service_image_name;
						
						//$description = implode(' ', array_slice(explode(' ', strip_tags($description)), 0, 20));
						$description = substr(strip_tags($description), 0, 200);
						
						?>
                        <!-- Service post 1 -->
                        <div class="col-lg-4 col-md-6 col-sm-12 pm-column-spacing">
                            
                            <div class="pm-services-post">
                                
                                <div class="pm-services-post-overlay">
                                    
                                    <div class="pm-services-post-icon">
                                        <img src="<?php echo base_url();?>assets/themes/medicallink/img/logo-small.png" alt="icon">
                                    </div>
                                    
                                    <h6 class="pm-services-post-title"><a href="<?php echo site_url().'services/'.$department_web_name.'/'.$service_web_name;?>"><?php echo $service_name;?></a></h6>
                                    
                                    
                                </div>
                            
                            </div>
                            
                            <div class="pm-services-post-excerpt">
                                <p>Categorised under <a href="<?php echo site_url().'services/'.$department_web_name;?>"><?php echo $department_name;?></a> </p>
                                <p class="services_description"><?php echo $description;?> [...]</p>
                                
                                <a href="<?php echo site_url().'services/'.$department_web_name.'/'.$service_web_name;?>" class="pm-rounded-btn no-border pm-center-align">Read More  <i class="fa fa-plus"></i></a>
                                
                            </div>
                            
                        </div>
                        <!-- Service post 1 end -->
                        <?php
					}
				}
				?>
                
            </div>
        
        
        </div>
        <!-- PANEL 1 end -->
        
        <!-- BODY CONTENT end -->