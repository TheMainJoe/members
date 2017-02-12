<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Member Details</title>
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<header class="header row">
			<div class="col-xs-6">
				<h1>Member management</h1>
			</div>
			<div class="col-xs-6">
				<a href="#" class="btn btn-success pull-right">Login</a>
			</div>
		</header>
			
		<section class="row">
			<?php if($this->session->flashdata('error')): ?>
		      <p class="text-danger"><?=$this->session->flashdata('error')?></p>
		    <?php endif; ?>
			<div class="col-xs-6">
				<form action="<?=site_url('account/register')?>" method="post">

			      <div class="col-md-6">
			        <div class="form-group has-feedback">
			          <input type="text" name="username" class="form-control" required="true" placeholder="Username">
			        </div>
			      </div>

			      <div class="col-md-6">
			        <div class="form-group has-feedback">
			          <input type="text" class="form-control" name="display_name" required="required" placeholder="Name">
			        </div>
			      </div>
			      
			      <div class="col-md-6">
			        <div class="form-group has-feedback">
			          <input type="password" class="form-control" name="password" placeholder="password">
			        </div>
			      </div>

			      <div class="col-md-6">
			        <div class="form-group has-feedback">
			          <input type="password" class="form-control" name="pass2" placeholder="confirm password">
			        </div>
			      </div>

			      <div class="col-md-4">
			        <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
			      </div>
			       
			    </form>
			</div>	
		</section>
	</div>
	<script src="<?=base_url()?>assets/js/jquery-3.1.1.min.js"></script>
	<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
</body>
</html>