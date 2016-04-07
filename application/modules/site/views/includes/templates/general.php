<!doctype html>
<html lang="en" class="theme-a has-gradient has-pattern">
    <?php echo $this->load->view('includes/header', '', TRUE);?>
    <body>
        <div id="root">
        <input type="hidden" id="base_url" value="<?php echo site_url();?>">
        <input type="hidden" id="config_url" value="<?php echo site_url();?>">
            <?php echo $this->load->view('includes/navigation', '', TRUE);?>
            <?php echo $content;?>
            <?php echo $this->load->view('includes/footer', '', TRUE);?>
           
        </div>
        <script>
           // head.load('javascript/jquery.js','javascript/tf.js','javascript/scripts.js','javascript/mobile.js')
            head.load('<?php echo base_url().'assets/themes/omnis/'?>javascript/jquery.js','<?php echo base_url().'assets/themes/omnis/'?>javascript/scripts.js','<?php echo base_url().'assets/themes/omnis/'?>javascript/mobile.js','<?php echo base_url().'assets/themes/omnis/'?>javascript/custom.js')
        </script>
    </body>
</html>