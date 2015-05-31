<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
	$pp = populate_product_comment($_GET['idProd']);
	$info = populate_product_info($_GET['idProd']);
	$a_b = also_bought($_GET['idProd']);
	
	$smarty->assign('Result', $pp);
	$smarty->assign('p', $info);
	$smarty->assign('a_bought', $a_b);
	$smarty->display('products/single_product_page.tpl');
?>