<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

// $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
	<?php echo $this->Html->charset(); ?>
	<title>
		Blogs
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('style.css', 'bootstrap.min', 'bootstrap-theme.min',
								'jquery-ui.css'));
		echo $this->Html->script(array('jquery.js', 'popper.min.js', 'bootstrap.min.js',
								'jquery-ui.min', 'search.js'));
		echo $this->Html->script(array('kit.fontawesome.com/dc71347467.js'));
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
<body>
	<head>
		<?php echo $this->element('menu'); ?>
		<script src="https://kit.fontawesome.com/dc71347467.js" crossorigin="anonymous"></script>
	
	</head>
	<style>
    	.title {
    	    color: #2F2D2D;
    	    text-align: center;
    	}

    	body label{
    	  font-size: 1.1em;
    	  color: #00008b;
		}
		i{
			size: 5px;
		}
	</style>
		
	<?php echo $this->Flash->render(); ?>
	<?php echo $this->fetch('content'); ?>
	<!-- sql_dump : muestra las busquedas realizadas en mis modulos. -->
	<!-- < ?php echo $this->element('sql_dump'); ?> -->
</body>
</html>
