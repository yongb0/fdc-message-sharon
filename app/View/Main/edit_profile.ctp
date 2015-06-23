

<?php echo $this->Html->css('profile'); ?>
<?php echo $this->Html->script('edit-profile'); ?>
<?php echo $this->Html->script('bootstrap-datepicker.min'); ?>


<div id="profile-container">
<?php echo $this->Form->create("post",array(
							'enctype' => 'multipart/form-data',
							'id' => 'form-profile'
						)
					);
?>
	<table>
		<tr>
			<td> <center> <h1> User Profile </center> </h1> </td>
		</tr>
		<tr>
			<td> 
				<center> 
					<span color="red" id="lbl-errors">
					</span>
				</center>
			</td>
		</tr>
		<tr>
			<td> 
				<?php echo $this->Form->file('',array(
									'name' => 'file',
									'id' => 'file',
									'style' => 'display:none'
									)
								); 
				?>
				<center>
					<img src="<?php echo ($profile->image) ? 
										$this->webroot."img/users images/$profile->image" :
										$this->webroot."img/ICONS/user2.png"; 
							?>"

					style="max-width:300px;" id="users-image">
				</center>
				<br>
				<center>  
					<?php echo $this->Form->button('Browse',array(
											'type' => 'button',
											'class' => 'btn btn-default',
											'id' => 'btn-browse'
											)
										);
					?>
				</center>
				<br>
		</tr>
		<tr>
			<td> 
			<table>
				<tr>
					<td> Name </td>
					<td> 
						<?php echo $this->Form->input(' ',array(
											'name' => 'name',
											'id' => 'name',
											'class' => 'form-control',
											'value' => $profile->name
											)
										); 
						?>
					</td>
				</tr>	
				<tr>
					<td> Birth Date </td> 
					<td>
						<div class="form-group">
				            <div class="input-group input-append date" id="birthdate">
				                <?php echo $this->Form->input(' ',array(
											'name' => 'birthdate',
											'id' => 'birthdate',
											'class' => 'form-control',
											'value' => $profile->birthdate,
											'readonly' => true
											)
										); 
								?>
				                <span class="input-group-addon add-on"  style="height: 22px;">
				                	<div class="date-icon" style="height:20px">
				                		<img src="<?php echo $this->webroot."img/ICONS/date.png"; ?>">
				                	</div>
				                </span>
				            </div>
					    </div>
					</td> 
				</tr>
				<tr>
					<td> Gender </td>
					<td>
						<?php echo $this->Form->input(' ', array(
												'name' => 'gender',
												'id' => 'gender',
												'legend' => false,
												'label' => false,
												'type' => 'radio',
												'separator' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',
											    'options' => array(
											    				'M' => 'Male',
											    				'F' => 'Female'
											    ),
											    'value' => $profile->gender
											));
						?>
					</td>
				</tr>
				<tr> 
					<td> Hubby </td>
					<td></textarea>
						<?php echo $this->Form->textarea(null,array(
															'name' => 'hubby',
															'id' => 'hubby',
															'class' => 'form-control',
															'placeholder' => 'Enter a hubby...',
															'value' => $profile->hubby
															)
														); 
						?>
					</td>
				<tr>
					<td> </td>
					<td> 
						<center>
						<?php echo $this->Form->button('Update',array(
																'type' => 'button',
																'id' => 'btn-update',
																'class' => 'btn btn-primary'
															)
														);
							  echo " ";
							  echo $this->Html->link('Cancel','profile',array(
																'class' => 'btn btn-primary'
															)
														);

						?>
						</center>
					</td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
<?php echo $this->Form->end(); ?>
</div>