<?php 
	$this->load->view("includes/services/head");
	$this->load->view("includes/services/menu");
?>
        <div class="content">
            <div class="row">
					<?php
					if(is_array($products) > 0){
						foreach($products as $cat){
							
							$product_code = $cat->product_code;
							$product_id = $cat->product_id;
							$product_description = $cat->product_description;
							$product_name = $cat->product_name;
							$product_selling_price = number_format($cat->product_selling_price, 2, '.', ',');
							$product_balance = $cat->product_balance;
							$product_status = $cat->product_status;
							$product_image_name = $cat->product_image_name;
							$product_date = $cat->product_date;
							$category_name = $cat->category_name;
							
							?>
							<div class="col-md-4 no_padding">
								<div class="thumbnail">
									<div class="product_image">
									   <a href="<?php echo site_url()."site/all_products/0"?>">
											<img src="<?php echo base_url()."assets/products/images/".$product_image_name?>" class="img-responsive" alt="<?php echo $product_name?>">
									   </a>
								   </div>
									<div class="caption">
										<a href="<?php echo site_url()."site/all_products/0"?>"><?php echo $product_name?></a>
										<h5>KES <?php echo $product_selling_price?></h5>
										<p>
											<a href="<?php echo $product_id;?>" class="site_product" title="View">
                                            <button class="btn btn_pink site_product" type="button" data-toggle="modal" data-target="#myModal"  ><span class="glyphicon glyphicon-list"></span> View</button>
                                            </a>
											<button class="btn btn_dark_pink" type="button"><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
										</p>
									</div>
								</div>
							</div>
						<?php
						}
					}
					
					else{
						?>
						<div class="col-md-12 no_padding">No products listed :-(</div>
						<?php
					}
					?>
					</div>
            <ul class="menu" id="menu">
            	<?php
					if(count($categories > 0)){
						
						foreach($categories as $cat){
							$category_name = $cat->category_name;
							$category_id = $cat->category_id;
							?>
                            <li>
                                <a href="<?php echo site_url()."site/all_products/".$category_id;?>"><?php echo $category_name?></a>
                            <?php
							
							 /*
								-----------------------------------------------------------------------------------------
								Retrieve category children level 1
								-----------------------------------------------------------------------------------------
							*/
							$table = "category";
							$where = "category_status = 1 AND category_parent = ".$category_id;
							$items = "*";
							$order = "category_name";
							$children1 = $this->administration_model->select_entries_where($table, $where, $items, $order);
							
							if(count($children1) > 0){
								?>
								<div class="sc_menu_wrapper">
									<div class="sc_menu">
                                <?php
						
								foreach($children1 as $child){
									$child_name = $child->category_name;
									$category_image_name = $child->category_image_name;
									$child_id = $child->category_id;
									?>
                                    	<a href="<?php echo site_url()."site/all_products/".$child_id;?>"><img src="<?php echo base_url();?>assets/categories/images/<?php echo $category_image_name;?>" alt="<?php echo $child_name?>" width="130px" height="195px"/><?php echo $child_name?></a>
									<?php
								}
								?>
                                    </div>
                                </div>
                                <?php
							}
							?>
                            </li>
                            <?php
						}
					}
				?>
                <!--<li>
                    <a href="#">Brand 1</a>
                    <div class="sc_menu_wrapper">
                        <div class="sc_menu">
                            <a href="http://www.flickr.com/photos/kk/1464732409/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/1.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464786371/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/2.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464889255/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/3.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464732409/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/1.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464786371/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/2.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464889255/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/3.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464732409/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/1.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464786371/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/2.jpg" alt=""/></a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#">Brand 2</a>
                    <div class="sc_menu_wrapper">
                        <div class="sc_menu">
                            <a href="http://www.flickr.com/photos/kk/1464993617/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/4.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465836986/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/5.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465609042/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/6.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464732409/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/1.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464786371/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/2.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464732409/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/1.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465609042/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/6.jpg" alt=""/></a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#">Fashion 1</a>
                    <div class="sc_menu_wrapper">
                        <div class="sc_menu">
                            <a href="http://www.flickr.com/photos/kk/1465859894/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/7.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465016083/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/8.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464773835/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/9.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465619152/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/10.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465859894/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/7.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465016083/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/8.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464773835/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/9.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465619152/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/10.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465859894/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/7.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465016083/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/8.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464773835/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/9.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465619152/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/10.jpg" alt=""/></a>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#">Fashion 2</a>
                    <div class="sc_menu_wrapper">
                        <div class="sc_menu">
                            <a href="http://www.flickr.com/photos/kk/1464993617/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/4.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465836986/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/5.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465609042/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/6.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464732409/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/1.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464786371/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/2.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464889255/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/3.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464732409/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/1.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464786371/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/2.jpg" alt=""/></a>
                        </div>
                    </div>
                </li>
                <li class="last">
                    <a href="#">Fashion 3</a>
                    <div class="sc_menu_wrapper">
                        <div class="sc_menu">
                            <a href="http://www.flickr.com/photos/kk/1464993617/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/4.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465836986/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/5.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465609042/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/6.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464732409/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/1.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464786371/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/2.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464889255/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/3.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1464993617/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/4.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465836986/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/5.jpg" alt=""/></a>
                            <a href="http://www.flickr.com/photos/kk/1465609042/in/set-72157602221334427/"><img src="<?php echo base_url();?>assets/services/images/6.jpg" alt=""/></a>
                        </div>
                    </div>
                </li>-->
            </ul>

        </div>
        <!-- The JavaScript -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script type="text/javascript">
            $(function(){
                /* function to make the thumbs menu scrollable */
                function buildThumbs($elem){
                    var $wrapper    	= $elem.next();
                    var $menu 		= $wrapper.find('.sc_menu');
                    var inactiveMargin 	= 150;
                    /* move the scroll down to the
                    beggining (move as much as the height of the menu) */
                    $wrapper.scrollTop($menu.outerHeight());
                    
                    /* when moving the mouse up or down, the wrapper moves (scrolls) up or down */
                    $wrapper.bind('mousemove',function(e){
                        var wrapperHeight 	= $wrapper.height();
                        var menuHeight 	= $menu.outerHeight() + 2 * inactiveMargin;
                        var top 	= (e.pageY - $wrapper.offset().top) * (menuHeight - wrapperHeight) / wrapperHeight - inactiveMargin;
                        $wrapper.scrollTop(top+10);
                    });
                }
                
                var stacktime;
				
                $('#menu li > a').bind('mouseover',function () {
                    var $this = $(this);
					
                    buildThumbs($this);
					
                    var pos	=	$this.next().find('a').size();
                    var f	=	function(){
                        if(pos==0) clearTimeout(stacktime);
                        $this.next().find('a:nth-child('+pos+')').css('visibility','visible');
                        --pos;
                    };
                    /* each thumb will appear with a delay */
                    stacktime = setInterval(f , 50);
                });
                
                /* on mouseleave of the whole <li> the scrollable area is hidden */
                $('#menu li').bind('mouseleave',function () {
                    var $this = $(this);
                    clearTimeout(stacktime);
                    $this.find('.sc_menu').css('visibility','hidden').find('a').css('visibility','hidden');
                    $this.find('.sc_menu_wrapper').css('visibility','hidden');
                });
                
                /* when hovering a thumb, change its opacity */
                $('.sc_menu a').hover(
                function () {
                    var $this = $(this);
                    $this.find('img')
                    .stop()
                    .animate({'opacity':'1.0'},400);
                },
                function () {
                    var $this = $(this);
                    $this.find('img')
                    .stop()
                    .animate({'opacity':'0.3'},400);
                }
            );
            });
        </script>
    </body>
</html>