<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo '/messages/send/' ?>">Message Board</a>
              

            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  

                  <li>
                        <?php echo $this->Html->link('Hi '.strtoupper($sessname[0]['User']['name']).'!', array('controller' => 'main', 'action' => 'profile')); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link( "Messages",   array('controller' => 'messages','action'=>'send'),array('escape' => false) ); ?>
                    </li>
                    <li>
                        <?php  echo $this->Html->link( "Logout",   array('controller' => 'main', 'action'=>'logout') ); ?>
                    </li>
                    
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>



<?php echo $this->Html->css('profile'); ?>

<?php echo $this->Html->script('bootstrap-datepicker.min'); ?>
<script>
	function checkPassword()
	{
		alert('sharon');
	}

</script>

<div id="profile-container">
	<?php 

	
	echo $this->Form->create('post'); ?>
	<table>
		<tr>
			<td> <center> <h1> Edit Email </center> </h1> </td>
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
	<?php echo $this->Form->end(); 

	//var_dump($sessname);
	?>
</div>