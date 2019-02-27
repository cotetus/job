<?php 
	
	spl_autoload_register(function($nameClass){

		require_once $nameClass.'.class.php';

	});

?>