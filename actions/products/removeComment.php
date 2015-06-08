<?php 
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');

    removeComment($_POST['id']);

	$pp = populate_product_comment($_GET['idProd']);

    $smarty->assign('Result', $pp);
    $output = $smarty->fetch('products/comentarios.tpl');
    echo $output;
?>