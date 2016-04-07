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
				$web_name = $this->site_model->create_web_name($post_title);
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
				$result .= '
		            <!-- Blog post 1 -->
		            <article class="pm-column-spacing news-post">
		            
		                <p class="pm-standalone-news-post-category"><a href="#"><span>'.$blog_category_name.'</span></a></p>
		            
		                <div class="pm-standalone-news-post" style="background-image:url('.$image.');">
		                
		                    <div class="pm-standalone-news-post-overlay">
		                        
		                        <div class="pm-standalone-news-post-icon">
		                            <img src="'.base_url().'assets/themes/medicallink/img/logo-small.png" alt="icon">
		                        </div>
		                        
		                        <h6 class="pm-standalone-news-post-title"><a href="'.site_url().'blog/view-single/'.$web_name.'">'.$post_title.'</a></h6>
		                        
		                        <p class="pm-standalone-news-post-date">'.$created_on.' by '.$created_by.'</p>
		                        <a href="'.site_url().'blog/view-single/'.$web_name.'#comments" class="pm-standalone-news-post-comment-count">'.$total_comments.' '.$title.'</a>
		                        
		                    </div>
		                
		                </div>
		                                        
		                <div class="pm-standalone-news-post-excerpt">
		                    <p>'.$mini_desc.' <a href="'.site_url().'blog/view-single/'.$web_name.'">[...]</a> </p>
		                    
		                    <a href="'.site_url().'blog/view-single/'.$web_name.'" class="pm-rounded-btn no-border pm-center-align">view post  <i class="fa fa-plus"></i></a>
		                    
		                </div>
		                
		            </article>
		            <!-- Blog post 1 end -->
		            ';
		        }
			}
			else
			{
				$result .= "There are no posts :-(";
			}
           
          ?>          
<div class="row">
        <!-- Blog post area -->
        <div class="col-lg-8 col-md-8 col-sm-12">
                       
            <?php echo $result;?>
            <!-- Load more -->                    
            <ul class="pm-post-loaded-info news">
                <li>
                    <p>Viewing <strong><?php echo $last;?></strong> of <strong><?php echo $total;?></strong> posts</p>
                </li>
                <li>
                    <a href="#">Load more &nbsp; <i class="fa fa-cloud-download"></i></a>
                </li>
            </ul>
            <!-- Load more end -->
            
        </div>
        <!-- Blog post area end -->
        
        <!-- Sidebar area -->
        <?php echo $this->load->view('blog/includes/sidebar', '', TRUE);?>
        <!-- Sidebar area end -->
        
        
    </div><!-- /.row --> 