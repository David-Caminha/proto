<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
	$pp = populate_product_comment(1);
	$info = populate_product_info(1);
	$a_b = also_bought(1);
	
	$smarty->assign('Result', $pp);
	$smarty->assign('p', $info);
	$smarty->assign('a_bought', $a_b);
	$smarty->display('products/single_product_page.tpl');
?>