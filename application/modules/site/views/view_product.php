<?php
foreach($product as $cat){
	
	$product_code = $cat->product_code;
	$product_id = $cat->product_id;
	$product_description = $cat->product_description;
	$product_name = $cat->product_name;
	$product_selling_price = number_format($cat->product_selling_price, 2, '.', ',');
	$product_balance = $cat->product_balance;
	$product_status = $cat->product_status;
	$product_image_name = $cat->product_image_name;
	$category_name = $cat->category_name;
	$product_date = date('jS M Y',strtotime($cat->product_date));
	$product_year = $cat->product_year;
	$brand_model_name = $cat->brand_model_name;
	$brand_name = $cat->brand_name;
}

?>
                        
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $product_name?> </h4>
      </div>
      <div class="modal-body">
        <div class="row">
        
        	<!-- Slideshow -->
        	<div class="col-md-7">
            	
        		<div id="view_product" class="carousel slide" data-ride="carousel">
				
        			<ol class="carousel-indicators">
                    <?php
         
					 if(is_array($product_images)){
						 $count = 0;
						 foreach($product_images as $prod){
							 
							 if($count == 0){
								 ?>
								 <li data-target="#view_product" data-slide-to="<?php echo $count;?>" class="active"></li>
								<?php
							 }
							 else{
								 ?>
								 <li data-target="#view_product" data-slide-to="<?php echo $count;?>" class=""></li>
								<?php
							 }
							 $count++;
						 }
					 }
					 
					?>
        			</ol>
        			
                    <div class="carousel-inner">
                    <?php
         
					 if(is_array($product_images)){
						 $count = 0;
						 foreach($product_images as $prod){
							 $image = $prod->product_image_name;
							 
							 if($count == 0){
								 ?>
								 <div class="item active">
									<img src="<?php echo base_url();?>assets/products/gallery/<?php echo $image;?>"/>
								 </div>
								<?php
							 }
							 else{
								 ?>
								 <div class="item">
									<img src="<?php echo base_url();?>assets/products/gallery/<?php echo $image;?>"/>
								 </div>
								<?php
							 }
							 $count++;
						 }
					 }
					 
					?>
        			</div>
        
        			<a class="left carousel-control" href="#view_product" data-slide="prev">
          				<span class="glyphicon glyphicon-chevron-left"></span>
        			</a>
        
        			<a class="right carousel-control" href="#view_product" data-slide="next">
          				<span class="glyphicon glyphicon-chevron-right"></span>
        			</a>
            	
            	</div>
            </div><!-- End Slideshow -->
            
            <!-- Cart -->
            <div class="col-md-5">
            	<div class="jumbotron view_product">
  					<h4>KES <?php echo $product_selling_price?></h4>
  					<h4>Code <?php echo $product_code?></h4>
                    	
  					<!--<p>
                    	<div class="input-group">
      						<input type="text" class="form-control" value="1">
      						<span class="input-group-btn">
        						<button class="btn btn_dark_pink" type="button"><span class="glyphicon glyphicon-shopping-cart"> Add</span></button>
      						</span>
    					</div> 
                    </p>-->
				</div>
                
            	<div class="jumbotron view_product">
                	<h4>Product description</h4>
  					<p>
                    	Brand: <?php echo $brand_name;?>
                    </p>
  					<p>
                    	Model: <?php echo $brand_model_name;?>
                    </p>
                    <?php if($product_year != "0000"){ ?>
  					<p>
                    	Year: <?php echo $product_year;?>
                    </p>
                    <?php } ?>
  					<p>
                    	Date Added: <?php echo $product_date;?>
                    </p>
  					<p>
                    	<?php echo $product_description?>
                    </p>
  					
				</div>
            </div><!-- End Cart -->
        </div>
        
      </div>
      <div class="modal-footer">
      	<div style="float: left">
        	<button class="btn btn_pink" type="button"><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
        </div>
        <button type="button" class="btn btn_dark_pink" data-dismiss="modal">Close</button>
      </div>