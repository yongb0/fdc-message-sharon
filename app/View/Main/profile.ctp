
<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                 
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



<?php echo $this->Html->css('profile'); ?>

<?php echo $this->Html->script('bootstrap-datepicker.min'); ?>

<div id="profile-container">

	<table>
		<tr>
		</tr>
		<tr>
		</tr>
		<tr>
		</tr>
		<tr>
			<td> <br /><br /><center> <h1>Profile </center> </h1> </td>
		</tr>
		<tr>
			<td> 
				<center>
				<img src="<?php echo ($profile->image) ? 
										$this->webroot."img/users images/$profile->image" :
										$this->webroot."img/user_icon/user2.png"; 
							?>"

					style="max-width:300px;" id="users-image">
				</center>
			</td>
		</tr>
		<tr>
			<td> 
			<table>
				<tr>
					<td> Email </td>
					<td> 
						<b> <?php 

						//var_dump($sessname);

					 ?> </b> 
						<?php 


								if($profile->id === $this->Session->read('usersid')) {
									echo $this->Html->link($profile->email,'editEmail',array(
														
														'id' => 'edit-email'
															)
								  						);
								}
						?>
					</td>
				</tr>	
				<tr>
					<td> Name </td>
					<td> <b> <?php echo $profile->name; ?> </b> </td>
				</tr>	
				<tr>
					<td> Birth Date </td> 
					<td> <b> <?php //echo $profile->birthdate;

						echo date("F j, Y ", strtotime($profile->birthdate));
					 ?> </b> </td> 
				</tr>
				<tr>
					<td> Joined </td> 
					<td> <b> <?php

			//		var_dump($sessname);
					//$datee = date("F j, Y, g:i a",$sessname[0]['users']['created']); 
					$datee =  date("F j, Y H:i:s", strtotime($sessname[0]['users']['created'])); 

					 echo $datee; ?> </b> </td> 
				</tr>
				<tr>
					<td> Last Login </td> 
					<td> <b> <?php 

					echo date("F j, Y H:i:s", strtotime($sessname[0]['users']['modified'])); ?> </b> </td> 
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
					<td colspan='2'> 
						<?php 
								if($profile->id === $this->Session->read('usersid')) {
									echo $this->Html->link('Edit Profile','editProfile',array(
																				'class' => 'btn btn-primary btn-lg'
																			)); 
								}

						?> 
					</td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
</div>