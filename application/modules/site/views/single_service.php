<?php

$service_id = $row->service_id;
$service_name = $row->service_name;
$description = $row->service_description;
?>
<?php echo $this->load->view('site/includes/sub_header', '', TRUE);?>
<div class="container pm-containerPadding-top-110 pm-containerPadding-bottom-100">
    <div class="row">
        <div class="col-lg-12">
            
            <!-- Post image -->
            <div class="pm-single-service-post">
                
                <div class="pm-single-news-post-overlay">
                    
                    <div class="pm-single-news-post-icon">
                        <img src="<?php echo base_url();?>assets/themes/medicallink/img/logo-small.png" alt="icon" width="33" height="41">
                    </div>
                    
                    <h6 class="pm-single-news-post-title"><a href="#"><?php echo $service_name;?></a></h6>
                </div>
            
            </div>
            <!-- Post image end -->
            
            <!-- Post info -->
            <div class="pm-single-post-article">
            	<p><?php echo $description;?></p>
            </div>
            
            <!-- Post info end -->
            
            
            
        </div>
    </div>
</div>