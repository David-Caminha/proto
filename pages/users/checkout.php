<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/carrinhoCompras.php');
	
	if($_GET['confirm'])
	{
		checkout($_SESSION['username']);
		$_SESSION['nitems'] = 0;
		header("Location: $BASE_URL" . 'pages/users/shop_cart.php');
	}
	
	$smarty->display('users/checkout.tpl');
?>