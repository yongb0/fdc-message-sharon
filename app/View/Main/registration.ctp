<style>
	.validation {
color: #D63301;
background-color: #FFCCBA;
background-image: url('');
padding-left: 70px;
}
</style>


<?php echo $this->Html->css('registration'); ?>

<?php //echo $this->Html->script('registration'); ?>

<div id="registration-container">
<?php

	

 echo $this->Form->create('post',array('id' => 'reg-frm','novalidate' => false)); ?>
<table>
	<tr>
		<td colspan=3>
			<span color="red"> 
				<?php 
							echo $errors;
					  
				?>
			</span>
		</td>
	</tr>
	<tr>
		<td colspan=3> <h2> Registration Form </h2> </td>
	</tr>
	<tr>
		<td> Name <font color='red'>*</font> </td>
		<td> 
			<?php echo $this->Form->input(' ',array(
												'name' => 'name',
												'class' => 'form-control',
												'required' => true,
												'pattern' => '.{5,}',
												'placeholder' => 'Name',
												'value' => (isset($data)) ? 
																$data['name']
																: "" 
											)
										);
			?>
		</td>
	</tr>
	<tr>
		<td> Email <font color='red'>*</font></td>
		<td> 
			<?php echo $this->Form->input(' ',array(
												'name' => 'email',
												'type' => 'email',
												'required' => true,
												'class' => 'form-control',
												'placeholder' => 'email',
												'value' => (isset($data)) ? 
																$data['email']
																: "" 
												)
											);
			?>
		</td>
	</tr>
	<tr>
		<td> Password <font color='red'>*</font></td>
		<td>
			<?php echo $this->Form->password(' ',array(
												'name' => 'password',
												'required' => true,
												'pattern' => '.{5,}',
												'class' => 'form-control',
												'placeholder' => 'Password',
												'value' => (isset($data)) ? 
																$data['password']
																: "" 
													)
												); 
			?>
		</td>
	</tr>
	<tr>
		<td> Confirm Password <font color='red'>*</font></td>
		<td> 
			<?php echo $this->Form->password(' ',array(
												'name' => 'cpassword',
												'required' => true,
												'pattern' => '.{5,}',
												'class' => 'form-control',
												'placeholder' => 'Confirm password',
												'value' => (isset($data)) ? 
																$data['cpassword']
																: "" 
												)
											);
			?>
		</td>
	</tr>
	<tr>
		<td> </td>
		<td>
			<center>
			<?php echo $this->Form->button('Sign up',array(
												'type' => 'submit',
												'required' => true,
												'id' => 'btn-register',
												'class'=> 'btn btn-primary'
												)
											); 
				  echo " ";
				  echo $this->Html->link('Cancel','../',array(
				  									'class' => 'btn btn-primary'
					  							)
					  						);
			?>
			</center>
		</td>
	</tr>
</table>
<?php echo $this->Form->end(); ?>
</div>
