<?php //echo kprint_r($form, TRUE); // $vars - is a variable which you want to print. ?>

<?php $form['cart_contents']['#title'] = ""; ?>
<?php $form['customer_profile_billing']['#title'] = ""; ?>
<?php $form['commerce_payment']['#title'] = ""; ?>

<div class="container">
	<div class="row">

		<div class="col-md-12">
			<div class="panel panel-default billing-container" id="billing">
				<div class="panel-heading">
					<h4>Shopping Cart Contents</h4>
				</div>
				<div class="panel-body">
					<?php print render($form['cart_contents']); ?>
				</div>
			</div>
		</div>
		
		<div class="col-md-12">	
			<div class="panel panel-default billing-container" id="billing">
				<div class="panel-heading">
					<h4>Billing Information</h4>
				</div>
				<div class="panel-body">
					<div class="row billing-info">
						<div class="col-md-12">
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
		</div>	
		
		<div class="col-md-12">	
			<div class="panel panel-default payment-container">
				<div class="panel-heading">
					<h4>Payment Details</h4>
				</div>
				<div class="panel-body billing-info">
					<div class="row card-logo">
						<div class="col-md-12">
							<?php print render($form['commerce_payment']); ?>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>	
	
	<div class="col-md-12">
		<div class="row">
			<div class="text-center">
			<?php print render($form['buttons']["continue"]); ?>
			</div>
		</div>
	</div>

	<div class="hidden">
		<?php  print drupal_render_children($form);?>
	</div>
</div>

	
