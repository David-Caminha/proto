<?php 
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');

    removeComment($_POST['idComentario']);

	$pp = populate_product_comment($_POST['idProduto']);

    $smarty->assign('Result', $pp);
    $output = $smarty->fetch('products/comentarios.tpl');
    echo $output;
?>