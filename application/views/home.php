<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Home</title>
	<link rel="stylesheet" href="<?php echo base_url('public/assets/vendor/bootstrap/css/bootstrap.min.css') ?>">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<a class="navbar-brand" href="#">Web Store</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
				   aria-haspopup="true" aria-expanded="false">
					Items
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="<?php echo site_url('items/new')?>">New Item</a>
					<a class="dropdown-item" href="<?php echo site_url('items/all')?>">All Items</a>
				</div>
			</li>
		</ul>
		<span class="navbar-text">Welcome <?php echo $user->email ?> </span>
		<a class="btn btn-link" href="<?php echo site_url('user/logout') ?>">Logout</a>
	</div>
</nav>


<script src="<?php echo base_url('public/assets/vendor/jquery/jquery-1.11.3.js') ?>"></script>
<script src="<?php echo base_url('public/assets/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
</body>
</html>
