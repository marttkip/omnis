<?php 
//get categories
$categories_query = $this->blog_model->get_all_active_category_parents();

if($categories_query->num_rows() > 0)
{
	$categories = '<li><a href="'.site_url().'blog"><strong>Blog</strong></a><ul class="sub-menu">';
	foreach($categories_query->result() as $res)
	{
		$categories .= '<li><a href="'.site_url().'blog/category/'.$res->blog_category_id.'">'.$res->blog_category_name.'</a></li>';
	}
	$categories .= '</ul></li>';
}

else
{
	$categories = '';
}
?>
<!-- ***************** - HEADER - ***************** -->
  <div id="headerwrap">
    <div id="header">
      <div class="notification">
        <div class="notificationwrap">
          <div class="socialcategory">
            <a target="_blank" class="facebooklink" href="http://www.facebook.com/InchesToStyle" title="Facebook"></a>
			<a target="_blank" class="twitterlink" href="https://twitter.com/InchesToStyle" title="Twitter"></a>
			<!--<a target="_blank" class="vimeo" href="http://digg.com/" title="Digg"></a>
			<a target="_blank" class="dribble" href="http://dribbble.com/gljivec" title="Dribble"></a>
			<a target="_blank" class="emaillink" href="mailto:" title="Send us Email"></a>-->
          </div>
        </div>
      </div>
<!-- ***************** - LOGO - ***************** -->
      <div id="logo">
        <a href="<?php echo site_url();?>">
        <div class="logotag">
          <!--<h1>Inches To Style</h1>-->
          <img src="<?php echo base_url().'assets/logo.jpg';?>" alt="Inches2Style"/>
        </div>
		</a>
      </div>
<!-- ***************** - NAVIGATION - ***************** -->
      <div class="pagenav">
        <div class="menu-header">
          <ul id="menu-main-menu" class="menu">
            <li><a href="<?php echo site_url();?>"><strong>Home</strong></a></li>

            <li><a href="<?php echo site_url().'shop';?>"><strong>Shop</strong></a></li>

            <?php echo $categories;?>

            <li><a href="<?php echo site_url().'about';?>"><strong>About</strong></a></li>

            <li><a href="<?php echo site_url().'contact';?>"><strong>Contact</strong></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
	 <script type="text/javascript">
	jQuery(document).ready(function($){
				$('.slider').anythingSlider({
					hashTags : false,
					expand          : true,
					autoPlay        : true,
					resizeContents  : false,
					pauseOnHover    : true,
					buildArrows     : false,
					buildNavigation : false,
					delay           : 4000,
					resumeDelay     : 0,
					animationTime   : 1200,
					delayBeforeAnimate:0,
					easing : 'easeInOutQuint',      
				})

				
				$('.slider-wrapper').hover(function() {
					$(".slideforward").stop(true, true).fadeIn();
					$(".slidebackward").stop(true, true).fadeIn();
				}, function() {
					$(".slideforward").fadeOut();
					$(".slidebackward").fadeOut();
				});
				$(".pauseButton").toggle(function(){
					$(this).attr("class", "playButton");
					$('#slider').data('AnythingSlider').startStop(false); // stops the slideshow
				},function(){
					$(this).attr("class", "pauseButton");
					$('.slider').data('AnythingSlider').startStop(true);  // start the slideshow
				});
				$(".slideforward").click(function(){
					$('.slider').data('AnythingSlider').goForward();
				});
				$(".slidebackward").click(function(){
					$('.slider').data('AnythingSlider').goBack();
				});

			});
        
     </script>