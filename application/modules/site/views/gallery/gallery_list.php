<?php echo $this->load->view('site/includes/sub_header', '', TRUE);?>
<!-- PANEL 1 -->
<div class="container pm-containerPadding-top-80 pm-containerPadding-bottom-30">

	<div class="row">
    	<div class="col-lg-12">
        
            <ul class="pm-isotope-filter-system">
            	<li class="pm-isotope-filter-system-expand">Currently viewing <i class="fa fa-angle-down"></i></li>
                <li><a href="#" class="current" data-filter="*" >All</a></li>
				<?php
                    if($gallery_departments->num_rows() > 0)
                    {
						$count = 0;
                        foreach($gallery_departments->result() as $service)
                        {
                            $department_name = $service->department_name;
                            $display_name = str_replace(' ','',strtolower($department_name));
                            $department_id = $service->department_id;
							$count++;
							
							?>
                            <li><a href="#" data-filter=".<?php echo $display_name;?>"><?php echo $department_name;?></a></li>
                            <?php
                        }
                    }
                ?>
            </ul>
            
        </div>
    </div>

</div>
<!-- PANEL 1 end -->
        
<!-- PANEL 2 -->
<div class="container pm-containerPadding-top-20 pm-containerPadding-bottom-30">

	<div class="row isotope" id="gallery-posts">
    
    	<?php
			if($gallery->num_rows() > 0)
			{
				foreach($gallery->result() as $res)
				{
					$gallery_name = $res->gallery_name;
					$department_id3 = $res->department_id;
					$gallery_image_name = $res->gallery_image_name;
					$thumb = ''.$gallery_image_name;
					$department_name = '';
					$display_name = '';
					
					if($gallery_departments->num_rows() > 0)
					{
						foreach($gallery_departments->result() as $service)
						{
							$department_id2 = $service->department_id;
							
							if($department_id2 == $department_id3)
							{
								$department_name = $service->department_name;
								$display_name = str_replace(' ','',strtolower($department_name));
								break;
							}
						}
					}
					?>
                    
                    <div class="isotope-item size1 col-lg-4 col-md-4 col-sm-12 col-xs-12 <?php echo $display_name;?>">
                
                        <div class="pm-gallery-post-item-container" style="background-image:url(<?php echo $gallery_location.$thumb;?>);">
                        
                            <div class="pm-gallery-post-item-info-container">
                            
                                <div class="pm-gallery-item-excerpt">
                                    
                                    <ul class="pm-gallery-item-btns">
                                                        
                                        <li><a class="fa fa-video-camera lightbox" data-rel="prettyPhoto[gallery]" href="<?php echo $gallery_location.$gallery_image_name;?>"></a></li>
                                    </ul>
                                    
                                </div>
                            
                            </div>
                            
                            <a class="pm-gallery-item-expander fa fa-plus" href="#"></a>
                             
                        </div>
                        
                        <div class="pm-gallery-item-title">
                            <p><?php echo $department_name;?></p>
                        </div>
                        
                    </div>
                
					<?php
				}
			}
		?>
    </div>

</div>
<!-- PANEL 2 end -->

<!-- PANEL 3 -->
<div class="container pm-containerPadding-bottom-80">

	<div class="row">
    
    	<div class="col-lg-12">
        	
            <ul class="pm-post-loaded-info">
            	<?php if(isset($links)){echo $links;}?>
            </ul>
            
        </div>
    
    </div>

</div>
<!-- PANEL 3 end -->