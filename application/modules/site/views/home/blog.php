<?php

	$result = '';
	
	//if users exist display them

	if ($latest_posts->num_rows() > 0)
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
		
		foreach ($latest_posts->result() as $row)
		{
			$post_id = $row->post_id;
			$blog_category_name = $row->blog_category_name;
			$blog_category_web_name = $this->site_model->create_web_name($blog_category_name);
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
			$mini_desc = implode(' ', array_slice(explode(' ', $description), 0, 30));
			$created = $row->created;
			$day = date('j',strtotime($created));
			$month = date('M Y',strtotime($created));
			$created_on = date('jS M Y',strtotime($row->created));
			
			$categories = '';
			$count = 0;
			
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
			<div class="col-lg-4 col-md-4 col-sm-12">
                	
                    <!-- Blog post 1 -->
                    <article class="pm-column-spacing wow fadeInUp animated" data-wow-delay="0.3s" data-wow-offset="50" data-wow-duration="1s">
                    
                    	<p class="pm-standalone-news-post-category"><a href="'.site_url().'blog/category/'.$blog_category_web_name.'"><span>'.$blog_category_name.'</span></a></p>
                    
                    	<div class="pm-standalone-news-post" style="background-image:url('.$image.');">
                        
                        	<div class="pm-standalone-news-post-overlay">
                            	
                                <div class="pm-standalone-news-post-icon">
                           	    	<img src="'.base_url().'assets/themes/medicallink/img/logo-small.png" alt="icon">
                                </div>
                                
                                <h6 class="pm-standalone-news-post-title"><a href="'.site_url().'blog/view-single/'.$web_name.'">'.$post_title.'</a></h6>
                                
                               <p class="pm-standalone-news-post-date">'.$created_on.' by admin</p>
		                        <a href="'.site_url().'blog/view-single/'.$web_name.'#comments" class="pm-standalone-news-post-comment-count">'.$total_comments.' '.$title.'</a>
                                
                            </div>
                        
                        </div>
                    	           
                        <div class="pm-standalone-news-post-excerpt">
                        	 <p>'.$mini_desc.' <a href="'.site_url().'blog/view-single/'.$web_name.'">[...]</a> </p>
		                    
		                    <a href="'.site_url().'blog/view-single/'.$web_name.'" class="pm-rounded-btn pm-center-align">view post  <i class="fa fa-plus"></i></a>
                            
                        </div>
                        
                    </article>
                    <!-- Blog post 1 end -->
                    
                </div>
				';
			}
		}
		else
		{
			$result = "There are no posts :-(";
		}
	   
	  ?>
        <!-- PANEL 3 -->
        <div class="container pm-containerPadding-top-100 pm-containerPadding-bottom-100">
        
        	<div class="row">
            	<div class="col-lg-12 pm-columnPadding30 pm-center">
                	
                    <h5>Latest from the blog</h5>
                    <div class="pm-column-title-divider">
               	    	<img src="<?php echo base_url().'assets/themes/medicallink/'?>img/logo-small.png" width="29" height="29" alt="icon">
                    </div>
                    
                </div>
            </div>
        
        	<div class="row">
            
            	<?php echo $result;?>
                
                <!--
                <div class="col-lg-4 col-md-4 col-sm-12">
                	
                    <article class="pm-column-spacing wow fadeInUp animated" data-wow-delay="0.3s" data-wow-offset="50" data-wow-duration="1s">
                    
                    	<p class="pm-standalone-news-post-category"><a href="#"><span>general information</span></a></p>
                    
                    	<div class="pm-standalone-news-post" style="background-image:url(<?php echo base_url().'assets/themes/medicallink/'?>img/home/news-post1.jpg);">
                        
                        	<div class="pm-standalone-news-post-overlay">
                            	
                                <div class="pm-standalone-news-post-icon">
                           	    	<img src="<?php echo base_url().'assets/themes/medicallink/'?>img/logo-small.png" alt="icon">
                                </div>
                                
                                <h6 class="pm-standalone-news-post-title"><a href="#">asking the right questions when meeting your family doctor</a></h6>
                                
                                <p class="pm-standalone-news-post-date">January 21, 2015 by Dr. John Stanton</p>
                                
                            </div>
                        
                        </div>
                    	                        
                        <div class="pm-standalone-news-post-excerpt">
                        	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras id bibendum massa, vulputate consectetur dui. Ut ut eros congue, condimentum massa <a href="#">[...]</a> </p>
                            
                            <a href="#" class="pm-rounded-btn pm-center-align">view post  <i class="fa fa-plus"></i></a>
                            
                        </div>
                        
                    </article>
                    
                </div>
                -->
            
            </div>
        
        </div>
        <!-- PANEL 3 end -->
        