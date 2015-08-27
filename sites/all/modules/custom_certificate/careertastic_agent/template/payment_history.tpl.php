<?php 
ctools_include('modal');
ctools_modal_add_js();
$payments_history = array();

while($payment = $payments->fetchAssoc())  {
	$payments_history[] = $payment;
}

?>



<div class="container-fluid agent-container">
	<div class="col-md-1 side-nav-container">
		<?php echo $side_nav?>
	</div>
	
	<div class="main-content">
		<div class="col-md-1"></div>
		<div class="col-md-9">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">PAYMENT HISTORY</div>
				<div class="panel-body">
					<table class="table table-hover"> 
						<thead>
							<tr>
								<th>Method</th>
								<th>Amount</th>
								<th class="hidden-xs">Date</th>
								<th class="hidden-xs">Remarks</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($payments_history as $payment) :?>
							<tr>
								<td class="blue col-md-2"><?php echo strtoupper($payment["method"])?></td>		
								<td class="green col-md-1">$<?php echo $payment["amount"]?></td>		
								<td class="blue col-md-2 hidden-xs"><?php echo  date("F-m-y h:i", $payment["date_paid"])?></td>		
								<td class="blue col-md-5 hidden-xs"><?php echo  $payment["remarks"]?></td>		
								<td class="blue col-md-2">
								<?php  print l(t('View'), 'agents/'.$user->uid.'/load-payment/'.$payment['payment_id'],
								 array('html' => TRUE, 
									   'attributes' => 
										array('class' => array('use-ajax'), 
											  'id' 	=> "view-payment",
											  'data-toggle' =>"modal",
											  'data-target' => "#payment_info_modal"
										)));?>
							</tr>		
							<?php endforeach?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	
		<div id="payment_info_modal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header text-center">
		        <h4 class="modal-title">Payment Information</h4>
		      </div>
		      <div class="modal-body">
		      	<div id="payment-info-container">
		      	</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</div>


