<section id="portfolio" class="gallery">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center to_animate" data-animation="fadeInUp">
                    <h2 class="section_header">
                       gallery
                    </h2>                    
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div id="isotope_filters">
                        <a href="#" data-filter="*" class="selected type-16">
                            <span>Show All</span>
                            <span></span>
                        </a>
                        <?php
							if($gallery_services->num_rows() > 0)
							{
								foreach($gallery_services->result() as $service)
								{
									$service_name2 = $service->service_name;
									$service_name = str_replace(' ','',strtolower($service->service_name));
									$service_id = $service->service_id;
									?>
                                    <a href="#" data-filter=".<?php echo $service_name;?>" class="type-16">
                                        <span><?php echo $service_name2;?></span>
                                        <span></span>
                                    </a>
									<?php
								}
							}
						?>
                    </div>

                    <div id="isotope_container" class="isotope row">
                    
					<?php
                        if($gallery->num_rows() > 0)
                        {
                            foreach($gallery->result() as $res)
                            {
                                $gallery_name = $res->gallery_name;
                                $service_id3 = $res->service_id;
                                $gallery_image_name = $res->gallery_image_name;
								$service_name = '';
								
								if($gallery_services->num_rows() > 0)
								{
									foreach($gallery_services->result() as $service)
									{
										$service_id2 = $service->service_id;
										
										if($service_id3 == $service_id2)
										{
											$service_name = str_replace(' ','',strtolower($service->service_name));
											break;
										}
									}
								}
                                ?>
                                <div class="isotope-item gallery-item col-md-4 col-sm-6 <?php echo $service_name;?>">
                                    <div class="gallery-image portfolio-content">
                                        <img src="<?php echo $gallery_location.$gallery_image_name;?>" alt="<?php echo $gallery_name;?>">
                                            <div class="overlay text-center"> 
                                                <span class="white-box"></span>                            
                                                <a class="folio-detail prettyPhoto " title="" data-gal="prettyPhoto[gal]" href="<?php echo $gallery_location.$gallery_image_name;?>"><i class="fa fa-plus"></i></a>                                
                                            </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                    ?>

                    </div>
                    
                </div>
            </div>
        </div>
    </section>