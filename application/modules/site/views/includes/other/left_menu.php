<!-- mp-menu -->
        <nav id="mp-menu" class="mp-menu">
            <div class="mp-level">
                <h2 >All Categories</h2>
                <ul>
					<?php
                        if(count($categories > 0)){
                            
                            foreach($categories as $cat){
                                $category_name = $cat->category_name;
                                $category_id = $cat->category_id;
								
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
									<li>
										<i class="fa fa-angle-left fa-3x"></i>
										<a href="<?php echo site_url()."site/all_products/".$category_id;?>"><?php echo $category_name;?></a>
                                    <div class="mp-level">
                                        <h2><?php echo $category_name;?></h2>
                                        <ul>
                                    <?php
									foreach($children1 as $cat1){
										$category_name2 = $cat1->category_name;
										$category_id2 = $cat1->category_id;
										
										 /*
										-----------------------------------------------------------------------------------------
											Retrieve category children level 2
										-----------------------------------------------------------------------------------------
										*/
										$table = "category";
										$where = "category_status = 1 AND category_parent = ".$category_id2;
										$items = "*";
										$order = "category_name";
										$children2 = $this->administration_model->select_entries_where($table, $where, $items, $order);
										if(count($children2) > 0){
											?>
                                            <li>
											<i class="fa fa-angle-left fa-3x"></i>
											<a href="<?php echo site_url()."site/all_products/".$category_id2;?>"><?php echo $category_name2;?></a>
											<div class="mp-level">
												<h2><?php echo $category_name2;?></h2>
												<ul>
											<?php
											foreach($children2 as $cat2){
												$category_name3 = $cat2->category_name;
												$category_id3 = $cat2->category_id;
												?>
												<li><a href="<?php echo site_url()."site/all_products/".$category_id3;?>"><?php echo $category_name3;?></a></li>
												 <?php
											}
											?></li>
												</ul>
											</div>
											<?php
										}
										else{
										?>
											<li><a href="<?php echo site_url()."site/all_products/".$category_id2;?>"><?php echo $category_name2;?></a></li>
										<?php
										}
									}
									?>
                                        </ul>
                                    </div>
                                    <?php
								}
								else{
								?>
									<li><a href="<?php echo site_url()."site/all_products/".$category_id;?>"><?php echo $category_name;?></a></li>
								<?php
								}
								?>
                                </li>
                                <?php
                            }
                        }
                    ?>
                    <!--<li>
                    	<i class="fa fa-angle-left fa-3x"></i>
                        <a href="#">Body & Main Parts</a>
                        <div class="mp-level">
                            <h2>Body & Main Parts</h2>
							<ul>
								<li><a href="#">Doors</a></li>
								<li><a href="#">Windows</a></li>
							</ul>
						</div>
                    </li>
                    <li>
                    	<i class="fa fa-angle-left fa-3x"></i>
                        <a href="#">Electrical & Electronics</a>
                        <div class="mp-level">
                            <h2>Electrical & Electronics</h2>
							<ul>
								<li><a href="#">Audio/ Video Devices</a></li>
								<li><a href="#">Charging Systems</a></li>
								<li><a href="#">Electrical Supply</a></li>
								<li><a href="#">Guages & Meters</a></li>
								<li><a href="#">Ignition Systems</a></li>
								<li><a href="#">Lighting & Signalling</a></li>
								<li><a href="#">Sensors</a></li>
								<li><a href="#">Starting Systems</a></li>
								<li><a href="#">Switches</a></li>
								<li><a href="#">Wiring Harnesses</a></li>
								<li><a href="#">Miscellaneous</a></li>
							</ul>
						</div>
                    </li>
                    <li>
                    	<i class="fa fa-angle-left fa-3x"></i>
                        <a href="#">Interior</a>
                        <div class="mp-level">
                            <h2>Interior</h2>
							<ul>
								<li><a href="#">Floor Components</a></li>
								<li><a href="#">Car Seats</a></li>
								<li><a href="#">Other</a></li>
							</ul>
						</div>
                    </li>
                    <li>
                    	<i class="fa fa-angle-left fa-3x"></i>
                        <a href="#">Powertrain & Chassis</a>
                        <div class="mp-level">
                            <h2>Powertrain & Chassis</h2>
							<ul>
								<li><a href="#">Brakes</a></li>
								<li>
									<i class="fa fa-angle-left fa-3x"></i>
									<a href="#">Engine Parts</a>
									<div class="mp-level">
										<h2>Engine Parts</h2>
										<ul>
											<li><a href="#">Components</a></li>
											<li><a href="#">Cooling Systems</a></li>
											<li><a href="#">Oil Systems</a></li>
										</ul>
									</div>
								</li>
								<li><a href="#">Exhaust</a></li>
								<li><a href="#">Fuel Supply</a></li>
								<li><a href="#">Suspension & Steering</a></li>
								<li><a href="#">Transmission</a></li>
							</ul>
						</div>
                    </li>
                    <li>
                    	<i class="fa fa-angle-left fa-3x"></i>
                        <a href="#">Miscellaneous</a>
                        <div class="mp-level">
                            <h2>Miscellaneous</h2>
							<ul>
								<li><a href="#">Air Conditioning</a></li>
								<li><a href="#">Bearings</a></li>
								<li><a href="#">Hoses</a></li>
								<li><a href="#">Wipers</a></li>
								<li><a href="#">Others</a></li>
							</ul>
						</div>
                    </li>-->
					
                </ul>
            </div>
        </nav>
        <!-- /mp-menu -->
        
		<!-- Categories -->
        <div class="col-md-3">
            	
                <!-- Categories -->
                <div class="row">
                	<div class="col-md-12 no_padding">
                    	<div class="panel panel-default">
  							<div class="panel_lorenza">
    							<h4>Navigation</h4>
  							</div>
  							<div class="panel-body no_padding">
                        		<ul>
                        			<li><a href="#" id="trigger" class="menu-trigger">Categories</a></li>
                        		</ul>
  							</div>
						</div>
                    </div>
                </div><!-- End Categories -->
            	
                <!-- Cart -->
                <div class="row">
                	<div class="col-md-12 no_padding">
                    	<div class="panel panel-default">
  							<div class="panel_lorenza">
    							<h4>Shopping Cart</h4>
  							</div>
  							<div class="panel-body">
                            	<table class="table table-condensed table-responsive table-hover table-striped">
                                	<tr>
                                    	<th>Item</th>
                                    	<th>Cost</th>
                                    </tr>
                                	<tr>
                                    	<td>
                                        	Toyota Prado Headlights
                                        	<div class="input-group">
                                            	<span class="input-group-btn">
                                            		<button class="btn btn_pink" type="button"><i class="fa fa-trash-o"></i></button>
                                            	</span>
                                            	<input type="text" class="form-control" value="2">
                                            	<span class="input-group-btn">
                                            		<button class="btn btn_pink" type="button"><i class="fa fa-refresh"></i></button>
                                            	</span>
                                            </div><!-- /input-group -->
                                        </td>
                                    	<td>KES 3,000.00</td>
                                    </tr>
                                	<tr>
                                    	<td>
                                        	14'' Rims
                                        	<div class="input-group">
                                            	<span class="input-group-btn">
                                            		<button class="btn btn_pink" type="button"><i class="fa fa-trash-o"></i></button>
                                            	</span>
                                            	<input type="text" class="form-control" value="1">
                                            	<span class="input-group-btn">
                                            		<button class="btn btn_pink" type="button"><i class="fa fa-refresh"></i></button>
                                            	</span>
                                            </div><!-- /input-group -->
                                        </td>
                                    	<td>KES 25,000.00</td>
                                    </tr>
                                    <tr>
                                    	<th>Total</th>
                                    	<th>KES 28,000.00</th>
                                    </tr>
                                </table>
                                
                                <div class="row">
                                	<div class="col-md-6">
                                    	<button class="btn btn_pink" type="button"><i class="fa fa-times"></i> Empty</button>
                                    </div>
                                	<div class="col-md-6">
                                    	<a href="check_out.html" class="btn btn_dark_pink"><i class="fa fa-sign-out"></i> Checkout</a>
                                    </div>
                                </div>
                                
  							</div>
						</div>
                    </div>
                </div><!-- End Cart -->
                
            </div>
            <!-- End Cart & Categories -->
        	