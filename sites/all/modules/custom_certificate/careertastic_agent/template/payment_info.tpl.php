<?php 

$commissions = array();

while($transaction = $commission->fetchAssoc()) {
	$commissions[$transaction["course_title"]] = array(
			"nid" => $transaction["nid"],
			"course_price" => $transaction["course_price"],
			"commission"   => isset($commissions[$transaction["course_title"]]["commission"]) ? $commissions[$transaction["course_title"]]["commission"] +  $transaction["commission"] : $transaction["commission"],
			"quantity"   => isset($commissions[$transaction["course_title"]]["quantity"]) ? $commissions[$transaction["course_title"]]["quantity"] +  $transaction["quantity"] : $transaction["quantity"],
	);
}

?>


<div class="row">
	<div class="col-md-2"><h5>Date Paid</h5></div>
	<div class="col-md-10"><p class=""><?php echo date("F d, Y h:i", $payments["date_paid"])?></p></div>
</div>
	
<div class="row">
	<div class="col-md-2"><h5>Method</h5></div>
	<div class="col-md-10"><p class=""><?php echo strtoupper($payments["method"])?></p></div>
</div>
	
<div class="row">
	<div class="col-md-2"><h5>Remarks</h5></div>
	<div class="col-md-10"><p class=""><?php echo strtoupper($payments["remarks"])?></p></div>
</div>

<br /><br /><br />

<div class="row">
	<div class="panel panel-primary">
		<div class="panel-heading text-center">Sold Courses</div>	
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
				<tr>
					<th class="">Course Title</th>
					<th class="text-center hidden-xs">Bought</th>
					<th class="text-center hidden-xs">Price</th>
					<th class="text-center">Commission</th>
				</tr>
				</thead>
			
				<tbody>
				<?php foreach($commissions as $title => $commission):?>
				<tr>
					<td class=" blue"><a href="/node/<?php echo $commission["nid"]?>"><?php echo $title?></a></td>
					<td class="text-center  blue hidden-xs"><?php echo $commission["quantity"]?></td>
					<td class="text-center  blue hidden-xs"><?php echo commerce_currency_format($commission["course_price"], "USD");?></td>
					<td class="text-center  blue"><?php echo commerce_currency_format($commission["commission"], "USD");?></td>
				</tr>		
				<?php endforeach;?>
				</tbody>
			</table>
		</div>
	</div>
</div>


<h4 class=""><strong>Total : <span class="green">$<?php echo $payments["amount"]?></span></strong></h4>