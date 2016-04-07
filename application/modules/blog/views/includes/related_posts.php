<?php
//related posts
$blog_category_id = $row->blog_category_id;
$related_posts_query = $this->blog_model->get_related_posts($blog_category_id, $post_id);

if($related_posts_query->num_rows() > 0)
{
	$related_posts = '';
	$count = 0;
	
	foreach ($related_posts_query->result() as $row)
	{
		$post_id = $row->post_id;
		$post_title = $row->post_title;
		$created = date('jS M Y',strtotime($row->created));
		$image = base_url().'assets/images/posts/thumbnail_'.$row->post_image;
		$comments = $this->users_model->count_items('post_comment', 'post_id = '.$post_id);
		$web_name = $this->site_model->create_web_name($post_title);
		$count++;
		
		if($count == 4)
		{
			$last = 'last';
		}
		
		else
		{
			$last = '';
		}
		$related_posts .= '
			<li>
				<div class="pm-related-blog-post-thumb" style="background-image:url('.$image.');"></div>
				<div class="pm-related-blog-post-details">
					<a href="'.site_url().'blog/view-single/'.$web_name.'">'.$post_title.'</a>
					<p class="pm-date">'.$created.'</p>
				</div>
			</li>
		';
	}
}

else
{
	$related_posts = 'No posts views yet';
}

?>

<div class="row">
	<div class="col-lg-12">
    
    	<h4 class="pm-primary">Related Posts</h4>
        
        
        <div class="pm-single-blog-post-related-posts">
        
        	<ul class="pm-related-blog-posts">
                <?php echo $related_posts;?>
            </ul>
        
        </div>
        
        
        
    </div>
</div>