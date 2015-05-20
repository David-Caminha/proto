<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/carrinhoCompras.php');
  $itemEncomenda = searchItems();
  if (!empty($_GET['idC']) && !empty($_GET['idP'])) {
	  removeItem($_GET['idC'],$_GET['idP'], 1);
  }
  $smarty->assign('Result', $itemEncomenda);
  $smarty->display('users/shop_cart.tpl');
?>
