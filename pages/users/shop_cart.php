<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/carrinhoCompras.php');
  $itemEncomenda = searchItems($_SESSION['username']);
  if (!empty($_GET['idC']) && !empty($_GET['idP'])) {
	  removeItem($_GET['idC'],$_GET['idP'], $_SESSION['username']);
	  echo "<script type='text/javascript'>location.reload();</script>";
  }
  $smarty->assign('Result', $itemEncomenda);
  $smarty->display('users/shop_cart.tpl');
?>
