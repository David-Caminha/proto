<?php
    include_once('../../config/init.php');
    
    $smarty->assign('Result', $itemEncomenda);
    $smarty->display('users/shop_cart.tpl');
?>