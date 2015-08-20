<?php
/**
 * @file
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $caption: The caption for this table. May be empty.
 * - $header_classes: An array of header classes keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $classes: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * - $field_classes: An array of classes to apply to each field, indexed by
 *   field id, then row number. This matches the index in $rows.
 * @ingroup views_templates
 */
?>

<table class="table" id="cart-table">
	<thead>
		<tr>
			<th class="col-md-6"><span id="details-text">Details</span></th>
			<th class="col-md-2 text-center">Price</th>
			<th class="col-md-2 text-center">Subtotal</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($rows as $row_count => $row): ?>
		<tr>	
			<td data-title="Details">
				<div class="product-info">
					<div class="thumb hidden-xs">
						<?php print $row['field_listing_image']?>
					</div>
					<div class="description">
						<h3><?php print $row['line_item_title']?></h3>
					</div>
				</div>
			</td>
			<td data-title="Price" class="text-center">
				<div class="price">
					<p><?php print $row['commerce_unit_price']?></p>
				</div>
			</td>
			<td data-title="Subtotal" class="text-center">
				<div class="sub-total">
					<p><?php print $row['commerce_total'];?></p>
				</div>
			</td>
        </tr>
    <?php endforeach; ?>
	</tbody>
</table>
