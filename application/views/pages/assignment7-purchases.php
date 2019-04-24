<h4 class="text-center" style="margin-top: 1.5rem;">Purchases</h4>
<br>
<?php if (isset($purchases) && count($purchases) > 0): ?>
	<table class="table" style="border-bottom: 1px solid #dee2e6;">
		<tbody>
			<tr>
				<th>Image</th>
				<th>Name</th>
				<th>Price</th>
				<th>Seller</th>
				<th>Order Number</th>
			</tr>
			<?php foreach($purchases as $row): ?>
				<tr>
					<td>
						<img src="<?php echo base_url() . 'uploads/' . $row['filename'] ?>" style="max-height: 200px;"/>
					</td>
					<td><?php echo $row['name'] ?></td>
					<td><?php echo $row['price'] ?></td>
					<td><?php echo $row['seller'] ?></td>
					<td><?php echo $row['orderId'] ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php else: ?>
	<div class="text-center">No Purchases!</div>
<?php endif; ?>
