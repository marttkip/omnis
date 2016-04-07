<!DOCTYPE html>
<html lang="en">

  <?php echo $this->load->view('blog/includes/header', '', TRUE);?>

  <body>
    

    

    <div id="pm_layout_wrapper" class="pm-full-mode"><!-- Use wrapper for wide or boxed mode -->
    
        
        <?php echo $this->load->view('site/includes/navigation', '', TRUE);?>
        <!-- Sub-header area -->
         <?php if(isset($post_id)){echo $this->load->view('blog/includes/sub_header', '', TRUE);}?>
        <!-- Sub-header area end -->
        
        <!-- BODY CONTENT starts here -->
        
                
        <!-- PANEL 1 -->
        <div class="container pm-containerPadding-top-110 pm-containerPadding-bottom-40">   
            <?php echo $content;?>
        </div>
        <!-- PANEL 1 end -->
        
        
        <!-- BODY CONTENT end -->
        
       <?php echo $this->load->view('site/includes/footer', '', TRUE);?>
                
       
    
    </div><!-- /pm_layout-wrapper -->
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/jquery-2.1.3.min.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/jquery.viewport.mini.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/jquery.easing.1.3.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>bootstrap3/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/modernizr.custom.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/owl-carousel/owl.carousel.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/main.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/jquery.tooltip.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/superfish/superfish.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/superfish/hoverIntent.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/stellar/jquery.stellar.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/theme-color-selector/theme-color-selector.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/meanmenu/jquery.meanmenu.min.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/flexslider/jquery.flexslider.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/jquery.testimonials.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/wow/wow.min.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/jquery-migrate-1.2.1.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/prettyphoto/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/tinynav.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/jquery-ui.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/ajax-appointment-form/ajax-appointment-form.js"></script>
    <script src="<?php echo base_url().'assets/themes/medicallink/'?>js/twitterfetch/twitterfetch.js"></script>
    <p id="back-top" class="visible-lg visible-md visible-sm"></p>
    
  </body>
</html>
