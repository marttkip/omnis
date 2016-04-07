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
    <link href="<?php echo base_url();?>assets/css/bootstrap.css" rel="stylesheet" media="screen">
    <!-- Sidemenu -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/side_menu.css" />
    <!-- Search -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/search.css">
    <!-- General -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Playfair+Display:900italic' rel='stylesheet' type='text/css'>
    <!-- Font awesome -->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css">
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