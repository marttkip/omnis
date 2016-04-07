<?php
if($slides->num_rows() > 0)
{
	$slides_no = $slides->num_rows();
	?>
        
               
        <!-- SLIDER AREA -->
        
        <div class="pm-pulse-container" id="pm-pulse-container">
                
            <div id="pm-pulse-loader">
                <img src="<?php echo base_url().'assets/themes/medicallink/'?>js/pulse/img/ajax-loader.gif" alt="Slider Loading" />
            </div>
            
            <div id="pm-slider" class="pm-slider">
                
                <div id="pm-slider-progress-bar"></div>
            
                <ul class="pm-slides-container" id="pm_slides_container">
                	<?php
						$count = -1;
						foreach($slides->result() as $cat)
						{			
							$slideshow_id = $cat->slideshow_id;
							$slideshow_status = $cat->slideshow_status;
							$slideshow_name = $cat->slideshow_name;
							$slideshow_description = $cat->slideshow_description;
							$slideshow_image_name = $cat->slideshow_image_name;
							$slideshow_thumb_name = 'thumbnail_'.$cat->slideshow_image_name;
							$active = '';
							$count++;
							
							if($count == 1)
							{
								$active = 'rs_mainslider_items_active';
							}
						?>
                            <li data-thumb="<?php echo $slideshow_location.$slideshow_thumb_name;?>" class="pmslide_<?php echo $count;?>">
                            	<img src="<?php echo $slideshow_location.$slideshow_image_name;?>" alt="<?php echo $slideshow_name;?>">
                                <div class="pm-holder">
                                    <div class="pm-caption">
                                      <h1><?php echo $slideshow_name;?></h1>
                                      <span class="pm-caption-decription">
                                      	<?php echo $slideshow_description;?>
                                      </span>
                                      <a href="#" class="pm-slide-btn">our services <i class="fa fa-plus"></i></a>
                                    </div>
                                </div>
                            </li>
						<?php
						}
					?>
                                    
                </ul>
               
            </div>
        
        </div>
        
 		<!-- SLIDER AREA end -->
        
<?php
}
?>
		