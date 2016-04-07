<?php 
	if(count($contacts) > 0){
		foreach($contacts as $cat){
			
			$contacts_id = $cat->contacts_id;
			$email = $cat->email;
			$phone = $cat->phone;
			$post = $cat->post;
			$physical = $cat->physical;
			$site_name = $cat->site_name;
			$logo = $cat->logo;
			$facebook = $cat->facebook;
			$blog = $cat->blog;
		}
	}
?>
    </div><!-- End Wrapper -->
	<div class="footer">
    	<div class="row">
        	
        	<div class="col-md-12">
            	<div class="contacts row" style="margin:0">
                
                    <!-- Contacts -->
                	<div class="col-sm-4 col-md-4">
                		<h3>Contacts</h3>
                    	<div>
                        	<i class="fa fa-envelope" style="padding-left:4%;"></i> info@spareparts.com
                        </div>
                    	<div>
                        	<i class="fa fa-mobile fa-2x" style="padding-left:4%;"></i> +555555555555
                        </div>
                    	<div>
                        	<i class="fa fa-map-marker fa-2x" style="padding-left:3%;"></i> My Location goes here
                        </div>
                    </div><!-- End Contacts -->
                
                    <!-- Social Media -->
                	<div class="col-sm-4 col-md-4">
                		<h3>The buzz is at...</h3>
                    	<div>
                        	<i class="fa fa-facebook-square" style="padding-left:4%;"></i> facebook address
                        </div>
                    	<div>
                        	<i class="fa fa-twitter-square" style="padding-left:4%;"></i> twitter handle
                        </div>
                    	<div>
                        	<i class="fa fa-google-plus" style="padding-left:4%;"></i> google plus id
                        </div>
                    </div><!-- End Social Media -->
                
                    <!-- Payment -->
                	<div class="col-sm-4 col-md-4">
                		<h3>How to pay</h3>
                    	<div>
                        	<img src="img/paypal-logo.png" alt="..." class="img-thumbnail img-responsive">
                        </div>
                    </div><!-- End Payment -->
                    
                </div>
            </div><!-- End Contacts -->
        </div>
    </div><!-- End Footer -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" id="product_details">
     	
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
  </body>
</html>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url();?>assets/js/jquery-1.10.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script>
<script src="<?php echo base_url();?>assets/js/classie.js"></script>
<script src="<?php echo base_url();?>assets/js/mlpushmenu.js"></script>
<script src="<?php echo base_url();?>assets/js/script.js"></script>
<script type="text/javascript">
	if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
  		var msViewportStyle = document.createElement("style")
  			msViewportStyle.appendChild(
    			document.createTextNode(
      				"@-ms-viewport{width:auto!important}"
    			)
  			)
  		document.getElementsByTagName("head")[0].appendChild(msViewportStyle)
	}
	
	var 
		menuTop = document.getElementById( 'cbp-spmenu-s3' ),
		showTop = document.getElementById( 'showTop' ),
		body = document.body;
	showTop.onclick = function() {
		classie.toggle( this, 'active' );
		classie.toggle( menuTop, 'cbp-spmenu-open' );
		disableOther( 'showTop' );
	};

	function disableOther( button ) {
		if( button !== 'showTop' ) {
			classie.toggle( showTop, 'disabled' );
		}
	}
	new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ) );
</script>