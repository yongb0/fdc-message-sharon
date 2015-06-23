<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>



<center>
	<h1>Thank You for Registering <?php print $this->Session->read('Auth.User.username').'|'.$this->Session->read('Auth.User.id'); ?></h1>
	 <?php
	 //	echo $this->Form->button('Back to Homepage', array('class' => 'btn btn-lge btn-primary'), array(''));
	 	 echo $this->Html->link( "Back to Homepage",   array('action'=>'homePage') ); 
	 ?>
</center>