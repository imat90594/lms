<?php //echo kprint_r($form, TRUE); // $vars - is a variable which you want to print. ?>

<?php $form['cart_contents']['#title'] = ""; ?>
<?php $form['customer_profile_billing']['#title'] = ""; ?>
<?php $form['commerce_payment']['#title'] = ""; ?>
<?php $form["commerce_coupon"]["coupon_code"]['#description'] ="" ?>
<?php $form["commerce_coupon"]["coupon_code"]['#attributes']['placeholder'] = t('Enter Code'); ?>
<?php $form["commerce_coupon"]["coupon_code"]['#title_display'] = 'invisible'; ?>
<?php $domain = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'] : "http://".$_SERVER['SERVER_NAME']; ?>

<div class="checkout">
	<h1>Checkout</h1>
	<?php if(!$logged_in) : ?>
	<div class="visible-xs visible-sm no-padding-left">
		<div class="login-checkout">
			<div class="row">
				<div class="col-md-12">
					<h2>Already have an account? Login here.</h2>
					<p>Please login to your DaisyFlo account to make this purchase
						much faster.</p>
				</div>
				<div class="col-md-12">
					<div class="login-item row">
						<div class="col-md-3 col-sm-3"><span>Email</span></div>
						<div class="col-md-9 col-sm-9"><input type="text" class="form-control" name="email-login-2" /></div>
					</div>
					<div class="login-item row">
						<div class="col-md-3 col-sm-3">Password</div>
						<div class="col-md-9 col-sm-9"><input type="password" class="form-control" name="password-login-2" /></div>
					</div>
					<div class="login-item row">
						<div class="col-md-3 col-sm-3"></div>
						<div class="col-md-9 col-sm-9">
							<button class="login-btn btn btn-secondary">LOGIN</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endif ?>
	
	<div class="row">
		<div class="col-md-12 cart-summary">
		<?php print render($form['cart_contents']); ?>
		</div>
		<div class="col-md-12">
			<div class="coupon-container">
				<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<div class="col-md-12">
							<p class="text-secondary">
								<span class="glyphicon glyphicon-plus"></span>Do you have any
								redeem codes? Enter them here.
							</p>
							<div id="commerce-checkout-coupon-ajax-wrapper">
							<?php echo render($form["commerce_coupon"]["redeemed_coupons"])?>
							</div>
						</div>
						<div class="col-md-6">
						<?php echo render($form["commerce_coupon"]["coupon_code"])?>
						</div>
						<div class="col-md-6">
							<div class="coupon-btn-container">
							<?php echo render($form["commerce_coupon"]["coupon_add"])?>
							</div>
						</div>
					</div>
					<div class="col-md-3"></div>
				</div>
			</div>
		</div>

		<div class="col-md-6 no-padding-right">
			<div class="checkout-billing-payment-container">
				<div class="row">
					<div class="col-md-12">
						<h2>Billing Information</h2>
						<p>By filling out this form, DaisyFlo will automatically create an
							account for you.</p>
						<!-- Billing Block -->
						<?php print render($form['customer_profile_billing']); ?>
						<!-- Email Block -->
						<?php if(isset($form['account'])):?>
							<?php print render($form['account']); ?>
						<?php endif?>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-6 no-padding-left no-margin-bottom">
			<div class="checkout-billing-payment-container no-margin-bottom">
				<div class="row">
					<div class="col-md-12">
						<h2>Payment Method</h2>
						 <?php $form["commerce_payment"]["payment_method"]["paypal_wps|commerce_payment_paypal_wps"]["#title"] = 
						'Paypal <img class="commerce-paypal-icon" src="'.$domain.'/sites/all/modules/commerce/modules/commerce_paypal/images/paypal.gif" alt="PayPal" title="PayPal" />' ?>
						 <?php $form["commerce_payment"]["payment_method"]["commerce_stripe|commerce_payment_commerce_stripe"]["#title"] = 
						'Credit Card <img class="commerce-paypal-icon" src="'.$domain.'/sites/all/modules/commerce/modules/commerce_paypal/images/visa.gif" alt="Visa" title="Visa" /> 
						  <img class="commerce-paypal-icon" src="'.$domain.'/sites/all/modules/commerce/modules/commerce_paypal/images/mastercard.gif" alt="Mastercard" title="Mastercard" />
						  <img class="commerce-paypal-icon" src="'.$domain.'/sites/all/modules/commerce/modules/commerce_paypal/images/amex.gif" alt="American Express" title="American Express" />
						  <img class="commerce-paypal-icon" src="'.$domain.'/sites/all/modules/commerce/modules/commerce_paypal/images/discover.gif" alt="Discover" title="Discover" />
						  <img class="commerce-paypal-icon" src="'.$domain.'/sites/all/modules/commerce/modules/commerce_paypal/images/echeck.gif" alt="eCheck" title="eCheck" />' ?>
						<?php print render($form['commerce_payment']); ?>
					</div>
				</div>
			</div>
		</div>
		<?php if(!$logged_in) : ?>
		<div class="col-md-6 hidden-xs hidden-sm no-padding-left no-margin-bottom-top">
			<div class="login-checkout">
				<div class="row">
					<div class="col-md-12">
						<h2>Already have an account? Login here.</h2>
						<p>Please login to your DaisyFlo account to make this purchase
							much faster.</p>
					</div>
					<div class="col-md-12">
						<div class="login-item row">
							<div class="col-md-3"><span>Email</span></div>
							<div class="col-md-9"><input type="text" class="form-control" name="email-login" /></div>
						</div>
						<div class="login-item row">
							<div class="col-md-3">Password</div>
							<div class="col-md-9"><input type="password" class="form-control" name="password-login" /></div>
						</div>
						<div class="login-item row">
							<div class="col-md-3"></div>
							<div class="col-md-9">
								<button class="login-btn btn btn-secondary">LOGIN</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php endif?>
	</div>


	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="text-center">
					<?php print render($form['buttons']["continue"]); ?>
				</div>
			</div>
		</div>
	</div>

	<div class="hidden">
		<?php  print drupal_render_children($form);?>
	</div>
</div>


