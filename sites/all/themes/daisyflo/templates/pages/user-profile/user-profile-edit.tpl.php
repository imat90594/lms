<?php 
$form["account"]['name']['#description'] = "";
$form["account"]['name']['#prefix'] = "";

$form["account"]['mail']['#description'] = "";
$form["account"]['mail']['#title']       = "Email";
$form["account"]['mail']['#prefix']      = "";

$form["account"]['pass']['#description'] = "";

$form['actions']["submit"]['#suffix']   = "";
$form['actions']["submit"]['#prefix']   = "";

?>

<div class="register"> 
<div class="container edit-profile-container">
				<div class="reg-form">
					<div class="row">
						<div class="col-md-2">
						</div>						
						<div class="col-md-8">
							<div class="">
								<form>
									<div class="heading">
										<div class="row">
											<h3>Your Account Details</h3>
										</div>
									</div>
									<div class="edit-form-input">
										<div class="row">
											<?php echo render($form["field_first_name"]);?>
										</div>
										<div class="row">
											<?php echo render($form["field_last_name"]);?>
										</div>
										<div class="row">
											 <?php 	echo render($form["account"]["mail"]);?>
										</div>
										<div class="row hidden">
											<?php 	echo render($form["account"]["pass"]);?>
										</div>
										<div class="row">
											<?php 	echo render($form["account"]["current_pass"]);?>
										</div>
										<div class="row">
											<?php 	echo render($form["account"]["pass"]["pass1"]);?>
										</div>
										<div class="row">
											<?php 	echo render($form["account"]["pass"]["pass2"]);?>
										</div>
										<div class="row hide">
											<?php 	echo render($form["contact"]);?>
										</div>
									</div>
									
									<div class="hidden">
									<?php print drupal_render_children($form);?>
									</div>
																
									<div class="row">
										<div class="col-md-offset-4 col-md-8">
											<?php  echo render($form["actions"]["submit"]);?>
										</div>
									</div>
								</form>
							</div>
						</div>
					<div class="col-md-2">
					</div>				
				</div>
			</div>
		</div>
	</div>
			
			