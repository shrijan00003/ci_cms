
<div class="modal-header">
	<h3>Log in </h3>
	<p>Please log in using your credentials</p>
</div>
<div class="modal-body">
<?php echo validation_errors();//we need to load form validation libery ?>
<?php 
	if ($this->session->flashdata('errors')) {
		echo '<p style="color:red;">'.$this->session->flashdata('errors').'</p>';
	}
 ?>
 <?//php  echo hash('sha512','tripathidlfkjsdlkj@#$#@$dfjlk$%$#%12321312');die();?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Email</td>
		<td><?php echo form_input(array('name'=>'email','style'=>'width:100%;')); ?></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><?php echo form_password(array('name'=>'password','style'=>'width:100%;')); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit','Log In','class="btn  btn-primary"') ?></td>
	</tr>
</table>		
<?php echo form_close(); ?>
</div>