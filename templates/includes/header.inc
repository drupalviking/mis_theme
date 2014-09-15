
<header class="header">
	<?php print ( $language->language == 'is' ) ? '<a href="/">' : '<a href="/en/">' ?>
		<section class="logo">
			Logo
		</section>
	</a>
	<nav class="main-menu">
		<?php $menu_items = menu_main_menu(); ?>
		<ul class="menu-links">
			<?php foreach( $menu_items as $menu_item ) : ?>
				<li class="menuparent"><a <?php print( $menu_item["title"] == $active_link ) ? 'class="selected"' : ''; ?> href="<?php print url($menu_item["href"]); ?>"><?php print $menu_item["title"]; ?></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</nav>
	<section class="lang-picker">
		<ul>
			<li><a href="/en">EN</a></li>
			<li><a href="/">IS</a></li>
		</ul>
	</section>
</header>