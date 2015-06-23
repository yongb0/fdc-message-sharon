



<?php echo $this->Html->css('profile'); ?>

<?php echo $this->Html->script('bootstrap-datepicker.min'); ?>

<div id="profile-container">
	<?php echo $this->Form->create('post'); ?>
	<table>
		<tr>
			<td> <center> <h1> User Profile </center> </h1> </td>
		</tr>
		<tr>
			<td> 
				<center>
					<img src="<?php echo (!empty($profile->image)) ? 
										$this->webroot."img/users images/$profile->image" :
										$this->webroot."img/ICONS/person.png"; 
								?>" style="max-width:300px;" id="users-image">
				</center>
			</td>
		</tr>
		<tr>
			<td> 
			<table>
				<tr>
					<td> </td>
					<td> <big style="color:red"> <?php echo (isset($error)) ? $error : ""; ?> </big> </td>
				</tr>
				<tr>
					<td> Email </td>
					<td> 
						<?php echo $this->Form->input(' ',array(
												'name' => 'email',
												'class' => 'form-control',
												'value' => $profile->email,
												'placeholder' => 'Enter email'
											));
						?>
					</td>
				</tr>	
				<tr>
					<td> Name </td>
					<td> <b> <?php echo $profile->name; ?> </b> </td>
				</tr>	
				<tr>
					<td> Birth Date </td> 
					<td> <b> <?php echo $profile->birthdate; ?> </b> </td> 
				</tr>
				<tr>
					<td> Gender </td>
					<td>
						<b>
							<?php
								if($profile->gender === "M") {
									echo "Male";
								}
								else
								if($profile->gender === "F") {
									echo "Female";
								}
								else {
									echo "No gender selected";
								}
							?>
						</b>
					</td>
				</tr>
				<tr> 
					<td> Hubby </td>
					<td> <b><?php echo $profile->hubby; ?> </b> </td>
				</tr>
				<tr>
					<td> </td>
					<td> 
						<?php echo $this->Form->button('Save',array(
														'class' => 'btn btn-primary'
													));

						?> 
					</td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
	<?php echo $this->Form->end(); ?>
</div>