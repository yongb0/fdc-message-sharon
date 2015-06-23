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
         <?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->Form->create('User'); ?>
		    <fieldset>
		        <legend><?php echo __('Login'); ?></legend>
		        <?php echo $this->Form->input('username', array('class' => 'form-control'));
		        echo $this->Form->input('password', array('class' => 'form-control'));
		    ?>
		    </fieldset>
		<?php echo $this->Form->end(__('Login'));
		 echo $this->Html->link( "Register",   array('action'=>'add') ); 
		 ?>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>