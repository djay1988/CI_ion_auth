<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
</head>
<body>

<div class="row">
	<aside class="col-sm-4 offset-4">
		<div class="card">
			<article class="card-body">
				<a href="<?php echo base_url('/login') ?>" class="float-right btn btn-outline-primary">Sign In</a>
				<h4 class="card-title mb-4 mt-1">Sign Up</h4>
				<?php
				if($this->session->has_userdata('errors')){
					?>
					<div class="alert alert-danger">
						<?php echo $this->session->flashdata('errors') ?>
					</div>
					<?php
				}
				if($this->session->has_userdata('success')){
					?>
					<div class="alert alert-success">
						<?php echo $this->session->flashdata('success') ?>
					</div>
					<?php
				}
				?>
				<form method="post" action="<?php echo base_url('register_user') ?>">
					<div class="form-group">
						<label>Your Name</label>
						<input name="name" class="form-control" placeholder="Email" type="text">
					</div>
					<div class="form-group">
						<label>Your email</label>
						<input name="email" class="form-control" placeholder="Email" type="email">
					</div>
					<div class="form-group">
						<label>Your password</label>
						<input class="form-control" placeholder="" type="password" name="password">
					</div>
					<div class="form-group">
						<label>Confirm password</label>
						<input class="form-control" placeholder="" type="password" name="c_password">
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block"> Register</button>
					</div> <!-- form-group// -->

				</form>
			</article>
		</div>
</div>


<script src="<?php echo base_url('public/assets/vendor/jquery/jquery-1.11.3.js') ?>"></script>
<script src="<?php echo base_url('public/assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>
</html>
