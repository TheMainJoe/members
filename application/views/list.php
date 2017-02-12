<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Member Details</title>
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link href="<?=base_url()?>assets/css/bootstrap-editable.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<header class="header row">
			<div class="col-xs-6">
				<h1>Member management</h1>
			</div>
			<div class="col-xs-6">
				<a href="<?=base_url()?>account/logout" class="btn btn-danger pull-right">Logout</a>
			</div>
		</header>
			
		<section class="row">
			<table width="100%" class="table table-striped">
				<caption>
					List of all members with inline edit.
					<span class="pull-right"><a id="add" class="btn btn-info" data-toggle="modal" data-target="#newMember">Add member</a></span>
				</caption>
				<?php if($this->session->flashdata('error')): ?>
			      <p class="text-danger"><?=$this->session->flashdata('error')?></p>
			    <?php endif; ?>
				<thead>
					<tr>
						<th>First name</th> <th>Surname</th> <th>Mobile</th> <th>Email</th> <th>Language</th> <th>Date of Birth</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach( $items as $item ): ?>
					<tr>
						<td><a href="#" class="fname" data-name="fname" data-type="text" data-pk="<?=$item['id']?>" data-url="<?=base_url()?>admin/update" data-title="Enter name"><?=$item['fname']?></a></td> 

						<td><a href="#" class="surname" data-name="surname" data-type="text" data-pk="<?=$item['id']?>" data-url="<?=base_url()?>admin/update" data-title="Enter surname"><?=$item['surname']?></a></td>

						<td><a href="#" class="mobile" data-name="mobile" data-type="text" data-pk="<?=$item['id']?>" data-url="<?=base_url()?>admin/update" data-title="Enter mobile"><?=$item['mobile']?></a></td>

						<td><a href="#" class="email" data-name="email" data-type="email" data-pk="<?=$item['id']?>" data-url="<?=base_url()?>admin/update" data-title="Enter email"><?=$item['email']?></a></td>

						<td><a href="#" class="language" data-name="language" data-source="<?=base_url()?>admin/languages" data-type="select" data-pk="<?=$item['id']?>" data-url="<?=base_url()?>admin/update" data-title="Select language"><?=$item['language']?></a></td>

						<td><a href="#" class="dob" data-name="dob" data-type="text" data-pk="<?=$item['id']?>" data-url="<?=base_url()?>admin/update" data-title="Enter name"><?=$item['dob']?></a></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr>
						<th>First name</th> <th>Surname</th> <th>Mobile</th> <th>Email</th> <th>Language</th> <th>Date of Birth</th>
					</tr>
				</tfoot>
			</table>	
		</section>
	</div>

	<div class="modal fade" tabindex="-1" id="newMember" role="dialog">
	    <div class="modal-dialog" role="document">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	          <h4 class="modal-title">Add new member</h4>
	        </div>
	        <form action="<?=site_url('admin/create')?>" method="post" role="form">
	        <div class="modal-body">	          
	            <div class="box-body">
	              <div class="form-group col-xs-12">
	                <label>Name</label>
	                <input type="text" class="form-control" name="fname" placeholder="Enter name">
	              </div>
	              <div class="form-group col-xs-12">
	                <label>Surame</label>
	                <input type="text" class="form-control" name="surname" placeholder="Enter surname">
	              </div>
	              <div class="form-group col-xs-12">
	                <label>Mobile</label>
	                <input type="tel" class="form-control mobi" name="mobile" placeholder="Enter mobile">
	              </div>
	              <div class="form-group col-xs-12">
	                <label>Email</label>
	                <input type="email" class="form-control" name="email" placeholder="Enter email">
	              </div>
	              <div class="form-group col-xs-12">
	                <label>Language</label>
	                <select name="language" id="lang" class="form-control">
	                	<option value="">Select Language</option>
	                </select>	                
	              </div>
	              <div class="form-group col-xs-12">
	                <label>Date of Birth</label>
	                <input type="date" class="form-control" name="dob" placeholder="Enter post title">
	              </div>	              
	            </div>	          
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	          <button type="submit" id="new" class="btn btn-primary">Add Member</button>
	        </div>
	        </form>
	      </div>
	    </div>
	  </div>

	</div>
	<script src="<?=base_url()?>assets/js/jquery-3.1.1.min.js"></script>
	<script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/js/bootstrap-editable.min.js"></script>
	<script>
		$.fn.editable.defaults.mode = 'inline';
		$(document).ready(function() {
		    $('.fname').editable();
		    $('.surname').editable();
		    $('.mobile').editable();
		    $('.email').editable();
		    $('.language').editable();
		    $('.dob').editable({
		    	format: 'yyyy-mm-dd',    
		        viewformat: 'dd/mm/yyyy',    
		        datepicker: {
		                weekStart: 1
		           	}
		    });
		});

		$( '#add' ).click(function(){
			$.getJSON('<?=base_url()?>admin/languages',function(ret){
				$.each(ret,function(i,v){
					$('#lang').append( '<option value="'+v+'">'+v+'</option>' );
				});
			});
		});

		$(document).on("input", ".mobi", function() {
		    this.value = this.value.replace(/[^\d\.\-]/g,'');
		});
	</script>
</body>
</html>