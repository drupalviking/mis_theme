<?php
	if( isset( $node->field_image['und'] ) )
	{
		$image = scald_atom_load( $node->field_image['und'][0]['sid'] );
	}
?>
<article class="article">
	<h1><?=$node->title; ?></h1>
	<?=render( $node->body['und'][0]['safe_value'] ); ?>
	<?php if( $image ) : ?>
		<img src="<?=image_style_url('large', $image->file_source); ?>" />
	<?php endif; ?>
</article>
<?php //print_r( $node ); ?>