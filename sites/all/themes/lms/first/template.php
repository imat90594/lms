<?php

function first_preprocess_html (&$variables) {
	
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
	
}

function first_preprocess_block (&$variables) {

}

function first_preprocess_node (&$variables) {

	unset($variables['content']['fields']); //remove the side info block of Courses
	//print "<pre>";
	//print_r($variables['content']['fields']);
	//print "</pre>";
}

