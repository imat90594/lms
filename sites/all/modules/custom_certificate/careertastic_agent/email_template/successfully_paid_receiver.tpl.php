	<div class="section-2">
			<p>
				Hi <?php echo $user->field_first_name['und'][0]['value']?>,<br/><br/>
				
				You have been successfully paid of <b><?php echo $response["transaction[0].amount"]?></b> by Careertastic Admin on <?php echo date("F-d-Y h:i") . " " . date_default_timezone_get();?>
		    	through your paypal account <b><?php echo $user->field_paypal_email['und'][0]['value']?></b>.
		    </p>
		</div>
