<h4 class="text-center" style="margin-top: 1.5rem;">Selling</h4>
<br>
<table class="table" style="border-bottom: 1px solid #dee2e6;">
	<tbody>
		<tr>
			<th>Image</th>
			<th>Name</th>
			<th>Description</th>
			<th>Price</th>
			<th>Action</th>
		</tr>
		<tr>
			<?php echo form_open_multipart('Assignment7/selling'); ?>
			<td>
				<input type="file" name="imageFile" />
			</td>
			<td>
				<?php echo form_input('name', '', 'class="form-control"'); ?>
			</td>
			<td>
				<?php echo form_input('description', '', 'class="form-control"'); ?>
			</td>
			<td>
				<?php echo form_input('price', '', 'class="form-control"'); ?>
			</td>
			<td>
				<?php
					$count = (isset($selling) && count($selling) > 0) ? count($selling) : 0;
					$itemLimit = (isset($itemLimit)) ? $itemLimit : 0;
					$disable = ($itemLimit == 0 || $count < $itemLimit) ? '' : 'disabled';
				?>
				<button type="submit" name="action" value="add" class="btn btn-success" <?php echo $disable ?>>Add Item</button>
			</td>
			<?php echo form_close(); ?>
		</tr>
		<?php if (isset($selling) && count($selling) > 0): ?>
			<?php foreach($selling as $row): ?>
				<tr>
					<?php echo form_open('Assignment7/selling', '', array('id' => $row['id'])); ?>
					<td>
						<img src="<?php echo base_url() . 'uploads/' . $row['filename'] ?>" style="max-height: 200px;"/>
					</td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['description']; ?></td>
					<td><?php echo $row['price']; ?></td>
					<td>
						<button type="submit" name="action" value="delete" class="btn btn-danger">Delete Item</button>
					</td>
					<?php echo form_close(); ?>
				</tr>
			<?php endforeach; ?>
		<?php endif; ?>
	</tbody>
</table>
