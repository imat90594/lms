// <?php

// /**
//  * @file
//  * template.php
//  */

// function custom_theme($existing, $type, $theme, $path) {
// 	return array(
// 	    'commerce_checkout_form_checkout' => array(
// 			'render element' => 'form',
// 	      	'template' 		 => 'commerce-checkout-form-checkout',
// 		    'path' 			 => drupal_get_path('theme', 'custom') . '/templates/pages/commerce',
// 		),
		
// 		'user_profile_form' => array(
// 		      'arguments' => array('form' => NULL),
// 		      'render element' => 'form',
// 		      'template' => 'user-profile-edit',
// 		      'path' 			 => drupal_get_path('theme', 'custom') . '/templates/pages/user-profile',
// 		),

// 		'user_login' => array(
// 		      'arguments' => array('form' => NULL),
// 		      'render element' => 'form',
// 		      'template' => 'user-login',
// 		      'path' 			 => drupal_get_path('theme', 'custom') . '/templates/pages/user',
// 		),
	
// 		'user_pass' => array(
// 		      'arguments' => array('form' => NULL),
// 		      'render element' => 'form',
// 		      'template' => 'user-pass',
// 		      'path' 			 => drupal_get_path('theme', 'custom') . '/templates/pages/user',
// 		),
	
// 	);
// }

// function custom_form_commerce_checkout_form_checkout_alter(&$form, &$form_state, $form_id) {
// 	$form['buttons']['continue']['#value'] = "PLACE ORDER";
// }

// function custom_element_info_alter(&$elements) {
// 	foreach ($elements as &$element) {
// 		// Process all elements.
// 		$element['#process'][] = '_bootstrap_process_element';
		
// 		// Process input elements.
// 		if (!empty($element['#input'])) {
// 			$element['#process'][] = '_bootstrap_process_input';
// 		}
// 	}
// }


// function _bootstrap_process_element(&$element, &$form_state) {
// 	if (!empty($element['#attributes']['class']) && is_array($element['#attributes']['class'])) {
// 		if (in_array('container-inline', $element['#attributes']['class'])) {
// 			$element['#attributes']['class'][] = 'form-inline';
// 		}
// 		if (in_array('form-wrapper', $element['#attributes']['class'])) {
// 			$element['#attributes']['class'][] = 'form-group';
// 		}
// 	}
// 	return $element;
// }

// /**
//  * Process input elements.
//  */

// function _bootstrap_process_input(&$element, &$form_state) {
// 	// Only add the "form-control" class for specific element input types.
// 	$types = array(
// 	// Core.
//     'password',
//     'password_confirm',
//     'select',
//     'textarea',
//     'textfield',
// 	// Elements module.
//     'emailfield',
//     'numberfield',
//     'rangefield',
//     'searchfield',
//     'telfield',
//     'urlfield',
// 	);
// 	if (!empty($element['#type']) && (in_array($element['#type'], $types) || ($element['#type'] === 'file' && empty($element['#managed_file'])))) {
// 		$element['#attributes']['class'][] = 'form-control';
// 	}
// 	return $element;
// }

