<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
	
	$p_id = $_GET['idProd'];
	$info = populate_product_info($p_id);
	
	$smarty->assign('product', $info[0]);
	$smarty->display('users/editProduct.tpl');
?>