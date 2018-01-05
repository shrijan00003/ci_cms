<h2><?php echo empty($user->id)?'Add User':'Edit User'.' '.$user->username; ?></h2>
<hr/>
<p>Please submit your credentials</p>
<?php echo validation_errors();//we need to load form validation libery ?>
<?php 
	if ($this->session->flashdata('errors')) {
		echo '<h3 style="color:red;">'.$this->session->flashdata('errors').'</h3>';
	}
 ?>
 <?//php  echo hash('sha512','tripathidlfkjsdlkj@#$#@$dfjlk$%$#%12321312');die();?>
<?php echo form_open(); ?>
<table class="table">
	<tr>
		<td>Name</td>
		<td><?php echo form_input('username',set_value('username',$user->username),'class="size_of_form_elements"'); ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo form_input('email',set_value('email',$user->email),'class="size_of_form_elements"'); ?></td>
	</tr>
	<tr>
		<td>Password</td>
		<td><?php echo form_password('password',set_value('password',$user->pass),'class="size_of_form_elements"'); ?></td>
	</tr>
	<tr>
		<td>Confirm Password</td>
		<td><?php echo form_password('password_confirm',set_value('password',$user->pass),'class="size_of_form_elements"'); ?></td>
	</tr>
	<tr>
		<td></td>
		<td><?php echo form_submit('submit','Create','class="btn  btn-primary"') ?></td>
	</tr>
</table>		
<?php echo form_close(); ?>