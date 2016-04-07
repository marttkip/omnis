<?php

// check if there is a previous post 

$prev_checker = $this->blog_model->check_previous_post($post_id);
$post_checker = $this->blog_model->check_post_post($post_id);

if($prev_checker == TRUE)
{
    $prev_post_id = $post_id - 1;
    $prev_link = '<li class="pm_tip_static_top" title="Prev. Post"><a href="'.site_url().'blog/view-single/'.$prev_post_id.'" class="fa fa-angle-left"></a></li>';
}
else
{
    $prev_link = '';
}

if($post_checker == TRUE)
{
    $post_post_id = $post_id + 1;
    $post_link = '<li class="pm_tip_static_top" title="Next Post"><a href="'.site_url().'blog/view-single/'.$post_post_id.'" class="fa fa-angle-right"></a></li>';
}

else
{
    $post_link ='';
}
if(!isset($title))
{
	$title_name = '<p class="pm-page-title">News</p>
                    <p class="pm-page-message">Keeping you up to date on the latest news in the medical world </p>';

    $ultra_mini_text = ' <ul class="pm-breadcrumbs">
                            <li><a href="'.site_url().'home">Home </a></li>
                            <li><i class="fa fa-angle-right"></i></li>
                            <li>news</li>
                        </ul>
                        
                        <!--<ul class="pm-post-navigation">
                            <li class="pm_tip_static_top" title="Prev. Post"><a href="#" class="fa fa-angle-left"></a></li>
                            <li class="pm_tip_static_top" title="Next Post"><a href="#" class="fa fa-angle-right"></a></li>
                        </ul>-->';
}
else
{
	$title_name = '<p class="pm-page-title">'.$title.'</p>';
     $ultra_mini_text = '   <ul class="pm-breadcrumbs">
                                <li><a href="'.site_url().'home">Home </a></li>
                                <li><i class="fa fa-angle-right"></i></li>
                                <li ><a href="'.site_url().'blog">news</a></li>
                                <li><i class="fa fa-angle-right"></i></li>
                                <li>'.$ultra_mini_title.'...</li>
                            </ul>
                            
                            <ul class="pm-post-navigation">
                                '.$prev_link.'
                                '.$post_link.'
                            </ul>';
}

?>

<div class="pm-sub-header-container">
        
    <div class="pm-sub-header-info">
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $title_name;?>                    
                </div>
            </div>
        </div>
        
    </div>
    
    <div class="pm-sub-header-breadcrumbs">
        
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <?php echo $ultra_mini_text;?>
                    
                </div>
            </div>
        </div>
        
    </div>

</div>