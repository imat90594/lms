<br/>

<img src="<?php print theme_get_setting('logo');?>">

<br/>

<h3>Thanks for your order </h3>

<p>Here are the details for your order, placed on <?php echo date("Y-m-d h:i")?></p>

<br />
Items in your order

<table>
	<tr>
		<td>Deal</td>
		<td>Quantity</td>
		<td>Price</td>
		<td>Total</td>
	</tr>

	<?php foreach($order_obj["products"] as $product):?>
	<tr>
		<td><?php echo $product->title?></td>
		<td><?php echo $product->product_line_item->quantity?></td>
		<?php $price = commerce_currency_format($product->product_line_item->commerce_unit_price['und'][0]['amount'],
												$product->product_line_item->commerce_unit_price['und'][0]['currency_code'])?>
		<td><?php echo $price?></td>
		
		<?php $total = commerce_currency_format($product->product_line_item->commerce_total['und'][0]['amount'],
												$product->product_line_item->commerce_total['und'][0]['currency_code'])?>
		<td><?php echo $total?></td>
	</tr>
	<?php endforeach?>
	
</table>

<br />

<?php $total_order = commerce_currency_format($order_obj["order"]->commerce_order_total['und'][0]['amount'],
											  $order_obj["order"]->commerce_order_total['und'][0]['currency_code'])?>
<b>Order total	<?php echo $total_order?></b>
