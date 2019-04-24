<h3>Task 7: Show Images and Comments</h3>
<br>
<?php if (isset($all_data) && count($all_data) > 0): ?>
	<?php foreach($all_data as $row): ?>
		<img src="<?php echo base_url() . 'quiz7_orig/' . $row['image'] ?>" style="max-height: 200px;"/>
		<span><?php echo $row['comment'] ?></span>
		<br>
	<?php endforeach; ?>
<?php endif; ?>
<hr>
<h3>Task 8: Show Images By Name and/or Year</h3>
<br>
<?php echo form_open('Quiz7/showImagesByNameYear'); ?>
<div class="form-group">
	<?php echo form_label('Name:', 'name'); ?>
	<?php echo form_input(array('name' => 'name', 'id' => 'name', 'class' => 'form-control')); ?>
</div>
<div class="form-group">
	<?php echo form_label('Year:', 'year'); ?>
	<?php echo form_input(array('name' => 'year', 'id' => 'year', 'class' => 'form-control')); ?>
</div>
<button type="submit" name="action" value="showImages" class="btn btn-primary">Show Images</button>
<?php echo form_close(); ?>
<br>
<?php if (isset($filtered_data) && count($filtered_data) > 0): ?>
	<?php foreach($filtered_data as $row): ?>
		<img src="<?php echo base_url() . 'quiz7_orig/' . $row['image'] ?>" style="max-height: 200px;"/>
		<span><?php echo $row['image'] ?>, </span>
		<span><?php echo $row['year'] ?>, </span>
		<span><?php echo $row['comment'] ?></span>
		<br>
	<?php endforeach; ?>
<?php endif; ?>
