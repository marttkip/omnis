<?php

$department_id = $row->department_id;
$department_name = $row->department_name;
$department_status = $row->department_status;
$image = base_url().'assets/department/'.$row->department_image_name;

$created_by = $row->created_by;
$modified_by = $row->modified_by;
$description = $row->department_description;
$mini_desc = implode(' ', array_slice(explode(' ', $description), 0, 50));
$created = $row->created;
$day = date('j',strtotime($created));
$month = date('M Y',strtotime($created));
$created_on = date('jS M Y H:i a',strtotime($row->created));
	



?>
<div class="row">
	<div class="col-lg-12">
    	
        <!-- Post image -->
        <div class="pm-single-news-post" style="background-image:url(<?php echo $image;?>);">
            
            <div class="pm-single-news-post-overlay">
                
                <div class="pm-single-news-post-icon">
                    <img src="img/news/post-icon.jpg" width="33" height="41" alt="icon">
                </div>
                
                <h6 class="pm-single-news-post-title"><a href="<?php echo site_url();?>departments/view-single/<?php echo $department_id;?>"><?php echo $department_name;?></a></h6>
                
                <p class="pm-single-news-post-date"><?php echo $created_on;?> by <?php echo $created_by;?></p>
                
                
            </div>
        
        </div>
        <!-- Post image end -->
        
        <!-- Post info -->
        <div class="pm-single-post-article">
        
               <?php echo $description;?>        
        </div>
        
        <!-- Post info end -->
        
        <!-- Post info and tags -->
        <div class="pm-single-post-social-features">
        
        	<div class="pm-single-post-tags">
            	<p class="tags">Tagged in:  <a href="#">tips</a></p>
            </div>
            
            <div class="pm-single-post-like-feature">
            	<a href="#" class="pm-single-post-like-btn fa fa-thumbs-up"></a>
                <span>22 Likes</span>
            </div>
            
            <div class="pm-single-post-share-icons">
            	<ul class="pm-single-post-social-icons">
                
                	<li><p>Share This:</p></li>
                
                    <li title="Twitter" class="pm_tip_static_bottom"><a class="fa fa-twitter" href="#"></a></li>
                    <li title="Facebook" class="pm_tip_static_bottom"><a class="fa fa-facebook" href="#"></a></li>
                    <li title="Google Plus" class="pm_tip_static_bottom"><a class="fa fa-google-plus" href="#"></a></li>
                    <li title="Linkedin" class="pm_tip_static_bottom"><a class="fa fa-linkedin" href="#"></a></li>
                    <li title="Reddit" class="pm_tip_static_bottom"><a class="fa fa-reddit" href="#"></a></li>
                </ul>
            
            </div>
      
            
        </div>
        <!-- Post info and tags end -->
        
        
    </div>
</div>