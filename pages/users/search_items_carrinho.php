<?php
    include_once('../../config/init.php');
	include_once($BASE_DIR .'database/carrinhoCompras.php');
    $itemEncomenda = searchItems($_GET['idCarrinho']);
	
    $smarty->assign('Result', $itemEncomenda);
    $smarty->display('users/shop_cart.tpl');
?>