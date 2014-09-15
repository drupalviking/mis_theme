<?php
if( isset( $node->field_mynd['und'] ) )
{
	$image = scald_atom_load( $node->field_mynd['und'][0]['sid'] );
}

if( isset( $node->field_hljodskra['und'] ) )
{
	$audio = scald_atom_load( $node->field_hljodskra['und'][0]['sid'] );
}
?>
	<article class="article">
		<h1><?=$node->title; ?></h1>
		<?=render( $node->body['und'][0]['safe_value'] ); ?>
		<?php if( $image ) : ?>
			<img src="<?=image_style_url('large', $image->file_source); ?>" />
		<?php endif; ?>
		<?php if( $audio ) : ?>
			<audio controls>
				<source src="<?=file_create_url( $audio->file_source ); ?>" type="audio/mpeg">
				Your browser does not support the audio element.
			</audio>
		<?php endif; ?>
	</article>
<?php //print_r( $node ); ?>