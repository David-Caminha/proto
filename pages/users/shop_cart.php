<?php
  include_once('../../config/init.php');
	include_once($BASE_DIR .'database/carrinhoCompras.php');
    $itemEncomenda = searchItems();
	
    $smarty->assign('Result', $itemEncomenda);
    $smarty->display('users/shop_cart.tpl');
?>
