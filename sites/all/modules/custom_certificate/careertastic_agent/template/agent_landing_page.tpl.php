<?php //variables ?>
<?php $account = $user?>
<?php $commissions = array()?>
<?php $payments_history = array()?>

<?php $total_courses_paid = 0?>
<?php $total_amount_paid = 0?>

<?php $total_courses_unpaid = 0?>
<?php $total_amount_unpaid = 0?>

<?php $total_courses_sold = 0?>

<?php 

	while($transaction = $agent->fetchAssoc()) {
		$commissions[$transaction["course_title"]] = array(
			"nid" => $transaction["nid"],
			"course_price" => $transaction["course_price"],
			"commission"   => isset($commissions[$transaction["course_title"]]["commission"]) ? $commissions[$transaction["course_title"]]["commission"] +  $transaction["commission"] : $transaction["commission"],
			"quantity"   => isset($commissions[$transaction["course_title"]]["quantity"]) ? $commissions[$transaction["course_title"]]["quantity"] +  $transaction["quantity"] : $transaction["quantity"],
		);
		
		//get the unpaid courses
		if($transaction["is_paid"] == 0) {
			$total_amount_unpaid += $transaction["commission"];
			$total_courses_unpaid += $transaction["quantity"];
		
		//get the paid courses
		} else {
			$total_amount_paid += $transaction["commission"];
			$total_courses_paid++;
		}
		
		//calculate the total courses sold
		$total_courses_sold += $transaction["quantity"];
	}
	
	while($payment = $payments->fetchAssoc())  {
		$payments_history[] = $payment;
	}
	
	//set the raw amount for other computations and validations
	$raw_total_amount_unpaid = $total_amount_unpaid;
	
	//format the amounts
	$total_amount_unpaid = commerce_currency_format($total_amount_unpaid, "USD");
	$total_amount_paid   = commerce_currency_format($total_amount_paid, "USD");
	
?>


<?php //ADMIN VARIABLES?>
<?php global $user?>
<?php  $paypal_form = drupal_get_form('pay_agent_form')?>
<?php  $bank_form   = drupal_get_form('pay_agent_from_bank_form')?>
			
<div class="container-fluid agent-container">
	<div class="col-md-1 side-nav-container">
		<?php echo $side_nav?>
	</div>
	
<div class="col-md-10">
<?php if(isset($account->field_paypal_email['und'][0]['value']) || isset($account->field_bank_account_number['und'][0]['value']) ||  $user->uid == 1 ):?>
	<div class="main-content">
		<div class="row">
			<div class="col-md-6">
				<div class="col-xs-1 visible-xs"></div>
				<div id="profile-info-container">
					<?php if(isset($account->field_agent_photo['und'][0]['filename'])):?>
						<?php echo '<img id="agent-photo" src="'.image_style_url('thumbnail', $account->field_agent_photo['und'][0]['filename']).'" />'?>
						<?else:?>
						<img src="/sites/default/files/default_images/blank.jpg" id="agent-photo" />
					<?php endif?>
					<span id="agent-name"><?php echo $account->field_first_name['und'][0]['value']?></span>
				</div>
			</div>
			
			<?php //ADMIN PAYMENT------------------------------------------------------------?>
			<?php if($user->uid == 1):?>
				<div class="col-md-6">
					<?if($raw_total_amount_unpaid > 0 ): ?>
						<?php //if the payment email is unset dont show the form?>
						<?php if(isset($account->field_paypal_email['und'][0]['value'])):?>
							<?php echo drupal_render($paypal_form);?>
						<?php else:?>
							<span>Agent does not have paypal account</span>
						<?php endif?>
							
						<?php //if the bank account number is unset dont show the form?>
						<?php if(isset($account->field_bank_account_number['und'][0]['value'])):?>
							
							<button id="pay-bank" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#bank_form_modal">
							Pay <?php echo $total_amount_unpaid?> this agent (BANK)
							</button>
							
							<div id="bank_form_modal" class="modal fade" role="dialog">
							  <div class="modal-dialog">
							    <div class="modal-content">
							      <div class="modal-header">
							        <h4 class="modal-title">Pay Agent</h4>
							      </div>
							      <div class="modal-body">
							        	<p>Bank account number: <?php echo $account->field_bank_account_number['und'][0]['value']?></p>
							        	<p>Bank account name: <?php echo $account->field_bank_account_name['und'][0]['value']?></p>
							        	<p>Other Details: <?php echo $account->field_other_bank_details['und'][0]['value']?></p>
									<?php echo drupal_render($bank_form);?>
							      </div>
							      <div class="modal-footer">
							        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							      </div>
							    </div>
							  </div>
							</div>
						
						<?php else:?>
							<span>Agent does not have bank account number provided</span>
						<?php endif?>
												
					<?php else:?>
						<span>You have nothing to pay on this agent</span>
					<?php endif?>
				</div>
			<?php endif?>
		</div>
	
	<div class="row">
		<div class="dashboard-report">
			<div class="col-md-3">
				<div class="panel panel-primary">
					<div class="panel-heading text-center">THIS MONTH</div>
					<div class="panel-body text-center">
						<h3><?php echo $total_courses_unpaid?></h3>
						<p>Courses Sold</p>
					</div>
					<hr/>
					
						<?php 
							$due_date = variable_get('agent_payment_duedate');
							switch($due_date)	{
								case 1 :
										 $expected_date = strtotime(date("F 01, Y 23:59"));
										 if(time() > $expected_date)	
											 $expected_date = date("F 01, Y", strtotime("+1 month", $expected_date));
										 else
											 $expected_date = date("F 01, Y", $expected_date);
										 break;
										 
								case 2 : $expected_date = strtotime(date("F 15, Y 23:59"));
										 
										 if(time() > $expected_date)	
											 $expected_date = date("F 15, Y", strtotime("+1 month", $expected_date));
										 else
											 $expected_date = date("F 15, Y", $expected_date);
										 break;
								case 3 : $expected_date = date("F t, Y");break;
							}
						?>
				
					<div class="panel-body text-center">
						<h3 class="orange"><?php echo $total_amount_unpaid?></h3>
						<p>Expected Commisssion</p>
						<p class="date">Payment date: <?php echo $expected_date?></p>
					</div>
				</div>
			</div>
		
		
			<div class="admin-box col-md-6">
				<div class="panel panel-primary">
					<div class="panel-heading text-center">LATEST PAYMENT</div>
					<div class="panel-body">
						<table class="table table-condensed table-hover">	
						<?php foreach($payments_history as $payment) :?>
							<tr>
								<td><span class="blue text-underlined"><u><?php echo  date("F-m-y h:i", $payment["date_paid"])?></u></span></td>
								<td><span class="green">$<?php echo $payment["amount"]?></span></td>
							</tr>		
						<?php endforeach?>
						</table>
						<div class="text-center view-payment">
							<a class="blue" href="/agents/<?php echo $account->uid?>/invoices">View complete list of payments</a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="admin-box col-md-3">
				<div class="panel panel-primary">
					<div class="panel-heading text-center">ACCOUNT MANAGER</div>
					<div class="panel-body text-center">
						<h3>
							<?php // echo $total_courses_sold?>
							<?php echo $account->field_first_name['und'][0]['value']?> <?php echo $account->field_last_name['und'][0]['value']?>
						</h3>
						<p><?php echo $account->mail?></p>
					</div>
					<hr/>
					<div class="panel-body text-center">
						<h3 class="orange"><?php echo $account->field_coupon_id['und'][0]['value']?></h3>
						<p>Agent ID</p>
					</div>
				</div>
			</div>
	
			<div class="col-md-12">
				<div class="panel panel-primary summary">
					<div class="panel-body">
						<div class="col-md-4 left-side text-center">
							<div id="">
								<span id="sold-container" class="glyphicon glyphicon-book"></span>
								<h2>Courses Sold Data</h2>
							</div>
						</div>
						<div class="col-md-1 triangle hidden-xs hidden-sm">
						</div>
						<div class="col-md-7 text-center">
							<div class="col-md-4">
								<div class="circle">
									<span><?php echo $course_sold_report["this_day"] != null ? $course_sold_report["this_day"] : "0"?></span>
								</div>
								<p>Today</p>
							</div>
							<div class="col-md-4">
								<div class="circle">
									<span><?php echo $course_sold_report["this_week"] != null ? $course_sold_report["this_week"] : "0"?></span>
								</div>
								<p>This week</p>
							</div>
							<div class="col-md-4">
								<div class="circle">
									<span><?php echo $course_sold_report["this_month"] != null ? $course_sold_report["this_month"] : "0"?></span>
								</div>
								<p>This month</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
	<?else:?>

	<h2>Please complete <a href="/user/<?php echo $user->uid?>/edit"> YOUR PROFILE </a>before viewing your commissions.</h2>

<?php endif?>
</div>
</div>
