<?php
global $language;
$catArray = mis_theme_get_all_categories_array();
$catParam = ( isset( $_GET['cat'] ) )
	? $_GET['cat']
	: null;
if( $catParam )
{
	$key = 0;
	foreach( $catArray as $ca )
	{
		if( $ca->field_css_class['und'][0]['safe_value'] == $catParam )
			$key = $ca->tid;
	}

	$exercises = mis_theme_get_all_exercises( $key, $language->language );
}
?>
<section class="exercises">
	<div class="wrapper">
		<h1><?=$node->title; ?></h1>
		<?=$node->body['und'][0]['safe_value']; ?>
		<?php if( $catParam ) : ?>
			<?php if( sizeof( $exercises ) > 0 ) : ?>
				<ul>
					<?php foreach( $exercises as $exercise ) : ?>
						<li>
							<article class="mis-list-entry">
								<?php if( isset( $exercise->field_mynd['und'] ) ) : ?>
									<figure>
										<?php $img = scald_atom_load( $exercise->field_mynd['und'][0]['sid'] ); ?>
										<img src="<?=image_style_url('medium', $img->file_source ); ?>" />
									</figure>
								<?php endif; ?>
								<div class="text">
									<a href="<?=url('node/' . $exercise->nid );?>">
										<h1><?=$exercise->title; ?></h1>
									</a>
									<?=render($exercise->body['und'][0]['safe_value']); ?>
									<?php if( isset( $exercise->field_ahold['und'] ) ) : ?>
										<h2>Áhöld</h2>
										<ul class="tools">
											<?php foreach( $exercise->field_ahold['und'] as $ahald ) : ?>
												<li class="tool"><?=$ahald['name']; ?></li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
								</div>
								<?php if( isset( $exercise->field_hljodskra['und'] ) ) : ?>
									<audio controls>
										<?php $audio = scald_atom_load( $exercise->field_hljodskra['und'][0]['sid'] ); ?>
										<source src="<?=file_create_url( $audio->file_source ); ?>" type="audio/mpeg">
										Your browser does not support the audio element.
									</audio>
								<?php endif; ?>
							</article>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php else : ?>
				<p><?=t('No exercises found'); ?></p>
			<?php endif; ?>
		<?php else : ?>
			<ul class="categories">
				<?php foreach( $catArray as $cat ) : ?>
					<a href="<?php echo ($language->language == 'is') ? '/aefingar?cat=' : '/en/exercise-programs?cat='; ?><?=$cat->field_css_class['und'][0]['safe_value'] ?>">
						<li class="<?=render( $cat->field_css_class['und'][0]['safe_value'] ); ?>">
							<h2><?=$cat->name; ?></h2>
						</li>
					</a>
				<?php endforeach; ?>
			</ul>
		<?php endif; ?>
	</div>
</section>