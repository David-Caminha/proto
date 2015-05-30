<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
	$pp = populate_product_page(1);
	
	$smarty->assign('Result', $pp);
	$smarty->display('products/single_product_page.tpl');
?>