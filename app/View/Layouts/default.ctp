<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'Message Board');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->script('jquery'); ?>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?> : 
		<?php echo $title_for_layout; ?>
	</title>
	<?php


		echo $this->Html->css('bootstrap');
		echo $this->Html->css('belamids_bootstrap');
		echo $this->Html->css('datepicker.min');
		?>
  		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<?php
		echo "<script>var base_url = '" . $this->webroot . "'</script>";
		echo $this->Html->script('main');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
		
	?>
</head>
<body>
	<div id="container">
		<?php 
			
			if (isset($message_page)) {
				require_once("HTML/messages-option.htm");
			}
		?>
		<div id="content">
			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
	</div>
	
	<?php  // echo $this->element('sql_dump'); ?>
</body>
</html>
