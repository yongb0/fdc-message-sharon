
<?php echo $this->Html->css('change-password'); ?>

<div id="change-password-container">

	<big><?php echo isset($message) ? $message : ""; ?></big>
	<?php echo $this->Form->create('post');
	
	echo $this->Form->password('Password',array(
										'name' => 'current-password',
										'class' => 'form-control',
										'placeholder' => 'Current Password',
										'value' => (isset($currentPassword)) ? $currentPassword : ""
										)
									);

	echo $this->Form->password('New Password',array(
										'name' => 'password',
										'class' => 'form-control',
										'placeholder' => 'New Password',
										'value' => (isset($password)) ? $password : ""
										)
									);

	echo $this->Form->password('Confirm Password',array(
										'name' => 'cpassword',
										'class' => 'form-control',
										'placeholder' => 'Confirm Password',
										'value' => (isset($cpassword)) ? $cpassword : ""
										)
									);
	
	echo $this->Form->submit('Change Password',array(
										'class' => 'btn btn-primary',
										'id' => 'btn-submit'
										)
									); 
	
	echo $this->Form->end();
	
	?>
</div>