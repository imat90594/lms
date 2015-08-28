<?php

function daisyflo_preprocess_html (&$variables) {
	
}

function daisyflo_preprocess_page (&$variables) {
	
	if ($node = menu_get_object()) {
		// Get the nid
		$nid = $node->nid;
	}
	
	if (isset($variables['action_links'])) {
		
		//change the start url to node/%/quizzes to change the landing destination upon quiz start
		//$variables['action_links'][0]['#link']['href'] = 'node/' .
		//$nid . '/quizzes';
	}
	
	$variables['content_type'] = $variables['node']->type;
	
	if (isset($variables['page']['#contextual_links']['views_ui'])) {
		if ($variables['page']['#contextual_links']['views_ui'][1][0] == 'opigno_quizzes') {
			$variables['content_type'] = 'quiz';
		}
	}
	
	$variables['main_navigation'] = _daisyflo_get_main_navigation();
}

function daisyflo_preprocess_block (&$variables) {

}

function daisyflo_preprocess_node (&$variables) {

	unset($variables['content']['fields']); //remove the side info block of Courses
}

function daisyflo_preprocess_views_view (&$variables) {
}

function daisyflo_theme() {
	return array(
			'opigno_tool' => array(
					'variables' => array('tool' => NULL, 'course' => NULL),
					'template' => 'templates/base-theme-overrides/opigno--tool',
			),
			'opigno_tools' => array(
					'variables' => array('tools' => NULL, 'course' => NULL),
					'template' => 'templates/base-theme-overrides/opigno--tools',
			),
			
	'commerce_checkout_form_checkout' => array(
			'render element' => 'form',
	      	'template' 		 => 'commerce-checkout-form-checkout',
		    'path' 			 => drupal_get_path('theme', 'daisyflo') . '/templates/pages/commerce',
	),
		
				'commerce_checkout_form_complete' => array(
							'render element' => 'form',
					      	'template' 		 => 'commerce_checkout_form_complete',
						    'path' 			 => drupal_get_path('theme', 'daisyflo') . '/templates/pages/commerce',
	),
	
		
						'user_profile_form' => array(
						      'arguments' => array('form' => NULL),
						      'render element' => 'form',
						      'template' => 'user-profile-edit',
						      'path' 			 => drupal_get_path('theme', 'daisyflo') . '/templates/pages/user-profile',
	),
		
				'user_login' => array(
						      'arguments' => array('form' => NULL),
						      'render element' => 'form',
						      'template' => 'user-login',
						      'path' 			 => drupal_get_path('theme', 'daisyflo') . '/templates/pages/user',
	),
		
		
				'user_register_form' => array(
						      'arguments' => array('form' => NULL),
						      'render element' => 'form',
						      'template' => 'user_register_form',
						      'path' 			 => drupal_get_path('theme', 'daisyflo') . '/templates/pages/user',
	),
		
		
		
				'user_pass' => array(
						      'arguments' => array('form' => NULL),
						      'render element' => 'form',
						      'template' => 'user-pass',
						      'path' 			 => drupal_get_path('theme', 'daisyflo') . '/templates/pages/user',
	),
	
			
			
	);
}

function daisyflo_theme_registry_alter(&$registry) {
	$path = drupal_get_path('theme', 'daisyflo');
	$registry['opigno_tool']['template'] = "$path/templates/base-theme-overrides/opigno--tool";
	$registry['opigno_tools']['template'] = "$path/templates/base-theme-overrides/opigno--tools";
	$registry['opigno_tool']['theme path'] = $registry['opigno_tools']['theme path'] = $path;
}

function _daisyflo_get_main_navigation() {
	$html = '';
	$items = _platon_get_main_navigation_items();
	$items_per_col = 2;

	foreach ($items as $index => $item) {
		$row_html .= theme('platon__main_navigation__item', array('item' => $item));
	}
	if (!empty($row_html)) {
		$html .= theme('platon__main_navigation__row', array('items' => $row_html));
	}

	return $html;
}


function daisyflo_form_commerce_checkout_form_checkout_alter(&$form, &$form_state, $form_id) {
	$form['buttons']['continue']['#value'] = "PLACE ORDER";
}

function daisyflo_element_info_alter(&$elements) {
	foreach ($elements as &$element) {
		// Process all elements.
		$element['#process'][] = '_bootstrap_process_element';

		// Process input elements.
		if (!empty($element['#input'])) {
			$element['#process'][] = '_bootstrap_process_input';
		}
	}
}

function daisyflo_breadcrumb($variables) {
	
	if (empty($breadcrumb)) {
		return NULL;
	}

	// These settings may be missing, if theme('breadcrumb') is called from
	// somewhere outside of Crumbs, or if another module is messing with the theme
	// registry.
	$variables += array(
			'crumbs_trailing_separator' => FALSE,
			'crumbs_separator' => ' &raquo; ',
			'crumbs_separator_span' => FALSE,
	);

	$separator = $variables['crumbs_separator'];
	if ($variables['crumbs_separator_span']) {
		$separator = '<span class="crumbs-separator">' . $separator . '</span>';
	}

	$output = implode($separator, $breadcrumb);
	if ($variables['crumbs_trailing_separator']) {
		$output .= $separator;
	}

	$output = '<div class="breadcrumb">' . $output . '</div>';

	// Provide a navigational heading to give context for breadcrumb links to
	// screen-reader users. Make the heading invisible with .element-invisible.
	return '<h2 class="element-invisible">' . t('You are here') . '</h2>' . $output;
}


function _bootstrap_process_element(&$element, &$form_state) {
	if (!empty($element['#attributes']['class']) && is_array($element['#attributes']['class'])) {
		if (in_array('container-inline', $element['#attributes']['class'])) {
			$element['#attributes']['class'][] = 'form-inline';
		}
		if (in_array('form-wrapper', $element['#attributes']['class'])) {
			$element['#attributes']['class'][] = 'form-group';
		}
	}
	return $element;
}

/**
 * Process input elements.
 */

function _bootstrap_process_input(&$element, &$form_state) {
	// Only add the "form-control" class for specific element input types.
	$types = array(
	// Core.
    'password',
    'password_confirm',
    'select',
    'textarea',
    'textfield',
	// Elements module.
    'emailfield',
    'numberfield',
    'rangefield',
    'searchfield',
    'telfield',
    'urlfield',
	);
	if (!empty($element['#type']) && (in_array($element['#type'], $types) || ($element['#type'] === 'file' && empty($element['#managed_file'])))) {
		$element['#attributes']['class'][] = 'form-control';
	}
	return $element;
}



