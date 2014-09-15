<?php print render($page['header']); ?>
<?php 
	global $base_url; 
	global $language;
	$theme_image_url = $base_url . "/" . drupal_get_path('theme','mis_theme') . "/images/";
	$node->tabs = ($tabs)?render($tabs):null;
	$active_link = "";
	/* SUBMENU */
	$vars['submenu'] = FALSE;
	$menu_tree = menu_tree('main-menu');
	$active_trail = menu_get_active_trail();
	if( isset( $active_trail[1]['link_title'] ) ){
		$active_link = $active_trail[1]['link_title'];
	}
?>
<?php include_once('includes/header.inc'); ?>
<div id="wrapper" class="content-wrapper">
	<?php print render($page['content']); ?>
</div>
<?php include_once('includes/footer.inc'); ?>