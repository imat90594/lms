		
		<div class="section-2">
			<p>
				Hi Admin,<br/><br/>
				
				You have been successfully paid <?php echo $user->field_first_name['und'][0]['value']?> <?php echo $user->field_last_name['und'][0]['value']?>
				of <b><?php echo $response["transaction[0].amount"]?></b> on <?php echo date("F-d-Y h:i") . " " . date_default_timezone_get();?>
		    
		    </p>
		</div>