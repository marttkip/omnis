<?php
	$post_id = $row->post_id;
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
	$date2 = date('M j Y',strtotime($created));
	$tiny_url = $row->tiny_url;
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
		
		$categories .= '
			<a href="'.site_url().'blog/category/'.$category_id.'" title="View all posts in '.$category_name.'">'.$category_name.'</a> / ';
	}
	
	//comments
	$comments = 'No Comments';
	$title = 'Comments';
	$total_comments = $comments_query->num_rows();
	if($comments_query->num_rows() > 0)
	{
		if($total_comments == 1)
		{
			$title = 'Comment';
		}
		$comments = '';
		foreach ($comments_query->result() as $row)
		{
			$post_comment_user = $row->post_comment_user;
			$post_comment_description = $row->post_comment_description;
			$date = date('jS M Y H:i a',strtotime($row->comment_created));
			
			$comments .= 
			'
				<div class="media comment_section">
					<div class="pull-left post_comments">
						<a href="#"><img src="'.base_url().'assets/images/avatar3.png" class="img-circle" alt="" /></a>
					</div>
					<div class="media-body post_reply_comments">
						<h3>'.$post_comment_user.'</h3>
						<h4>'.$date.'</h4>
						<p>'.$post_comment_description.'</p>
					</div>
				</div>
			';
		}
	}
?>

<div class="blog-item">
    <img class="img-responsive img-blog" src="<?php echo $image;?>" width="100%" alt="<?php echo $post_title;?>" />
        <div class="row">  
            <div class="col-xs-12 col-sm-2 text-center">
                <div class="entry-meta">
                    <span id="publish_date"><?php echo $date2;?></span>
                    <span><i class="fa fa-comment"></i> <a href="#comments_title"><?php echo $total_comments;?> <?php echo $title;?></a></span>
                    <span>
                    	<a href="#" class="btn btn-gray fb-share" onclick="post_facebook_share('<?php echo $image;?>', '<?php echo $post_title;?> ', '<?php echo $tiny_url;?>')"><i class="fa fa-facebook-square fa-2x"></i> Share</a>
                    </span>
                    <span>
                    	<a target="_blank" href="https://twitter.com/intent/tweet?screen_name=masitsa_alvaro&text=<?php echo $post_title;?>%20<?php echo $tiny_url; ?>" class="btn btn-gray twitter-share"><i class="fa fa-twitter-square fa-2x"></i> Share</a>
                    </span>
                </div>
                
            </div>
            <div class="col-xs-12 col-sm-10 blog-content">
                <?php echo $description;?>

                <div class="post-tags">
                    <strong>Categories:</strong> <?php echo $categories;?>
                </div>

            </div>
        </div>
    </div><!--/.blog-item-->
    
    <h1 id="comments_title"><?php echo $total_comments;?> <?php echo $title;?></h1>
    
    <?php echo $comments;?>
    
    <div id="comment-page clearfix">
        <div class="status alert alert-success" style="display: none"></div>
        <div class="message_heading">
            <h4>Leave a comment</h4>
            <p>Make sure you enter the required(*) information where indicated.</p>
        </div> 

		<?php
        $validation_errors = validation_errors();
        $errors = $this->session->userdata('error_message');
        $success = $this->session->userdata('success_message');
        
        if(!empty($validation_errors))
        {
        echo '<div class="alert alert-danger">'.$validation_errors.'</div>';
        }
        
        if(!empty($errors))
        {
        echo '<div class="alert alert-danger">'.$errors.'</div>';
        $this->session->unset_userdata('error_message');
        }
        
        if(!empty($success))
        {
        echo '<div class="alert alert-success">'.$success.'</div>';
        $this->session->unset_userdata('success_message');
        }
        ?>
        <form method="post" class="contact-form" name="contact-form" action="<?php echo site_url().'blog/add_comment/'.$post_id;?>">
        
            <div class="row">
                <div class="col-sm-5">
                    <div class="form-group">
                        <label>Name *</label>
                        <input type="text" class="form-control" required="required" name="name">
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" class="form-control" required="required" name="email">
                    </div>
                    <!--<div class="form-group">
                        <label>URL</label>
                        <input type="url" class="form-control">
                    </div>-->                 
                </div>
                <div class="col-sm-7">                        
                    <div class="form-group">
                        <label>Message *</label>
                        <textarea name="post_comment_description" id="message" required="required" class="form-control" rows="8"></textarea>
                    </div>                        
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg" required="required">Submit comment</button>
                    </div>
                </div>
            </div>
        </form>     
    </div><!--/#contact-page-->
