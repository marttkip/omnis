<?php
	$contacts = $this->site_model->get_contacts();
	
	if(count($contacts) > 0)
	{
		$email = $contacts['email'];
		$email2 = $contacts['email'];
		$facebook = $contacts['facebook'];
		$twitter = $contacts['twitter'];
		$linkedin = $contacts['linkedin'];
		$logo = $contacts['logo'];
		$company_name = $contacts['company_name'];
		$phone = $contacts['phone'];
		
		if(!empty($email))
		{
			$email = '<div class="top-number"><p><i class="fa fa-envelope-o"></i> '.$email.'</p></div>';
		}
		
		if(!empty($facebook))
		{
			$twitter = '<li class="pm_tip_static_bottom" title="Twitter"><a href="#" class="fa fa-twitter" target="_blank"></a></li>';
		}
		
		if(!empty($facebook))
		{
			$linkedin = '<li class="pm_tip_static_bottom" title="Linkedin"><a href="#" class="fa fa-linkedin" target="_blank"></a></li>';
		}
		
		if(!empty($facebook))
		{
			$google = '<li class="pm_tip_static_bottom" title="Google Plus"><a href="#" class="fa fa-google-plus" target="_blank"></a></li>';
		}
		
		if(!empty($facebook))
		{
			$facebook = '<li class="pm_tip_static_bottom" title="Facebook"><a href="#" class="fa fa-facebook" target="_blank"></a></li>';
		}
	}
	else
	{
		$email = '';
		$facebook = '';
		$twitter = '';
		$linkedin = '';
		$logo = '';
		$company_name = '';
		$google = '';
	}
?>
<header id="top">
    <h1><a href="./" accesskey="h"><img src="<?php echo base_url()?>assets/themes/omnis/img/omnis_name_logo.png" alt="Omnis" class="logo"></a></h1>
    <nav id="skip">
        <ul>
            <li><a href="#nav" accesskey="n">Skip to navigation (n)</a></li>
            <li><a href="#content" accesskey="c">Skip to content (c)</a></li>
            <li><a href="#footer" accesskey="f">Skip to footer (f)</a></li>
        </ul>
    </nav>
    <nav id="nav">
        <ul>
            <li><a accesskey="1" href="<?php echo base_url();?>home">Home</a> <em>(1)</em></li>
           <!--  <li><a accesskey="3" href="./">Blog</a> <em>(3)</em></li>
            <li><a accesskey="4" href="./">Contact</a> <em>(4)</em></li> -->
            <?php 
            $admin_id = $this->session->userdata('admin_id');

            if(!empty($admin_id))
            {
            	?>
            	 <li class="a"><a accesskey="5" href="<?php echo base_url();?>log-out">Welcom back <?php echo $this->session->userdata('admin_first_name')?> Log out</a> <em>(5)</em></li>
            	<?php	
            }
            else
            {
            ?>
            	<li class="a"><a accesskey="5" href="<?php echo base_url();?>sign-in">Log In / Sign Up</a> <em>(5)</em></li>
            <?php
        	}
        	?>
        </ul>
    </nav>
    <?php

    if(!empty($admin_id))
    {
   	?>
	    <div style="width:89%">
		    <div class="pull-right">

					<a href="<?php echo base_url()?>my-account" class="setting-btn" >My account</i></a> 
					<!-- <span class="setting-btn">::</span> -->
					<!-- <a href="<?php echo base_url()?>" class="setting-btn" ></i> Change passswords</a> -->
			</div>
		</div>
	<?php
	}
	?>
</header> 