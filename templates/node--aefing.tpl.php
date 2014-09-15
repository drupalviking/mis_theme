<article class="mis-list-entry">
	<?php if( isset( $node->field_mynd['und'] ) ) : ?>
		<figure>
			<?php $img = scald_atom_load( $node->field_mynd['und'][0]['sid'] ); ?>
			<img src="<?=image_style_url('medium', $img->file_source ); ?>" />
		</figure>
	<?php endif; ?>
	<div class="text">
		<a href="<?=url('node/' . $node->nid );?>">
			<h1><?=$node->title; ?></h1>
		</a>
		<?=render($node->body['und'][0]['safe_value']); ?>
	</div>
	<?php if( isset( $node->field_hljodskra['und'] ) ) : ?>
		<audio controls>
			<?php $audio = scald_atom_load( $node->field_hljodskra['und'][0]['sid'] ); ?>
			<source src="<?=file_create_url( $audio->file_source ); ?>" type="audio/mpeg">
			Your browser does not support the audio element.
		</audio>
	<?php endif; ?>
</article>