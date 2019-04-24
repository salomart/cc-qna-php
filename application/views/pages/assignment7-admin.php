<h4 class="text-center" style="margin-top: 1.5rem;">Users</h4>
<br>
<?php if (isset($users) && count($users) > 0): ?>
	<table class="table" style="border-bottom: 1px solid #dee2e6;">
		<tbody>
			<tr>
				<th>Username</th>
				<th>Activated</th>
				<th>Item Limit</th>
				<th>Action</th>
			</tr>
			<?php foreach($users as $row): ?>
				<tr>
					<?php echo form_open('Assignment7/admin', '', array('username' => $row['username'])); ?>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo form_checkbox('activated', 'true', ($row['activated'] == 1)); ?></td>
					<td><?php echo form_input('itemLimit', $row['itemLimit'], 'class="form-control"'); ?></td>
					<td>
						<button type="submit" name="action" value="update" class="btn btn-primary">Update User</button>
					</td>
					<?php echo form_close(); ?>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php else: ?>
	<div class="text-center">No Users!</div>
<?php endif; ?>
