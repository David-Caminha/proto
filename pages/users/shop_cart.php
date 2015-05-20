<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/carrinhoCompras.php');
  
  $smarty->display('users/shop_cart.tpl');
?>
