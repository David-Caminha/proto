<?php 
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');

    vote($_SESSION['username'], $_POST['idProduct'], $_POST['star']);

	$votes = getVotes($_POST['idProduct']);

    $smarty->assign('votes', $votes);
    $output = $smarty->fetch('products/votes.tpl');
    echo $output;
?>