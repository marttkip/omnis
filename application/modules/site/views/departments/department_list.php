<?php

$result = '';

//if users exist display them

if ($query->num_rows() > 0)
{
    foreach ($query->result() as $row)
    {
        $department_id = $row->department_id;
        $department_name = $row->department_name;
        $department_status = $row->department_status;
        $image = base_url().'assets/department/'.$row->department_image_name;
		$web_name = $this->site_model->create_web_name($department_name);
        $created_by = $row->created_by;
        $modified_by = $row->modified_by;
        $description = $row->department_description;
        $mini_desc = implode(' ', array_slice(explode(' ', $description), 0, 50));
        $created = $row->created;
        $day = date('j',strtotime($created));
        $month = date('M Y',strtotime($created));
        $created_on = date('jS M Y H:i a',strtotime($row->created));
        
        $categories = '';
        $count = 0;
        
        $result .= '
            <!-- Blog post 1 -->
            <div class="isotope-item size2 col-lg-4 col-md-4 col-sm-12 col-xs-12">
            
                <div class="pm-gallery-post-item-container" style="background-image:url('.$image.');">
                
                    <div class="pm-gallery-post-item-info-container">
                    
                        <div class="pm-gallery-item-excerpt">
                           <!-- <p>'.$mini_desc.' <a href="'.site_url().'services/'.$web_name.'">[...]</a></p>-->
                            
                            <ul class="pm-gallery-item-btns">
                                                
                                <li><a class="fa fa-camera lightbox" data-rel="prettyPhoto[gallery]" href="'.$image.'"></a></li>
                                <li><a class="" href="'.site_url().'services/'.$web_name.'">Services</a></li>
                            </ul>
                            
                        </div>
                    
                    </div>
                    
                    <a class="pm-gallery-item-expander fa fa-plus" href="#"></a>
                     
                </div>
                
                <div class="pm-gallery-item-title">
                    <a href="'.site_url().'services/'.$web_name.'"><p>'.$department_name.'</p></a>
                </div>
                
            </div>
            <!-- Blog post 1 end -->
            ';
        }
    }
    else
    {
        $result .= "There are no departments :-(";
    }
   
  ?>          
<?php echo $this->load->view('site/includes/sub_header', '', TRUE);?>
<!-- PANEL 2 -->
<div class="container pm-containerPadding-top-20 pm-containerPadding-bottom-30">

	<div class="row isotope" id="gallery-posts">
        <?php echo $result;?>
    </div>

</div>
<!-- PANEL 2 end -->

<!-- PANEL 3 -->
<div class="container pm-containerPadding-bottom-80">

	<div class="row">
    
    	<div class="col-lg-12">
        	
            <ul class="pm-post-loaded-info">
            	<?php if(isset($links)){echo $links;}?>
            </ul>
            
        </div>
    
    </div>

</div>
<!-- PANEL 3 end -->