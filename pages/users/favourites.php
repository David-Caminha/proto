<?php
	include_once('../../config/init.php');
	include_once($BASE_DIR .'database/products.php');
	
	$fav_array=getFavourites($_SESSION['username']);
	
	if (!empty($_GET['idProd'])) {
		header("Location: $BASE_URL" . 'pages/products/product.php?idProd=' . $_GET['idProd']);
	}
	
	if (!empty($_GET['idP'])) {
		removeFav($_SESSION['username'], $_GET['idP']);
		echo "<script type='text/javascript'>window.location.replace('favourites.php');</script>";
	}
	
	$smarty->assign('produto', $fav_array);
	$smarty->display('users/favourites.tpl');