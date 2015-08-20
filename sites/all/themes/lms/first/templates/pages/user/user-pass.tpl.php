<?php 

$form['name']['#description'] = "";
$form['name']['#prefix']      = "";
$form['name']['#attributes']['placeholder'] = t('Email');
$form['name']['#title_display'] = 'invisible';

$form['actions']['#suffix']   = "";

?>

<div class="container log-in">
	<div class="row">
		<div class="col-md-6">
			<h2>Request new password for your account</h2>
		</div>
	</div>
	<div class="log-in-form">
		<div class="row">
			<div class="col-md-6">
				<div class="line"></div>
				<div class="left-fields">
					<div class="row">
						<?php echo render($form['name']);?>
					</div>
					<div class="row">
						<?php echo render($form['actions']);?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
			
<?php print drupal_render_children($form);?>