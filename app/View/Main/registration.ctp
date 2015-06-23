
<?php echo $this->Html->css('registration'); ?>

<?php echo $this->Html->script('registration'); ?>

<div id="registration-container">
<?php echo $this->Form->create('post',array('id' => 'reg-frm')); ?>
<table>
	<tr>
		<td colspan=3>
			<span color="red"> 
				
			</span>
		</td>
	</tr>
	<tr>
		<td colspan=3> <h2> Registration Form </h2> </td>
	</tr>
	<tr>
		<td> Name </td>
		<td> 
			<?php echo $this->Form->input(' ',array(
												'name' => 'name',
												'class' => 'form-control'
											)
										);
			?>
		</td>
	</tr>
	<tr>
		<td> Email </td>
		<td> 
			<?php echo $this->Form->input(' ',array(
												'name' => 'email',
												'class' => 'form-control')
											);
			?>
		</td>
	</tr>
	<tr>
		<td> Password </td>
		<td>
			<?php echo $this->Form->password(' ',array(
												'name' => 'password',
												'class' => 'form-control'
													)
												); 
			?>
		</td>
	</tr>
	<tr>
		<td> Confirm Password </td>
		<td> 
			<?php echo $this->Form->password(' ',array(
												'name' => 'cpassword',
												'class' => 'form-control'
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
												'type' => 'button',
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
