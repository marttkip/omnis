<?php

$post_id = $row->post_id;
$blog_category_name = $row->blog_category_name;
$blog_category_id = $row->blog_category_id;
$post_title = $row->post_title;
$post_status = $row->post_status;
$post_views = $row->post_views;
$image = base_url().'assets/images/posts/'.$row->post_image;
$created_by = $row->created_by;
$modified_by = $row->modified_by;
$comments = $this->users_model->count_items('post_comment', 'post_id = '.$post_id);
$categories_query = $this->blog_model->get_all_post_categories($blog_category_id);
$description = $row->post_content;
$mini_desc = implode(' ', array_slice(explode(' ', $description), 0, 50));
$created = $row->created;
$day = date('j',strtotime($created));
$month = date('M Y',strtotime($created));
$created_on = date('jS M Y H:i a',strtotime($row->created));

$categories = '';
$count = 0;
//get all administrators
	$administrators = $this->users_model->get_all_administrators();
	if ($administrators->num_rows() > 0)
	{
		$admins = $administrators->result();
		
		if($admins != NULL)
		{
			foreach($admins as $adm)
			{
				$user_id = $adm->user_id;
				
				if($user_id == $created_by)
				{
					$created_by = $adm->first_name;
				}
			}
		}
	}
	
	else
	{
		$admins = NULL;
	}

	foreach($categories_query->result() as $res)
	{
		$count++;
		$category_name = $res->blog_category_name;
		$category_id = $res->blog_category_id;
		
		if($count == $categories_query->num_rows())
		{
			$categories .= '<a href="'.site_url().'blog/category/'.$category_id.'" title="View all posts in '.$category_name.'" rel="category tag">'.$category_name.'</a>';
		}
		
		else
		{
			$categories .= '<a href="'.site_url().'blog/category/'.$category_id.'" title="View all posts in '.$category_name.'" rel="category tag">'.$category_name.'</a>, ';
		}
	}
	$comments_query = $this->blog_model->get_post_comments($post_id);
	//comments
	$comments = 'No Comments';
	$total_comments = $comments_query->num_rows();
	if($total_comments == 1)
	{
		$title = 'comment';
	}
	else
	{
		$title = 'comments';
	}
	
	if($comments_query->num_rows() > 0)
	{
		$comments = '';
		foreach ($comments_query->result() as $row)
		{
			$post_comment_user = $row->post_comment_user;
			$post_comment_description = $row->post_comment_description;
			$date = date('jS M Y H:i a',strtotime($row->comment_created));
			
			$comments .= 
			'
				<div class="user_comment">
					<h5>'.$post_comment_user.' - '.$date.'</h5>
					<p>'.$post_comment_description.'</p>
				</div>
			';
		}
	}
	



?>
<div class="row">
	<div class="col-lg-12">
    	
        <!-- Post image -->
        <div class="pm-single-news-post" style="background-image:url(<?php echo $image;?>);">
            
            <div class="pm-single-news-post-overlay">
                
                <div class="pm-single-news-post-icon">
                    <img src="<?php echo base_url().'assets/themes/medicallink/img/logo-small.png';?>" alt="icon">
                </div>
                
                <h6 class="pm-single-news-post-title"><a href="<?php echo site_url();?>blog/view-single/<?php echo $post_id;?>"><?php echo $post_title;?></a></h6>
                
                <p class="pm-single-news-post-date"><?php echo $created_on;?> by <?php echo $created_by;?></p>
                
                <a href="<?php echo site_url();?>blog/view-single/<?php echo $post_id;?>#comments" class="pm-standalone-news-post-comment-count"><?php echo $total_comments;?> <?php echo $title;?></a>
                
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
            	<p class="tags">Tagged in: <a href="#"><?php echo $blog_category_name;?></a>, <a href="#">tips</a></p>
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