<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/carrinhoCompras.php');
  $itemEncomenda = searchItems($_SESSION['username']);
  if (!empty($_GET['idC']) && !empty($_GET['idP'])) {
	  $result=removeItem($_GET['idC'],$_GET['idP'], $_SESSION['username']);
	  if($result){$_SESSION['nitems']-=1;}
	  echo "<script type='text/javascript'>window.location.replace('shop_cart.php');</script>";
  }
  if (!empty($_GET['idProd'])) {
		header("Location: $BASE_URL" . 'pages/products/product.php?idProd=' . $_GET['idProd']);
	}

  $smarty->assign('Result', $itemEncomenda);
  $smarty->display('users/shop_cart.tpl');
?>
