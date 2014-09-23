<div class="row">
	<p><?php echo isset($message) ? $message : "" ?></p>
	<p><?php echo validation_errors();?></p>
	<div class="col-md-5">
		<form action="<?= base_url('users/register')?>" method="post" class="form-horizontal" role="form">
			<div class="form-group">
			    <label for="regEmail" class="control-label">Email</label>
			    <input type="email" class="form-control" id="regEmail" name="email">
		  	</div>
		  	<div class="form-group">
			    <label for="first_name" class="control-label">First Name</label>
			    <input type="text" class="form-control" id="first_name" name="first_name">
		  	</div>
		  	<div class="form-group">
			    <label for="last_name" class="control-label">Last Name</label>
			    <input type="text" class="form-control" id="last_name" name="last_name">
		  	</div>
		  	<div class="form-group">
			    <label for="regPassword" class="control-label">Password</label>
			    <input type="password" class="form-control" id="regPassword" name="password">
		  	</div>
		  	<div class="form-group">
			    <label for="confpass" class="control-label">Confirm Password</label>
			    <input type="password" class="form-control" id="confpass" name="confpass">
		  	</div>
		  	<input type="submit" value="Register">
		</form>
	</div>
	<div class="col-md-5 col-md-offset-1">
		<form action="<?= base_url('users/login')?>" method="post" class="form-horizontal" role="form">
			<div class="form-group">
			    <label for="logEmail" class="control-label">Email</label>
			    <input type="email" class="form-control" id="logEmail" name="email">
		  	</div>
		  	<div class="form-group">
			    <label for="logPassword" class="control-label">Password</label>
			    <input type="password" class="form-control" id="logPassword" name="password">
		  	</div>
		  	<input type="submit" value="Log In">
		</form>
	</div>
</div>