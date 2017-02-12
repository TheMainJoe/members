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
				<a href="<?=base_url()?>account/reg" class="btn btn-success pull-right">Register</a>
			</div>
		</header>
			
		<section class="row">

	        <?php if($this->session->flashdata('success')): ?>
	          	<p class="text-success"><?=$this->session->flashdata('success')?></p>
	        <?php endif; ?>
	        <?php if($this->session->flashdata('error')):?>
	        	<p class="text-danger"><?=$this->session->flashdata('error')?></p>
	        <?php endif;?>

			<div class="col-xs-6 offset-xs-3">
				<form action="<?=site_url('account/login')?>" method="post">
					<div class="row">
				      	<div class="form-group has-feedback">
					        <input type="text" name="username" class="form-control" placeholder="username">				        
				      	</div>
				      	<div class="form-group has-feedback">
					        <input type="password" name="password" class="form-control" placeholder="Password">
				      	</div>
			      	</div>
			      	<div class="row">
				        <div class="col-xs-3 pull-right">
				          	<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				        </div>
			      	</div>
			    </form>
			</div>	
		</section>
	</div>
	<script src="<?=base_url()?>assets/js/jquery-3.1.1.min.js"></script>
	<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
</body>
</html>