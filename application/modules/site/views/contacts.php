<?php 
	if(count($contacts) > 0)
	{
		$email = $contacts['email'];
		$phone = $contacts['phone'];
		$facebook = $contacts['facebook'];
		$twitter = $contacts['twitter'];
		$linkedin = $contacts['linkedin'];
		$logo = $contacts['logo'];
		$company_name = $contacts['company_name'];
		$address = $contacts['address'];
		$city = $contacts['city'];
		$post_code = $contacts['post_code'];
		$building = $contacts['building'];
		$floor = $contacts['floor'];
		$location = $contacts['location'];
		$working_weekend = $contacts['working_weekend'];
		$working_weekday = $contacts['working_weekday'];
		
		if(!empty($email))
		{
			$mail = '<div class="top-number"><p><i class="fa fa-envelope-o"></i> '.$email.'</p></div>';
		}
		
		if(!empty($facebook))
		{
			$facebook = '<li><a href="'.$facebook.'" target="_blank"><i class="fa fa-facebook"></i></a></li>';
		}
		
		if(!empty($twitter))
		{
			$twitter = '<li><a href="'.$twitter.'" target="_blank"><i class="fa fa-twitter"></i></a></li>';
		}
		
		if(!empty($linkedin))
		{
			$linkedin = '<li><a href="'.$linkedin.'" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
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
	}
?>

    <section id="contact-info">
        <div class="center">                
            <h2>How to Reach Us?</h2>
        </div>
        
        <div id="map_canvas" style="width: 100%; height:400px;"></div>
       
        <!--<div class="gmap-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 text-center">
                        <div class="gmap">
                            <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=JoomShaper,+Dhaka,+Dhaka+Division,+Bangladesh&amp;aq=0&amp;oq=joomshaper&amp;sll=37.0625,-95.677068&amp;sspn=42.766543,80.332031&amp;ie=UTF8&amp;hq=JoomShaper,&amp;hnear=Dhaka,+Dhaka+Division,+Bangladesh&amp;ll=23.73854,90.385504&amp;spn=0.001515,0.002452&amp;t=m&amp;z=14&amp;iwloc=A&amp;cid=1073661719450182870&amp;output=embed"></iframe>
                        </div>
                        <div id="map_canvas" style="width: 100%;"></div>
                    </div>

                    <div class="col-sm-7 map-content">
                        <ul class="row">
                            <li class="col-sm-6">
                                <address>
                                    <h5>Physical address</h5>
                                    <p><?php echo $location;?> <br>
                                    <?php echo $building;?><br>
                                    <?php echo $floor;?> </p>                               
                                    <p>Phone:<?php echo $phone;?> <br>
                                    Email Address:<?php echo $email;?></p>
                                </address>
                                
                                <address>
                                    <h5>Working hours</h5>
                                    <p>Weekdays: <?php echo $working_weekday;?> </p>                               
                                    <p>Weekends & public holidays: <?php echo $working_weekend;?></p>
                                </address>
                            </li>


                            <li class="col-sm-6">
                                <address>
                                    <h5>Postal</h5>
                                    <p><?php echo $address;?> <br>
                                    <?php echo $city;?> <br />
                                    <?php echo $post_code;?></p> 
                                </address>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>-->
    </section>  <!--/gmap_area -->

    <section id="contact-page">
        <div class="container">
        	<div class="row">
            	<div class="col-md-4 map-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <address>
                                <h5>Physical address</h5>
                                <p><?php echo $location;?> <br>
                                <?php echo $building;?><br>
                                <?php echo $floor;?> </p>                               
                                <p>Phone:<?php echo $phone;?> <br>
                                Email Address:<?php echo $email;?></p>
                            </address>
                        </div>

                        <div class="col-sm-12">
                        	<address>
                                <h5>Working hours</h5>
                                <p>Weekdays: <?php echo $working_weekday;?> </p>                               
                                <p>Weekends & public holidays: <?php echo $working_weekend;?></p>
                            </address>
                        </div>

                        <div class="col-sm-12">
                            <address>
                                <h5>Postal address</h5>
                                <p><?php echo $address;?> <br>
                                <?php echo $city;?> <br />
                                <?php echo $post_code;?></p> 
                            </address>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-8">
                	<div class="center">        
                        <h2>Drop Your Message</h2>
                        <p class="lead">Send us a message and we will get back to you; ussually between 24 hours.</p>
                    </div> 
                    <div class="row contact-wrap"> 
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php">
                            <div class="col-sm-5 col-sm-offset-1">
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="text" name="name" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Email *</label>
                                    <input type="email" name="email" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="number" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" class="form-control">
                                </div>                        
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Subject *</label>
                                    <input type="text" name="subject" class="form-control" required="required">
                                </div>
                                <div class="form-group">
                                    <label>Message *</label>
                                    <textarea name="message" id="message" required="required" class="form-control" rows="8"></textarea>
                                </div>                        
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Message</button>
                                </div>
                            </div>
                        </form> 
                    </div><!--/.row-->
                </div>
            </div>
        </div><!--/.container-->
    </section><!--/#contact-page-->
    

<script type="text/javascript"   src="http://maps.google.com/maps/api/js?sensor=false"> </script>

<script type="text/javascript">
$(document).ready(function() {
	initialize()
});
  function initialize() {
    var position = new google.maps.LatLng('-1.295977', '36.808225');
	 <!-- var position = new google.maps.LatLng(latitude, longitude);-->
    var myOptions = {
      zoom: 18,
      center: position,
      mapTypeId: google.maps.MapTypeId.ROADMAP
		//mapTypeId: google.maps.MapTypeId.HYBRID
    };
    var map = new google.maps.Map(
        document.getElementById("map_canvas"),
        myOptions);
 
    var marker = new google.maps.Marker({
        position: position,
        map: map,
        title:"<?php echo $company_name;?>"
    });  
 
   var contentString = '<br/><span itemprop="streetAddress"><?php echo $company_name;?></span>, <span itemprop="addressLocality"><?php echo $building.', '.$floor;?></span>';
    //var contentString = '';
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });
       infowindow.open(map,marker);
    google.maps.event.addListener(marker, 'click', function() {
      infowindow.open(map,marker);
    });
 
  }
 
</script>
