<?php 
	if(count($contacts) > 0){
		foreach($contacts as $cat){
			$site_name = $cat->site_name;
			$logo = $cat->logo;
		}
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $site_name?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/index/css/bootstrap.css" rel="stylesheet" media="screen">
    <!-- Sidemenu -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/services/css/demo.css" />
    <!-- Search -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/services/css/style.css">
    <!--[if IE]>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/index/css/styleIE.css" />
    <![endif]-->
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css' />
    <!-- Favicon -->
    <link href="<?php echo base_url();?>assets/logo/thumbs/<?php echo $logo?>" rel="shortcut icon" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <input type="hidden" name="baseurl" id="baseurl" value="<?php echo site_url();?>"/>