<?php

function first_preprocess_html (&$variables) {
	
}

function first_form_element($vars) {
	echo kprint_r($vars, true);
}



function first_preprocess_page (&$variables) {
	
	if ($node = menu_get_object()) {
		// Get the nid
		$nid = $node->nid;
	}
	
	if (isset($variables['action_links'])) {
		
		//change the start url to node/%/quizzes to change the landing destination upon quiz start
		$variables['action_links'][0]['#link']['href'] = 'node/' .
		$nid . '/quizzes';
	}
	
	$variables['content_type'] = $variables['node']->type;
	
	if (isset($variables['page']['#contextual_links']['views_ui'])) {
		if ($variables['page']['#contextual_links']['views_ui'][1][0] == 'opigno_quizzes') {
			$variables['content_type'] = 'quiz';
		}
	}
	
	$variables['main_navigation'] = _first_get_main_navigation();

	/* print "<pre>";
	print_r($variables);
	print "</pre>";
	
	foreach ($variables['page']['content']['system_main']['nodes'] as $index => $value):
		print $index;
		print '<br/>';
	endforeach; 
	print "<pre>";
	print_r($variables['page']['content']['system_main']['nodes'][3]['body']);
	print "</pre>";*/
}

function first_preprocess_block (&$variables) {

}

function first_preprocess_node (&$variables) {

	unset($variables['content']['fields']); //remove the side info block of Courses
	//print "<pre>";
	//print_r($variables['content']['fields']);
	//print "</pre>";
}

function first_theme() {
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
					    'path' 			 => drupal_get_path('theme', 'first') . '/templates/pages/commerce',
			),
			
					'user_profile_form' => array(
					      'arguments' => array('form' => NULL),
					      'render element' => 'form',
					      'template' => 'user-profile-edit',
					      'path' 			 => drupal_get_path('theme', 'first') . '/templates/pages/user-profile',
			),
			
					'user_login' => array(
					      'arguments' => array('form' => NULL),
					      'render element' => 'form',
					      'template' => 'user-login',
					      'path' 			 => drupal_get_path('theme', 'first') . '/templates/pages/user',
			),
			
					'user_pass' => array(
					      'arguments' => array('form' => NULL),
					      'render element' => 'form',
					      'template' => 'user-pass',
					      'path' 			 => drupal_get_path('theme', 'first') . '/templates/pages/user',
			),
			
	);
}

function _first_get_main_navigation() {
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




function first_form_commerce_checkout_form_checkout_alter(&$form, &$form_state, $form_id) {
	$form['buttons']['continue']['#value'] = "PLACE ORDER";
}

function first_element_info_alter(&$elements) {
	foreach ($elements as &$element) {
		// Process all elements.
		$element['#process'][] = '_bootstrap_process_element';

		// Process input elements.
		if (!empty($element['#input'])) {
			$element['#process'][] = '_bootstrap_process_input';
		}
	}
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



