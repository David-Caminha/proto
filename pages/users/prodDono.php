<?php
	  include_once('../../config/init.php');
	  include_once($BASE_DIR .'database/users.php');
	  
	$type = getTipo($_SESSION['username']);
	if($type == 2) {
		$n_prod = getNewProducts();
		
		if(!empty($_GET['aprovar'])){
			aprovarProd($_GET['aprovar'], $_SESSION['owner']);
			$_SESSION['nnprod'] = $_SESSION['nnprod'] -1;
			header('Location: '.$BASE_URL. 'pages/users/prodDono.php');
		}
		if(!empty($_GET['rejeitar'])){
			rejeitarProd($_GET['rejeitar'], $_SESSION['owner']);
			$_SESSION['nnprod'] = $_SESSION['nnprod'] -1;
			header('Location: '.$BASE_URL. 'pages/users/prodDono.php');
		}
		
		$smarty->assign('products', $n_prod);
		$smarty->display('users/prodDono.tpl');
	} else {
		header('Location: '.$BASE_URL. 'pages/products/Homepage.php');
	}
?>