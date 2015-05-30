<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
	$pp = populate_product_comment(1);
	$info = populate_product_info(1);
	$smarty->assign('Result', $pp);
	$smarty->assign('p', $info);
	$smarty->display('products/single_product_page.tpl');
?>