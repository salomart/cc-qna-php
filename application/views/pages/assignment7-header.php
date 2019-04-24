<nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="border-radius: .25rem;">
	<a class="navbar-brand" href="<?php echo base_url() . 'Assignment7' ?>">Shopping Site</a>
	<ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" href="<?php echo base_url() . 'Assignment7' ?>">Home</a>
		</li>
		<?php if ($this->session->has_userdata('username')): ?>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url() . 'Assignment7/selling' ?>">Selling</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url() . 'Assignment7/purchases' ?>">Purchases</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url() . 'Assignment7/cart' ?>">Cart</a>
			</li>
		<?php endif; ?>
		<?php if ($this->session->has_userdata('admin')): ?>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url() . 'Assignment7/admin' ?>">Admin</a>
			</li>
		<?php endif; ?>
	</ul>
	<?php echo form_open('Assignment7'); ?>
		<ul class="navbar-nav">
			<?php if ($this->session->has_userdata('username')): ?>
				<li class="nav-item" style="margin-right: 0.5rem;">
					<span class="navbar-text">Welcome, <?php echo $this->session->userdata('username') ?></span>
				</li>
				<li class="nav-item">
					<button type="submit" name="action" value="logout" class="btn btn-outline-primary">Logout</button>
				</li>
			<?php else: ?>
				<li class="nav-item" style="margin-right: 0.5rem;">
					<?php echo form_input('username', '', 'class="form-control" placeholder="username"'); ?>
				</li>
				<li class="nav-item" style="margin-right: 0.5rem;">
					<?php echo form_password('password', '', 'class="form-control" placeholder="password"'); ?>
				</li>
				<li class="nav-item" style="margin-right: 0.5rem;">
					<button type="submit" name="action" value="login" class="btn btn-outline-primary">Login</button>
				</li>
				<li class="nav-item">
					<button type="submit" name="action" value="register" class="btn btn-outline-primary">Register</button>
				</li>
			<?php endif; ?>
		</ul>
	<?php echo form_close(); ?>
</nav>
<?php if (isset($status)): ?>
	<?php if ($status == 1): ?>
		<div class="alert alert-danger" style="margin-top: 0.5rem;">Registration Failed!</div>
	<?php endif; ?>
	<?php if ($status == 2): ?>
		<div class="alert alert-success" style="margin-top: 0.5rem;">Registration Successful! Wait for the Admin to activate your account!</div>
	<?php endif; ?>
	<?php if ($status == 3): ?>
		<div class="alert alert-danger" style="margin-top: 0.5rem;">Invalid Login Credentials!</div>
	<?php endif; ?>
	<?php if ($status == 4): ?>
		<div class="alert alert-danger" style="margin-top: 0.5rem;">Account isn't active yet!</div>
	<?php endif; ?>
	<?php if ($status == 5): ?>
		<div class="alert alert-success" style="margin-top: 0.5rem;">Login Successful!</div>
	<?php endif; ?>
	<?php if ($status == 6): ?>
		<div class="alert alert-success" style="margin-top: 0.5rem;">Admin Login Successful!</div>
	<?php endif; ?>
	<?php if ($status == 7): ?>
		<div class="alert alert-danger" style="margin-top: 0.5rem;">Checkout failed!</div>
	<?php endif; ?>
	<?php if ($status == 8): ?>
		<div class="alert alert-success" style="margin-top: 0.5rem;">Checkout Successful!</div>
	<?php endif; ?>
	<?php if ($status == 9): ?>
		<div class="alert alert-danger" style="margin-top: 0.5rem;">Failed to add item!</div>
	<?php endif; ?>
	<?php if ($status == 10): ?>
		<div class="alert alert-success" style="margin-top: 0.5rem;">Item added!</div>
	<?php endif; ?>
	<?php if ($status == 11): ?>
		<div class="alert alert-danger" style="margin-top: 0.5rem;">Failed to remove item!</div>
	<?php endif; ?>
	<?php if ($status == 12): ?>
		<div class="alert alert-success" style="margin-top: 0.5rem;">Item removed!</div>
	<?php endif; ?>
	<?php if ($status == 13): ?>
		<div class="alert alert-danger" style="margin-top: 0.5rem;">Failed to update user!</div>
	<?php endif; ?>
	<?php if ($status == 14): ?>
		<div class="alert alert-success" style="margin-top: 0.5rem;">Updated user!</div>
	<?php endif; ?>
	<?php if ($status == 15): ?>
		<div class="alert alert-danger" style="margin-top: 0.5rem;">Failed to upload file!</div>
	<?php endif; ?>
<?php endif; ?>
