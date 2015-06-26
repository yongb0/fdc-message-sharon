
 <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<?php echo $this->Html->css('profile'); ?>
<?php echo $this->Html->script('edit-profile'); ?>
<?php echo $this->Html->script('bootstrap-datepicker.min'); ?>
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
                <a class="navbar-brand" href="">Message Board</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                  

                  <li>
                        <?php echo $this->Html->link('Hi '.strtoupper($sessname[0]['users']['name']).'!', array('controller' => 'main', 'action' => 'profile')); ?>
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

<div id="profile-container">
<?php echo $this->Form->create("post",array(
							'enctype' => 'multipart/form-data',
							'id' => 'form-profile'
						)
					);
?>
	<table>
		<tr>
			<td> <center> <h1> Edit Profile </center> </h1> </td>
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