<?php
	/**
	 * Helper functions for MIS
	 *
	 * @author Hilmar Kári Hallbjörnsson <hilmar@kosmosogkaos.is>
	 */

	function mis_theme_preprocess_user_login(&$vars) {
		$vars['intro_text'] = t('MIS login form');
	}

	function mis_theme_theme() {
		return array(
			'user_login' => array(
				'render element' => 'form',
				'path' => drupal_get_path('theme', 'mis_theme') . '/templates',
				'template' => 'user-login',
				'preprocess functions' => array(
					'mis_theme_preprocess_user_login'
				),
			)
		);
	}

	function mis_theme_js_alter(&$js) {
		// Sort JS items, so that they appear in the correct order.
		uasort($js, 'drupal_sort_css_js');

		$weight = 0;

		foreach ($js as $name => $javascript) {
			$js[$name]['group'] = -100;
			$js[$name]['weight'] = ++$weight;
			$js[$name]['every_page'] = 1;
		}
	}

	function mis_theme_css_alter(&$css) {
		// Sort CSS items, so that they appear in the correct order.
		uasort($css, 'drupal_sort_css_js');

		$weight = 0;

		foreach ($css as $name => $javascript) {
			$css[$name]['group'] = -100;
			$css[$name]['weight'] = ++$weight;
			$css[$name]['every_page'] = 1;
		}
	}

function mis_theme_get_frontpage_content($language)
{
	$frontpageQuery = new EntityFieldQuery;
	$result = $frontpageQuery
		->entityCondition('entity_type', 'node')
		->propertyCondition('type', 'forsida')
		->propertyCondition('status', 1, '=')
		->propertyCondition('language', $language, '=')
		->propertyOrderBy('created', 'DESC')
		->execute();

	if (!empty($result['node'])) {
		$frontpage = entity_load('node', array_keys($result['node']));
		$frontpage = array_values($frontpage);
		$frontpage = $frontpage[0];
	}

	foreach ($frontpage->field_fs_slider['und'] as $key => &$value)
	{

		$c = field_collection_field_get_entity($value);

		$value = array(
			'field_image'	 	=> (isset($c->field_image["und"])) ? scald_atom_load( $c->field_image["und"][0]["sid"] ) : null,
			'field_fyrirsogn'	=> (isset($c->field_fyrirsogn["und"])) ? $c->field_fyrirsogn : null
		);
	}

	return $frontpage;
}

function mis_theme_get_one_testimonial( $language )
{
	$testimonialQuery = new EntityFieldQuery;
	$result = $testimonialQuery
		->entityCondition('entity_type', 'node')
		->propertyCondition('type', 'umsogn')
		->propertyCondition('status', 1, '=')
		->propertyCondition('language', $language, '=')
		->propertyOrderBy('created', 'DESC')
		->execute();

	if (!empty($result['node'])) {
		$testimonial = entity_load('node', array_keys($result['node']));
		$testimonial = array_values($testimonial);
		$size = sizeof( $testimonial );
		$testimonial = $testimonial[rand(0, $size - 1)];
	}

	return $testimonial;
}

function mis_theme_get_all_categories_array()
{
	$categories = taxonomy_get_tree(5);
	$catArray = null;
	foreach( $categories as $cat )
	{
		$catArray[] = taxonomy_term_load($cat->tid);
	}

	return $catArray;
}

function mis_theme_get_all_exercises( $category, $language )
{
	$misQuery = new EntityFieldQuery;
	$result = $misQuery
		->entityCondition('entity_type', 'node')
		->propertyCondition('type', 'aefing')
		->propertyCondition('status', 1, '=')
		->propertyCondition('language', $language, '=')
		->propertyOrderBy('title', 'ASC')
		->fieldCondition('field_aldursflokkun', 'tid', $category )
		->execute();

	if (!empty($result['node'])) {
		$mis = entity_load('node', array_keys($result['node']));
	}

	foreach( $mis as $tmp )
	{
		if( isset( $tmp->field_ahold['und'] ) )
		{
			foreach( $tmp->field_ahold['und'] as $key => &$ahald )
			{
				$tax = taxonomy_term_load( $ahald['tid'] );
				$ahald['name'] = $tax->name;
			}
		}
	}

	return $mis;
}

?>