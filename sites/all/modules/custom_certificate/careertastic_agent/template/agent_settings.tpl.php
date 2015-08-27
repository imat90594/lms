<?php 

$account = user_load($user->uid);
module_load_include('inc', 'user', 'user.pages');

$form_state = array();
$form_state['build_info']['args'] = array($account);
form_load_include($form_state, 'inc', 'user', 'user.pages');

$state =  $form_state;

?>


<div class="container-fluid agent-container">
	<div class="col-md-1 side-nav-container">
		<?php echo $side_nav?>
	</div>
	
	<div class="main-content">
		<div class="col-md-9">
			<?php 
				print @render(drupal_build_form('user_profile_form', $state));
			?>
		</div>
	</div>
	
	
</div>
