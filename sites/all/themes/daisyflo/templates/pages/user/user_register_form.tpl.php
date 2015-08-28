<?php 
$form["account"]["mail"]['#description'] = "";
// $form['name']['#prefix']      = "";
// $form['name']['#attributes']['placeholder'] = t('Email');
// $form['name']['#title_display'] = 'invisible';

$form['pass']['#description'] = "";
$form['field_first_name']['#required'] = true;
// $form['pass']['#prefix']      = "";
// $form['pass']['#suffix']      = "";
// $form['pass']['#attributes']['placeholder'] = t('Password');
// $form['pass']['#title_display'] = 'invisible';

$form['actions']['#suffix']   = "";
$form['actions']['submit']['#value']  = "SIGN UP NOW";

// echo "<br /> <br /><br /><br /><br /><br /><br />";
// echo kprint_r($form, true); die;
?>

<div class="login">
		<div class="row">
		<div class="col-md-12 text-center" id="heading">
			<h2><span class="text-tertiary">Sign Up</span> Your DaisyFlo Account</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
		</div>
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-body login-panel-body">
					<div class="text-center">
						<img id="dog-logo" src="/sites/all/themes/daisyflo/img/theme/registration-logo.jpg" />
					</div>
					
					<div class="login-field-container">
						<?php echo render($form["field_first_name"]);?>
					</div>
					<div class="login-field-container">
						<?php echo render($form["field_last_name"]);?>
					</div>
					<div class="login-field-container">
						 <?php 	echo render($form["account"]["mail"]);?>
					</div>
					<div class="row hidden">
						<?php 	echo render($form["account"]["pass"]);?>
					</div>
					<div class="login-field-container">
						<?php 	echo render($form["account"]["pass"]["pass1"]);?>
					</div>
					<div class="login-field-container">
						<?php 	echo render($form["account"]["pass"]["pass2"]);?>
					</div>
					<div class="login-field-container">
						<p class="text-muted agree-text">By creating an account you agree to receiving our daily deal emails and you agree to our Terms of use and Privacy &amp; Cookies policy. DaisyFlo is an independent company. By providing your details, you agree that selected Careertastic group may contact you with relevant offers and services.</p>
					</div>
					<div class="login-field-container">
						<p class="text-muted agree-text"><input type="checkbox"><strong> I agree on terms and conditions and cookies policy provided by this site.</strong></p>
					</div>
					<?php print drupal_render_children($form);?>
				</div>
				<div class="panel-heading">
					<div class="text-center">
						<p>
						<strong>
							Already have an account? <a href="/user/login" class="text-tertiary">Login here.</a>
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

