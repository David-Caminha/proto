<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
	
	$p_id = $_GET['idProd'];
	$info = populate_product_info($p_id);
	$brands = getBrands();
	
	$smarty->assign('p', $info[0]);
	$smarty->assign('brands', $brands);
	$smarty->display('users/editProduct.tpl');
?>