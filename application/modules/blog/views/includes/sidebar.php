<?php
$recent_query = $this->blog_model->get_recent_posts();
$recent_posts ='';
if($recent_query->num_rows() > 0)
{
	$row = $recent_query->row();
	
	$post_id = $row->post_id;
	$post_title = $row->post_title;
	$web_name = $this->site_model->create_web_name($post_title);
	$image = base_url().'assets/images/posts/thumbnail_'.$row->post_image;
	$comments = $this->users_model->count_items('post_comment', 'post_id = '.$post_id);
	$description = $row->post_content;
	$mini_desc = implode(' ', array_slice(explode(' ', $description), 0, 50));
	
	$recent_posts = '
		<h6>Medical Alert - Jan 5, 2014</h6>
            
		<div class="pm-sidebar-padding">
		
			<p><strong>'.$post_title.'</strong></p>
		
			<p>'.$mini_desc.'</p>
			<a href="'.site_url().'blog/view-single/'.$web_name.'" class="pm-sidebar-link">Read More <i class="fa fa-plus"></i></a>
		
		</div>
	';

}

else
{
	$recent_posts = 'No posts yet';
}

$categories_query = $this->blog_model->get_all_active_category_parents();
if($categories_query->num_rows() > 0)
{
	$categories = '';
	foreach($categories_query->result() as $res)
	{
		$category_id = $res->blog_category_id;
		$category_name = $res->blog_category_name;
		$web_name = $this->site_model->create_web_name($category_name);
		
		$children_query = $this->blog_model->get_all_active_category_children($category_id);
		
		//if there are children
		$categories .= '<li><a href="'.site_url().'blog/category/'.$web_name.'" title="View all posts filed under '.$category_name.'">'.$category_name.'</a></li>';
	}
}

else
{
	$categories = 'No Categories';
}
$popular_query = $this->blog_model->get_popular_posts();

if($popular_query->num_rows() > 0)
{
	$popular_posts = '';
	
	foreach ($popular_query->result() as $row)
	{
		$post_id = $row->post_id;
		$post_title = $row->post_title;
		$web_name = $this->site_model->create_web_name($post_title);
		$image = base_url().'assets/images/posts/thumbnail_'.$row->post_image;
		$comments = $this->users_model->count_items('post_comment', 'post_id = '.$post_id);
		$description = $row->post_content;
		$mini_desc = implode(' ', array_slice(explode(' ', $description), 0, 10));
		$created = date('jS M Y',strtotime($row->created));
		
		$popular_posts .= '
			<li>
				<div class="pm-recent-blog-post-thumb" style="background-image:url('.$image.');"></div>
				<div class="pm-recent-blog-post-details">
					<a href="'.site_url().'blog/view-single/'.$web_name.'">'.$mini_desc.'</a>
					<p class="pm-date">'.$created.'</p>
				</div>
			</li>
		';
	}
}

else
{
	$popular_posts = 'No posts views yet';
}
?>

<aside>
    <div class="col-lg-4 col-md-4 col-sm-12 pm-sidebar">
        <!-- Text widget -->
        <div class="pm-widget">
        
            <?php echo $recent_posts;?>
            
        </div>
        <!-- Text widget end -->
        
        
        
        <!-- Popular Posts widget -->
        <div class="pm-widget">
        
            <h6>Popular Posts</h6>
            
            <div class="pm-sidebar-padding">
            
                <ul class="pm-recent-blog-posts">
                    <?php echo $popular_posts;?>
                </ul>
            
            </div>
            
        </div>
        <!-- Popular Posts widget end -->
        
        
        <!-- Trends widget -->
        <div class="pm-widget">
        
            <h6>Categories</h6>
            
            <div class="pm-sidebar-padding">
            
                <ul class="pm-trends-list">
                    <?php echo $categories;?>
                </ul>
            
            </div>
            
        </div>
        <!-- Trends widget end -->
        
        <!-- Knowledge center widget -->
        <!--<div class="pm-widget">
        
            <h6>Knowledge Centre</h6>
            
            <div class="pm-sidebar-padding">
            
                <form action="#" method="get">
                    <select name="pm-knowledge-centre-list" class="pm-knowledge-centre-list">
                        <option selected>-- Select a Subject --</option>
                        <option>Allergies</option>
                        <option>Cold Symptoms</option>
                        <option>Ebola outbreak</option>
                        <option>Flu Shot</option>
                        <option>Celiac Disease</option>
                    </select>
                </form>
                
                <p>Want to see our most detailed pages about specific areas of medicine, including conditions, nutrition and forms of treatment?</p>
                
                <p>Visit our <a href="#" class="pm-secondary">Knowledge centre</a></p>
            
            </div>
            
        </div>-->
        <!-- Knowledge center widget end -->
        
        <!-- Newsletter widget -->
        <!--<div class="pm-widget">
        
            <h6>Newsletter Sign-up</h6>
            
            <div class="pm-sidebar-padding">
            
                <form novalidate target="_blank" class="validate" name="mc-embedded-subscribe-form" id="mc-embedded-subscribe-form" method="post" action="http://pulsarmedia.us4.list-manage2.com/subscribe?u=2aa9334fc1bc18c8d05500b41&amp;id=dbcb577c4d">  
                    <input type="text" placeholder="first name" id="MERGE1" class="pm_quick_contact_field Light reset-pulse-sizing" name="MERGE1">
                    <input type="email" placeholder="email address" id="MERGE0" class="pm_quick_contact_field Light reset-pulse-sizing" name="MERGE0">
                    <input type="submit" class="pm-rounded-btn small no-border" value="subscribe &plus;" id="mc-embedded-subscribe" name="subscribe">
                </form>
            
            </div>
            
        </div>-->
        <!-- Newsletter widget end -->
        
        
        <!-- Tags widget -->
        <!--<div class="pm-widget">
        
            <h6>Popular Tags</h6>
            
            <div class="pm-sidebar-padding">
            
                <ul class="pm-sidebar-tags">
                    <li><a href="#" class="pm-square-btn tag">education</a></li>
                    <li><a href="#" class="pm-square-btn tag">health</a></li>
                    <li><a href="#" class="pm-square-btn tag">fitness</a></li>
                    <li><a href="#" class="pm-square-btn tag">medicine</a></li>
                    <li><a href="#" class="pm-square-btn tag">treatments</a></li>
                    <li><a href="#" class="pm-square-btn tag">viruses</a></li>
                    <li><a href="#" class="pm-square-btn tag">celiac</a></li>
                    <li><a href="#" class="pm-square-btn tag">cancer</a></li>
                </ul>
            
            </div>
            
        </div>-->
        <!-- Tags widget end -->
        
        <!-- Search widget -->
        <div class="pm-widget">
        
            <h6>Search Articles</h6>
            
            <div class="pm-sidebar-padding">
            
                <div class="pm-sidebar-search-container">
                    <i class="fa fa-search"></i>
                    <form action="<?php echo site_url().'site/blog/search';?>" method="post">
                        <input type="text" name="search_item" class="pm-sidebar-search-field" placeholder="Type keywords...">
                    </form>
                </div>
            
            </div>
            
        </div>
        <!-- Search widget end -->
        
        
    </div>
</aside>