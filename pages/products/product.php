<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
	
	$smarty->display('products/single_product_page.tpl');
?>