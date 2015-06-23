<!-- app/View/Users/add.ctp -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>




<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        
      </div>
      <div class="modal-body">
REGISTRATION
<?php echo $this->Form->create('User');?>
    <fieldset>
        <?php echo $this->Form->input('username', array('class' => 'form-control'));
        echo $this->Form->input('email', array('class' => 'form-control'));
        echo $this->Form->input('password', array('class' => 'form-control'));
        echo $this->Form->input('password_confirm', array('label' => 'Confirm Password *', 'maxLength' => 255, 'title' => 'Confirm password', 'type'=>'password','class' => 'form-control'));
        echo $this->Form->input('gender', array(
            'options' => array( '1' => 'Female', '2' => 'Male'),'class' => 'form-control'
        ));
        
        echo $this->Form->submit('Add User', array('class' => 'form-submit',  'title' => 'Click here to add the user') ); 
?>
    </fieldset>
<?php echo $this->Form->end(); ?>
<?php 
if($this->Session->check('Auth.User')){
echo $this->Html->link( "Return to Dashboard",   array('action'=>'index') ); 
echo "<br>";
echo $this->Html->link( "Logout",   array('action'=>'logout') ); 
}else{
echo $this->Html->link( "Return to Login Screen",   array('action'=>'login') ); 
}
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