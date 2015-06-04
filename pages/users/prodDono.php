<?php
	  include_once('../../config/init.php');
	  include_once($BASE_DIR .'database/users.php');
	  
	$type = getTipo($_SESSION['username']);
	if($type == 2) {
		$n_prod = getNewProducts();
		
		$smarty->assign('products', $n_prod);
		$smarty->display('users/prodDono.tpl');
	} else {
			header('Location: '.$BASE_URL. 'pages/users/Homepage.php');
	}
?>