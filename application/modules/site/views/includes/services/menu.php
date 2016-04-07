<?php 
	if(count($contacts) > 0){
		foreach($contacts as $cat){
			$site_name = $cat->site_name;
			$logo = $cat->logo;
		}
	}
?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/menu/css/default.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/menu/css/component.css" />
<script src="<?php echo base_url();?>assets/menu/js/modernizr.custom.js"></script>

<div style="float:left; padding:0 0 0 10%;">
	<img src="<?php echo base_url()."assets/logo/".$logo;?>" width="250"/>
    <h1> Products/ Services</h1>
</div>

<div class="main clearfix">
    
    <nav id="menu" class="nav">					
        <ul>
        	<?php
				if(count($pages) > 0){
					
					foreach($pages as $cat){
				
						$page_name = $cat->page_name;
						$page_url = $cat->page_url;
						$icon = strtolower($page_name);
						?>
						<li>
							<a href="<?php echo site_url()."site/".$page_url;?>">
                                <span class="icon">
                                    <i aria-hidden="true" class="icon-<?php echo $icon;?>"></i>
                                </span>
                                <span><?php echo $page_name;?></span>
                            </a>
						</li>
						<?php
					}
				}
			?>
            <!--<li>
                <a href="#">
                    <span class="icon">
                        <i aria-hidden="true" class="icon-home"></i>
                    </span>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon"> 
                        <i aria-hidden="true" class="icon-services"></i>
                    </span>
                    <span>Services</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon">
                        <i aria-hidden="true" class="icon-portfolio"></i>
                    </span>
                    <span>Portfolio</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon">
                        <i aria-hidden="true" class="icon-blog"></i>
                    </span>
                    <span>Blog</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon">
                        <i aria-hidden="true" class="icon-team"></i>
                    </span>
                    <span>The team</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon">
                        <i aria-hidden="true" class="icon-contact"></i>
                    </span>
                    <span>Contact</span>
                </a>
            </li>-->
        </ul>
    </nav>
</div>

<script>
	//  The function to change the class
	var changeClass = function (r,className1,className2) {
		var regex = new RegExp("(?:^|\\s+)" + className1 + "(?:\\s+|$)");
		if( regex.test(r.className) ) {
			r.className = r.className.replace(regex,' '+className2+' ');
		}
		else{
			r.className = r.className.replace(new RegExp("(?:^|\\s+)" + className2 + "(?:\\s+|$)"),' '+className1+' ');
		}
		return r.className;
	};	

	//  Creating our button in JS for smaller screens
	var menuElements = document.getElementById('menu');
	menuElements.insertAdjacentHTML('afterBegin','<button type="button" id="menutoggle" class="navtoogle" aria-hidden="true"><i aria-hidden="true" class="icon-menu"> </i> Menu</button>');

	//  Toggle the class on click to show / hide the menu
	document.getElementById('menutoggle').onclick = function() {
		changeClass(this, 'navtoogle active', 'navtoogle');
	}

	// http://tympanus.net/codrops/2013/05/08/responsive-retina-ready-menu/comment-page-2/#comment-438918
	document.onclick = function(e) {
		var mobileButton = document.getElementById('menutoggle'),
			buttonStyle =  mobileButton.currentStyle ? mobileButton.currentStyle.display : getComputedStyle(mobileButton, null).display;

		if(buttonStyle === 'block' && e.target !== mobileButton && new RegExp(' ' + 'active' + ' ').test(' ' + mobileButton.className + ' ')) {
			changeClass(mobileButton, 'navtoogle active', 'navtoogle');
		}
	}
</script>
		