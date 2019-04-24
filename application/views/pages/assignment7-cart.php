<h4 class="text-center" style="margin-top: 1.5rem;">Items In Cart</h4>
<br>
<?php if ($this->session->has_userdata('cart') && count($this->session->userdata('cart')) > 0): ?>
	<table class="table" style="border-bottom: 1px solid #dee2e6;">
		<tbody>
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Price</th>
				<th>Seller</th>
				<th>Action</th>
			</tr>
			<?php foreach($this->session->userdata('cart') as $key => $row): ?>
				<tr>
					<td>
						<img src="<?php echo base_url() . 'uploads/' . $row['filename'] ?>" style="max-height: 200px;"/>
					</td>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $row['price'] ?></td>
					<td><?php echo $row['seller'] ?></td>
					<td>
						<?php echo form_open('Assignment7/cart', '', array('key' => $key)); ?>
						<button type="submit" name="action" value="remove" class="btn btn-danger">Remove from cart</button>
						<?php echo form_close(); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<?php echo form_open('Assignment7/purchases', 'class="text-center"') ?>
	<button type="submit" name="action" value="checkout" class="btn btn-primary">Checkout</button>
	<?php echo form_close(); ?>
<?php else: ?>
	<div class="text-center">No Items!</div>
<?php endif; ?>
