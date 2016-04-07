<?php

$company_details = $this->site_model->get_contacts();

$popular_query = $this->blog_model->get_popular_posts();

if($popular_query->num_rows() > 0)
{
	$popular_posts = '';
	$count = 0;
	foreach ($popular_query->result() as $row)
	{
		$count++;
		
		if($count < 3)
		{
			$post_id = $row->post_id;
			$post_title = $row->post_title;
			$image = base_url().'assets/images/posts/thumbnail_'.$row->post_image;
			$comments = $this->users_model->count_items('post_comment', 'post_id = '.$post_id);
			$description = $row->post_content;
			$mini_desc = implode(' ', array_slice(explode(' ', $description), 0, 10));
			$created = date('jS M Y',strtotime($row->created));
			
			$popular_posts .= '
				<li>
					<div style="background-image:url('.$image.');" class="pm-recent-blog-post-thumb"></div>
					<div class="pm-recent-blog-post-details">
						<a href="'.site_url().'blog/view-single/'.$post_id.'">'.$mini_desc.'</a>
						<p class="pm-date">'.$created.'</p>
						<div class="pm-recent-blog-post-divider"></div>
					</div>
				</li>
			';
		}
	}
}

else
{
	$popular_posts = 'There are no posts yet';
}
?>
 <footer id="footer">
      <figure><img src="logo.png" alt="Placeholder" width="174" height="55"></figure>
      <!--<h3>Follow us</h3>
      <ul class="social-a">
          <li class="fb"><a rel="external" href="./">Facebook</a></li>
          <li class="tw"><a rel="external" href="./">Twitter</a></li>
          <li class="in"><a rel="external" href="./">Instagram</a></li>
      </ul>
      <ul class="download-a">
          <li class="as"><a rel="external" href="./">Download on the App Store</a></li>
          <li class="gp"><a rel="external" href="./">Get it on Google Play</a></li>
      </ul>-->
      <p>&copy; <span class="date">2016</span> Omnis Limited. All rights reserved. <!--<a href="./">Privacy Policy</a> <a href="./">Terms of Service</a>--></p>
  </footer>