<?php
		$result = '';
		
		//if users exist display them
		if ($query->num_rows() > 0)
		{	
			//get all administrators
			$administrators = $this->users_model->get_all_administrators();
			if ($administrators->num_rows() > 0)
			{
				$admins = $administrators->result();
			}
			
			else
			{
				$admins = NULL;
			}
			
			foreach ($query->result() as $row)
			{
				$post_id = $row->post_id;
				$blog_category_name = $row->blog_category_name;
				$blog_category_id = $row->blog_category_id;
				$post_title = $row->post_title;
				$post_status = $row->post_status;
				$post_views = $row->post_views;
				$image = base_url().'assets/images/posts/'.$row->post_image;
				$created_by = $row->created_by;
				$modified_by = $row->modified_by;
				$comments = $this->users_model->count_items('post_comment', 'post_comment_status = 1 AND post_id = '.$post_id);
				$categories_query = $this->blog_model->get_all_post_categories($blog_category_id);
				$description = $row->post_content;
				$mini_desc = implode(' ', array_slice(explode(' ', $description), 0, 50));
				$created = $row->created;
				$day = date('j',strtotime($created));
				$month = date('M',strtotime($created));
				$year = date('Y',strtotime($created));
				
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
					<span>
						<a href="'.site_url().'blog/category/'.$category_id.'" title="View all posts in '.$category_name.'">'.$category_name.'</a>
					</span>';
				}
				
				$result .= 
				'
				<div class="blog-item">
					<div class="row">
						<div class="col-xs-12 col-sm-2 text-center">
							<div class="entry-meta">
								<span id="publish_date">'.$day.'  '.$month.'  '.$year.'</span>
								<span><i class="fa fa-comment"></i> <a href="blog-item.html#comments">'.$comments.' Comments</a></span>
								'.$categories.'
							</div>
						</div>
							
						<div class="col-xs-12 col-sm-10 blog-content">
							<a href="'.site_url().'blog/post/'.$post_id.'"><img class="img-responsive img-blog" src="'.$image.'" alt="'.$post_title.'" width="100%" /></a>
							<h2><a href="'.site_url().'blog/post/'.$post_id.'">'.$post_title.'</a></h2>
							<h3>'.$mini_desc.'</h3>
							<a class="btn btn-primary readmore" href="'.site_url().'blog/post/'.$post_id.'">Read More <i class="fa fa-angle-right"></i></a>
						</div>
					</div>    
				</div><!--/.blog-item-->
				';
			}
		}
		
		else
		{
			$result .= "There are no posts :-(";
		}
		
		echo $result;
?>


<?php
    if(isset($links){echo '<div class="center-align">'.$links.'</div>';}
?>