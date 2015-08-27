<?php $commissions = array()?>
<?php 

	while($transaction = $courses->fetchAssoc()) {
		$commissions[$transaction["course_title"]] = array(
			"nid" => $transaction["nid"],
			"course_price" => $transaction["course_price"],
			"commission"   => isset($commissions[$transaction["course_title"]]["commission"]) ? $commissions[$transaction["course_title"]]["commission"] +  $transaction["commission"] : $transaction["commission"],
			"quantity"   => isset($commissions[$transaction["course_title"]]["quantity"]) ? $commissions[$transaction["course_title"]]["quantity"] +  $transaction["quantity"] : $transaction["quantity"],
		);
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
				<div class="panel-heading text-center">SOLD COURSES</div>
				<div class="panel-body">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Course Title</th>
							<th class="hidden-xs">Bought</th>
							<th class="hidden-xs">Price</th>
							<th>Commission</th>
						</tr>
					</thead>
				
					<tbody>
					<?php foreach($commissions as $title => $commission):?>
					<tr>
						<td><a class="blue" href="/node/<?php echo $commission["nid"]?>"><?php echo $title?></a></td>
						<td class="blue hidden-xs"><?php echo $commission["quantity"]?></td>
						<td class="blue hidden-xs"><?php echo commerce_currency_format($commission["course_price"], "USD");?></td>
						<td class="green"><?php echo commerce_currency_format($commission["commission"], "USD");?></td>
					</tr>		
					<?php endforeach;?>
					</tbody>
				</table>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>


