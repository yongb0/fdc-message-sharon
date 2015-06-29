<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>




<!--login modal-->
<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
      </div>
      <div class="modal-body">
<?php echo $this->Form->create('post'); ?>
<div id="login-frm">
	<table style = 'margin: 0 auto !important;float: none !important;' class='span5'>
		<tr>
			<td> </td>
			<td colspan="2"> <center> <big><?php echo $this->Session->flash(); ?> </big> </center> </td>
		</tr>
		<tr>
			<td> </td>
			<td>
				<?php echo $this->Form->input('Email',array(
									'name' => 'email',
									'class' => 'form-control',
									'type' => 'email',
									'required' => true
								)); 
				?>
			</td>
		</tr>
		<tr>
			<td>
			</td><td>
				<?php echo $this->Form->input('Password',array(
									'name' => 'password',
									'class' => 'form-control',
									'type' => 'password',
									'required' => true
								)); 
				?>
			</td>
		</tr>
		<tr>
			<td> </td>
			<td> 
				<center>
					<?php echo $this->Form->button('Sign in',array('id' => 'btn_login','class' => 'btn btn-primary')); 
					?>
					<?php echo '<br />'.$this->Html->link('Register','registration'); 
					?>
				</center>
			</td>
		</tr>
	</table>
<?php echo $this->Form->end(); ?>
</div>