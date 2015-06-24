 <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<head>
        <link rel="stylesheet" type="css/text" href="test.css"/>
        <script type="text/javascript" src="test.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        
    </head>
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
                		Welcome <?php print $this->Session->read('Auth.User.username'); ?>
                	</li>

                	<li>
                        <?php echo $this->Html->link('Hi '.$this->Session->read('Auth.User.username').'!', array('controller' => 'main', 'action' => 'profile')); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link( "Messages",   array('controller' => 'users','action'=>'add'),array('escape' => false) ); ?>
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

<br /><br /><br /><br />
<?php

	//echo "sharon";
	//echo $id;
	//var_dump($messageList);
?>
<head>
	<style>
	

		.bubble {
		  background-color: silver;
		  width: 80%;
		  padding: 20px;
		  margin: 20px;
		  font-size: 12px;
		  border-radius: 10px;
		  float:right;
		}
		.bubble2 {
		  background-color: silver;
		  width: 80%;
		  padding: 20px;
		  margin: 20px;
		  font-size: 12px;
		  border-radius: 10px;
		  float:left;
		}
	</style>
</head>
<body>
	<?php
		  $me = $userid;
			

			  echo $this->Html->link('<< BACK',array(
				  									'controller' => 'messages','action' => 'send'
					  							)
					  						);

	?>


 	
	<center>
	<table style='width:80%'>


			<?php
			//var_dump($username);
			$idUser = $username[0]['users']['id'];
			echo '<b>'.strtoupper($username[0]['users']['name']).'</b>&nbsp;&nbsp;&nbsp;&nbsp;';?>
			<button type="button" alass="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">+New Message</button>
			<?php
		//	var_dump($username);
			  foreach($messageList as $message)
                 {
                 	$from_id = $message['Message']['from_id'];
                 	$to_id = $message['Message']['to_id'];
                 	$content = $message['Message']['content'];
                 	$modified = $message['Message']['modified'];
                 	$messageId = $message['Message']['id'];

                 	if($from_id == $me)
                 	{
                 		$bubbleCss = 'bubble';
                 	}
                 	else
                 		$bubbleCss = 'bubble2';


                 	?>
                 	<tr>
                 		<td colspan='30' class="<?php echo $bubbleCss; ?>">
                 			 <?php
					    	echo '<font>'.$content.'</font>';

					     ?>
					     <br />
					     <?php
					     	echo '~'.$modified;


					    // 	$implodeParam = implode('-', $messageId)

					     	 echo $this->Html->link(
						    $this->Html->tag('span', '', array('class' => 'glyphicon glyphicon-trash')),
						    array('controller' => 'messages','action' => 'deleteMessage', $idUser.'-'.$messageId),
						    array('class' => 'btn btn-mini', 'escape' => false)
						);


					     ?>
					    
                 		</td>


                 	</tr>	

                 	<?php
                 		}
                 	?>		

				
	</table>	

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create('messages',array('controller' => 'messages','action' => 'addMessage')); ?>
          <div class="form-group">
           	<input type='hidden' name='hideId' id='hideId' value='<?php echo $idUser; ?>'>	
             <?php echo $this->Form->input(' ',array(
                        'name' => 'to_id',
                        'id' => 'to_id',
                        'class' => 'form-control',
                        'type' => 'hidden',
                        'value' => $userid_to

                      )
                    );
                    ?>
                     <?php echo $this->Form->input(' ',array(
                        'name' => 'from_id',
                        'id' => 'from_id',
                        'class' => 'form-control',
                        'type' => 'hidden',
                        'value' => $this->Session->read('usersid')
                      )
                    );
                    ?>

            <div id='divSearch'>
           

            </div>

          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <?php
              echo $this->Form->textarea('notes',array(
                        'name' => 'content',
                        'id' => 'content',
                        'class' => 'form-control'
                      ));

            ?>
          </div>
          <?php echo $this->Form->button('Send Message',array('id' => 'btn_login','class' => 'btn btn-primary')); ?>
      <?php echo $this->Form->end(); ?>
      </div>
    </div>
  </div>
</div>







</body>
