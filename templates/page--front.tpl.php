<?php
	global $language;
	global $base_url;
	$frontpage = mis_theme_get_frontpage_content($language->language);
	$testimonial = mis_theme_get_one_testimonial($language->language);
	$theme_url = $base_url . "/" . drupal_get_path('theme','mis_theme');
	//drupal_add_js( $theme_url . "/scripts/jquery.flexslider-min.js");
?>
<div id="wrapper" class="content-wrapper">
	<?php include_once('includes/header.inc'); ?>
	<section class="main front-page">
		<section class="slider">
			<div class="flexslider">
				<ul class="slides">
					<?php foreach( $frontpage->field_fs_slider['und'] as $slider ) : ?>
					<li>
						<img src="<?=image_style_url('slider', $slider['field_image']->file_source); ?>" />
						<h1><?=($language->language == 'is')
								? $slider['field_fyrirsogn']['und'][0]['safe_value']
								: $slider['field_fyrirsogn_a_ensku']['und'][0]['safe_value']; ?>
						</h1>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</section>
		<section class="main-content">
			<h1><?=$frontpage->field_fs_noh_titill['und'][0]['safe_value']; ?></h1>
			<?=$frontpage->field_fs_noh_texti['und'][0]['value']; ?>
			<span class="takki">
				<a href="<?=$frontpage->field_fs_noh_hlekkur['und'][0]['safe_value']; ?>"><?=$frontpage->field_fs_noh_texti_hnappi['und'][0]['safe_value']; ?></a>
			</span>
		</section>
		<section class="aherslugreinar">
			<ul>
				<?php foreach( $frontpage->field_fs_aherslugreinar['und'] as $item ) : ?>
					<li>
						<?php $grein = node_load( $item['target_id'] ); ?>
						<?php $img = scald_atom_load( $grein->field_image['und'][0]['sid']); ?>
						<article>
							<img src="<?=image_style_url('aherslufrett_thumbnail', $img->file_source); ?>" />
							<a href="<?=url('node/' . $grein->nid); ?>">
								<h1><?=$grein->title; ?></h1>
							</a>
							<?=$grein->body['und'][0]['summary']; ?>
							<a href="<?=url('node/' . $grein->nid); ?>">
								<p><?=t('More'); ?></p>
							</a>
						</article>
					</li>
				<?php endforeach; ?>
			</ul>
		</section>
		<section class="last">
			<section class="contact">
				<div class="content-inner">
					<h1><?=$frontpage->field_ci_titill['und'][0]['safe_value']; ?></h1>
					<?=$frontpage->field_ci_texti['und'][0]['safe_value']; ?>
				</div>
			</section>
			<section class="authors">
				<?php $grein = node_load( $frontpage->field_fs_hofundar['und'][0]['target_id'] ); ?>
				<h1><?=$grein->title; ?></h1>
				<?php $img = scald_atom_load( $grein->field_image['und'][0]['sid']); ?>
				<img src="<?=image_style_url('authors', $img->file_source); ?>" />
				<?=$grein->body['und'][0]['summary']; ?>
			</section>
			<section class="testimonial">
				<h1><?=$testimonial->title . ', ' . $testimonial->field_us_stada_titill['und'][0]['safe_value']; ?></h1>
				<?=$testimonial->body['und'][0]['summary']; ?>
			</section>
		</section>
	</section>
</div>
<script>
	(function($) {
		Drupal.behaviors.flexslider = {
			attach: function (context) {
				$(window).load(function() {
					$('.flexslider').flexslider({
						animation: "slide",
						controlNav: false,
						directionNav: false
					});
				});
			}
		};
	})(jQuery);
</script>
