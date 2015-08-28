<?php 
$form['name']['#description'] = "";
// $form['name']['#prefix']      = "";
// $form['name']['#attributes']['placeholder'] = t('Email');
// $form['name']['#title_display'] = 'invisible';

$form['pass']['#description'] = "";
// $form['pass']['#prefix']      = "";
// $form['pass']['#suffix']      = "";
// $form['pass']['#attributes']['placeholder'] = t('Password');
// $form['pass']['#title_display'] = 'invisible';

$form['actions']['#suffix']   = "";
$form['actions']['submit']['#value']  = "LOG IN";

// echo "<br /> <br /><br /><br /><br /><br /><br />";
// echo kprint_r($form, true);

?>

<div class="login">
	<div class="row">
		<div class="col-md-12 text-center" id="heading">
			<h2><span class="text-tertiary">Login to</span> Your DaisyFlo Account</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-body login-panel-body">
					<div class="text-center">
						<img id="dog-logo" src="/sites/all/themes/daisyflo/img/theme/login-dog.jpg" />
					</div>
					
					<div class="login-field-container">
						<?php echo render($form['name']);?>
					</div>
					<div class="login-field-container">
						<?php echo render($form['pass']);?>
					</div>
					<div class="login-option row">
						<div class="col-md-6"><input type="checkbox" /><span class=""><u> Keep me logged in</u></span></div>
						<div class="col-md-6 "><span class="pull-right"><a class="text-muted" href="/user/password">Forgot password?</a></span></div>
					</div>	
					<div class="row">
						<div class="col-sm-12">
							<?php echo render($form['actions']);?>
						</div>
					</div>
					<?php print drupal_render_children($form);?>
				</div>
				<div class="panel-heading">
					<div class="text-center">
						<p>
						<strong>
							Don't have an account yet? <a href="/user/register" class="text-tertiary">Register here.</a>
						</strong>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
		</div>
	</div>
</div>

