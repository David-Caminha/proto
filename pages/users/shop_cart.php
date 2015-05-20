<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/carrinhoCompras.php');
  $itemEncomenda = searchItems();
  if (!empty($_GET['idCarrinho']) && !empty($_GET['idProduto'])) {
	  removeItem($_GET['idCarinho'],$_GET['idProduto'], 1);
  }
  $smarty->assign('Result', $itemEncomenda);
  $smarty->display('users/shop_cart.tpl');
?>
