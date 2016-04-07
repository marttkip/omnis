		<div class="container">
			<div class="row">
				<div class="span12 viewProjects">
					<a href="#">VIEW ALL PROJECT &#8594;</a>
				</div>
			</div>
			<ul class="row portfolioItems">
            	<?php
				if($services->num_rows() > 0)
				{
					foreach($services->result() as $serv)
					{
						$service_name = $serv->service_name;
						$description = $serv->service_description;
						$service_image = $serv->service_image_name;
						$description = implode(' ', array_slice(explode(' ', strip_tags($description)), 0, 6));
						
						?>
                        <li class="span3">
                            <figure>
                                <a href="#" class="thumbnail">
                                    <img src="<?php echo $service_location.$service_image;?>" alt="<?php echo $service_name;?>">
                                </a>
                                <figcaption>
                                    <h3><a href="#"><?php echo $service_name;?></a></h3>
                                    <p><?php echo $description;?></p>
                                </figcaption>
                            </figure>
                        </li>
                        <?php
					}
				}
				?>
			</ul><!-- /.portfolioItems -->
		</div><!-- /.container [] -->