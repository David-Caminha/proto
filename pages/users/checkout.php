<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/carrinhoCompras.php');
	
	if($_GET['confirm'])
	{
		checkout($_SESSION['id']);
	}
	
	$smarty->display('users/checkout.tpl');
?>