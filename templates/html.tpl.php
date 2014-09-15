<!doctype html>
<!--



/\ \/\ \                 /\_ \           __/\ \__/\ \__                        /\ \                                          /\ \                /'___\ 
\ \ \_\ \  __  __     __ \//\ \      __ /\_\ \ ,_\ \ ,_\        ___      __    \ \ \___      __      ___     ___      __     \_\ \         __   /\ \__/ 
 \ \  _  \/\ \/\ \  /'_ `\ \ \ \   /'__`\/\ \ \ \/\ \ \/       / __`\  /'_ `\   \ \  _ `\  /'__`\  /' _ `\ /' _ `\  /'__`\   /'_` \      /'__`\ \ \ ,__\
  \ \ \ \ \ \ \_\ \/\ \L\ \ \_\ \_/\  __/\ \ \ \ \_\ \ \_     /\ \L\ \/\ \L\ \   \ \ \ \ \/\ \L\.\_/\ \/\ \/\ \/\ \/\ \L\.\_/\ \L\ \    /\ \L\.\_\ \ \_/
   \ \_\ \_\ \____/\ \____ \/\____\ \____\\ \_\ \__\\ \__\    \ \____/\ \____ \   \ \_\ \_\ \__/.\_\ \_\ \_\ \_\ \_\ \__/.\_\ \___,_\   \ \__/.\_\\ \_\ 
    \/_/\/_/\/___/  \/___L\ \/____/\/____/ \/_/\/__/ \/__/     \/___/  \/___L\ \   \/_/\/_/\/__/\/_/\/_/\/_/\/_/\/_/\/__/\/_/\/__,_ /    \/__/\/_/ \/_/ 
                      /\____/                                            /\____/                                                                        
                      \_/__/                                             \_/__/                                                                         
 __  __                                                                      __  __                             
/\ \/\ \                                                                    /\ \/\ \                            
\ \ \/'/'    ___     ____    ___ ___     ___     ____        ___      __    \ \ \/'/'     __      ___     ____  
 \ \ , <    / __`\  /',__\ /' __` __`\  / __`\  /',__\      / __`\  /'_ `\   \ \ , <    /'__`\   / __`\  /',__\ 
  \ \ \\`\ /\ \L\ \/\__, `\/\ \/\ \/\ \/\ \L\ \/\__, `\    /\ \L\ \/\ \L\ \   \ \ \\`\ /\ \L\.\_/\ \L\ \/\__, `\
   \ \_\ \_\ \____/\/\____/\ \_\ \_\ \_\ \____/\/\____/    \ \____/\ \____ \   \ \_\ \_\ \__/.\_\ \____/\/\____/
    \/_/\/_/\/___/  \/___/  \/_/\/_/\/_/\/___/  \/___/      \/___/  \/___L\ \   \/_/\/_/\/__/\/_/\/___/  \/___/ 
                                                                      /\____/                                   
                                                                      \_/__/                                    
-->


<?php 
	global $base_url;
?>

<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"><!--<![endif]-->
<head>
	<?php print $head; ?>
<title><?php print $head_title; ?></title>
<meta name="viewport" charset="utf-8" content="width=device-width, initial-scale=1.0">

<!-- For all browsers -->
	<?php print $styles; ?>
	<?php print $scripts; ?>
<!--[if (lt IE 9) & (!IEMobile)]>
<script src="js/selectivizr-min.js"></script>
<![endif]-->
<!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

<?php 
/*
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php print $base_url . "/". drupal_get_path('theme', 'themename'); ?>/images/favicon-114x114.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php print $base_url . "/". drupal_get_path('theme', 'themename'); ?>/images/favicon-72x72.png">
<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?php print $base_url . "/". drupal_get_path('theme', 'themename'); ?>/images/favicon-57x57.png">
<link rel="apple-touch-icon-precomposed" href="/sites/all/themes/on_theme/images/favicon-57x57.png">
*/ 
?>
</head>

<body class="<?php print $classes; ?>" <?php print $attributes;?>>
	<?php print $page_top; ?>
	<?php print $page; ?>
	<?php print $page_bottom; ?>
</body>
</html>
