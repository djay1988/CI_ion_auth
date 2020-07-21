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
				<a href="<?php echo site_url('register') ?>" class="float-right btn btn-outline-primary">Sign up</a>
				<h4 class="card-title mb-4 mt-1">Sign in</h4>
				<form method="post" action="<?php echo site_url('login') ?>">
					<div class="form-group">
						<label>Your email</label>
						<input name="email" class="form-control" placeholder="Email" type="email">
					</div> <!-- form-group// -->
					<div class="form-group">
						<label>Your password</label>
						<input class="form-control" placeholder="******" type="password" name="password">
					</div> <!-- form-group// -->
					<div class="form-group">
						<div class="checkbox">
							<label> <input type="checkbox" name="remember" value="1"> Save password </label>
						</div> <!-- checkbox .// -->
					</div> <!-- form-group// -->
					<div class="form-group">
						<button type="submit" class="btn btn-primary btn-block"> Login</button>
					</div> <!-- form-group// -->
					<?php
						if($this->session->has_userdata('errors')){
							?>
							<div class="alert alert-danger">
								<?php echo $this->session->flashdata('errors') ?>
							</div>
							<?php
						}
					?>
				</form>
			</article>
		</div>
</div>


<script src="<?php echo base_url('public/assets/vendor/jquery/jquery-1.11.3.js') ?>"></script>
<script src="<?php echo base_url('public/assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>
</html>
