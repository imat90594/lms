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
	<thead class="tertiary-bg-color">
		<tr class="tertiary-bg-color">
			<th class="col-md-6 tertiary-bg-color"><span id="details-text">SELECTED COURSE</span></th>
			<th class="col-md-3 text-center tertiary-bg-color">PRICE</th>
			<th class="col-md-3 text-center tertiary-bg-color">SUBTOTAL</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($rows as $row_count => $row): ?>
		<tr class="primary-bg-color">	
			<td data-title="Details" class="primary-bg-color">
				<div class="product-info">
					<div class="description">
						<h2><?php print $row['line_item_title']?></h2>
					</div>
				</div>
			</td>
			<td data-title="Price" class="text-center primary-bg-color">
				<div class="price">
					<h2><?php print $row['commerce_unit_price']?></h2>
				</div>
			</td>
			<td data-title="Subtotal" class="text-center primary-bg-color">
				<div class="sub-total">
					<h2><?php print $row['commerce_total'];?></h2>
				</div>
			</td>
        </tr>
    <?php endforeach; ?>
	</tbody>
</table>
