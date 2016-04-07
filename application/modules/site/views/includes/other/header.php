<?php 
	if(count($contacts) > 0){
		foreach($contacts as $cat){
			$site_name = $cat->site_name;
		}
	}
?>

	<!-- Header -->
    <header class="navbar navbar_parts navbar-fixed-top bs-docs-nav" role="banner">
  		<div class="container">
        
        	<div class="float_right padding" style="margin-right:2.5%;">
                <button id="showTop" class="search"><i class="fa fa-search fa-2x"></i></button>
            </div>
            
    		<div class="navbar-header">
      			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        			<span class="sr-only">Toggle navigation</span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
        			<span class="icon-bar"></span>
      			</button>
      			<a href="<?php echo site_url();?>" class="title"><?php echo $site_name?></a>
    		</div>
    		
            <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      			<ul class="nav navbar-nav" style="cursor:pointer;">
        			<?php
					if(count($pages) > 0){
						
						foreach($pages as $cat){
					
							$page_name = $cat->page_name;
							$page_url = $cat->page_url;
							
							?>
                            <li>
                                <a href="<?php echo site_url()."site/".$page_url;?>"><?php echo $page_name;?></a>
                            </li>
                            <?php
						}
					}
					?>
      			</ul>
    		</nav>
  		</div>
	</header>
    <nav class="cbp-spmenu cbp-spmenu-horizontal cbp-spmenu-top" id="cbp-spmenu-s3">
    	<h3>Search</h3>
        
        <form>
        	<div class="search_items">
            	<div class="float_left">
                	<label for="brand">Brand</label>
                    <select class="form-control">
                          <option>Toyota</option>
                          <option>Nissan</option>
                          <option>Mitsubishi</option>
                          <option>Mercedes</option>
                          <option>BMW</option>
                    </select>
                </div>
            	<div class="float_left">
                	<label for="car_type">Car Type</label>
                    <select class="form-control">
                        <option>Corolla</option>
                        <option>Ipsum</option>
                        <option>Crown</option>
                        <option>Mark X</option>
                        <option>NZE</option>
                    </select>
                </div>
            	<div class="float_left">
                	<label for="year">Year</label>
                    <div class="row">
                    	<div class="col-md-6">
                            <select class="form-control">
                                <option>------From------</option>
                                <option>2014</option>
                                <option>2013</option>
                                <option>2012</option>
                                <option>2011</option>
                                <option>2010</option>
                            </select>
                        </div>
                    	<div class="col-md-6">
                            <select class="form-control">
                                <option>------To------</option>
                                <option>2010</option>
                                <option>2011</option>
                                <option>2012</option>
                                <option>2013</option>
                                <option>2014</option>
                            </select>
                        </div>
                    </div>
                </div>
            	<div class="float_left">
                	<label for="car_type">Category</label>
                    <select class="form-control">
                        <option>Body & Main Parts</option>
                        <option>Chasis</option>
                        <option>Electricals</option>
                        <option>Interior</option>
                        <option>Miscellaneous</option>
                    </select>
                </div>
            	<div class="float_left">
                	<label for="car_type">Sub Category</label>
                    <select class="form-control">
                        <option>Doors</option>
                        <option>Windows</option>
                    </select>
                </div>
            	<div class="float_left">
                	<button class="btn btn-lg search">Filter</button>
                </div>
        	</div>
        </form>
    </nav>

    <!-- End Header -->
    
	<div class="wrapper row mp-pusher" id="mp-pusher">
    
    	