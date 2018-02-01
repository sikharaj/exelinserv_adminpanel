<div class="table-responsive">
<table id="item_table" class="items table table-condensed table-bordered no-margin">
<thead style="display: none">
<tr>
<th></th>
<th>Item</th>
<th>Description</th>
<th>Quantity</th>
<th>Price</th>
<th>Tax Rate</th>
<th>Subtotal</th>
<th>Tax</th>
<th>Total</th>
<th></th>
</tr>
</thead>
<tbody id="new_row" style="display: none;">
<tr>
<td rowspan="2" class="td-icon">
<i class="fa fa-arrows cursor-move"></i>
</td>
<td class="td-text">
<input type="hidden" name="invoice_id" value="8">
<input type="hidden" name="item_id" value="">
<input type="hidden" name="item_product_id" value="">
<input type="hidden" name="item_task_id" class="item-task-id" value="">
<div class="input-group">
<span class="input-group-addon">Item</span>
<input type="text" name="item_name" class="input-sm form-control" value="">
</div>
</td>
<td class="td-amount td-quantity">
<div class="input-group">
<span class="input-group-addon">Quantity</span>
<input type="text" name="item_quantity" class="input-sm form-control amount" value="">
</div>
</td>
<td class="td-amount">
<div class="input-group">
<span class="input-group-addon">Price</span>
<input type="text" name="item_price" class="input-sm form-control amount" value="">
</div>
</td>
<td class="td-amount">
<div class="input-group">
<span class="input-group-addon">Item Discount</span>
<input type="text" name="item_discount_amount" class="input-sm form-control amount" value="" data-toggle="tooltip" data-placement="bottom" title="₹ per Item">
</div>
</td>
<td>
<div class="input-group">
<span class="input-group-addon">Tax Rate</span>
 <select name="item_tax_rate_id" class="form-control input-sm">
<option value="0">None</option>
<option value="2">
9.00% - CGST </option>
<option value="3">
9.00% - SGST </option>
<option value="1">
28.00% - GST - #GSTNUM </option>
</select>
</div>
</td>
<td class="td-icon text-right td-vert-middle"></td>
</tr>
<tr>
<td class="td-textarea">
<div class="input-group">
<span class="input-group-addon">Description</span>
<textarea name="item_description" class="input-sm form-control"></textarea>
</div>
</td>
<td class="td-amount">
<div class="input-group">
<span class="input-group-addon">Product Unit</span>
<select name="item_product_unit_id" class="form-control input-sm">
<option value="0">None</option>
<option value="2">
L/Liter(s) </option>
<option value="1">
PCS/Piece(s) </option>
</select>
</div>
</td>
<td class="td-amount td-vert-middle">
<span>Subtotal</span><br />
<span name="subtotal" class="amount"></span>
</td>
<td class="td-amount td-vert-middle">
<span>Discount</span><br />
<span name="item_discount_total" class="amount"></span>
</td>
<td class="td-amount td-vert-middle">
<span>Tax</span><br />
<span name="item_tax_total" class="amount"></span>
</td>
<td class="td-amount td-vert-middle">
<span>Total</span><br />
<span name="item_total" class="amount"></span>
</td>
</tr>
</tbody>
