<h4 class="text-center" style="margin-top: 1.5rem;">Items For Sale</h4>
<br>
<?php if (isset($items) && count($items) > 0): ?>
	<table class="table" style="border-bottom: 1px solid #dee2e6;">
		<tbody>
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Description</th>
				<th>Price</th>
				<th>Seller</th>
				<?php if ($this->session->has_userdata('username')): ?>
					<th>Action</th>
				<?php endif; ?>
			</tr>
			<?php foreach($items as $row): ?>
				<tr>
					<td>
						<img src="<?php echo base_url() . 'uploads/' . $row['filename'] ?>" style="max-height: 200px;"/>
					</td>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $row['description'] ?></td>
					<td><?php echo $row['price'] ?></td>
					<td><?php echo $row['seller'] ?></td>
					<?php if ($this->session->has_userdata('username')): ?>
						<td>
							<?php echo form_open('Assignment7/cart', '', array(
								'id' => $row['id'],
								'name' => $row['name'],
								'price' => $row['price'],
								'seller' => $row['seller'],
								'filename' => $row['filename']
							)); ?>
							<button type="submit" name="action" value="add" class="btn btn-primary">Add to cart</button>
							<?php echo form_close(); ?>
						</td>
					<?php endif; ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php else: ?>
	<div class="text-center">No Items!</div>
<?php endif; ?>
