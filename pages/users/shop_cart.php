<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/carrinhoCompras.php');
  if($USERNAME ) {
	  $itemEncomenda = searchItems($_SESSION['username']);
	  if (!empty($_GET['idC']) && !empty($_GET['idP'])) {
		  removeItem($_GET['idC'],$_GET['idP'], $_SESSION['username']);
	  }
	  $smarty->assign('Result', $itemEncomenda);
	  $smarty->display('users/shop_cart.tpl');
  }
  else
  {
	  $smarty->display('common/no_permission.tpl');
  }
?>
