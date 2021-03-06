<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    include_once($BASE_DIR .'database/users.php');
	$pp = populate_product_comment($_GET['idProd']);
	$info = populate_product_info($_GET['idProd']);
	$a_b = also_bought($_GET['idProd']);
	$checker = checkFav($_GET['idProd'], $_SESSION['username']);
    $tipo = getTipo($_SESSION['username']);
	$votes = getVotes($_GET['idProd']);
    $voted = hasVoted($_SESSION['username'], $_GET['idProd']);
	
	if(!empty($checker)) {
		$fav_bool=1;
	}	else {
		$fav_bool=0;
	}
	
	if(!empty($_GET['idFav'])) {
		addFav($_GET['idFav'], $_SESSION['username']);
		header("Location: $BASE_URL" . 'pages/products/product.php?idProd=' . $_GET['idFav']);
	}
	
	if (!empty($_GET['qtd_receiver'])) {
	  $result=addItem($_GET['qtd_receiver'], $_GET['prd_receiver'], $_SESSION['username']);
	  if($result){$_SESSION['nitems']+=1;}
	  header("Location: $BASE_URL" . 'pages/products/product.php?idProd=' . $_GET['prd_receiver']);
	}
	
	if (!empty($_POST['text_comment'])) {
		insertComment($_SESSION['username'], $_POST['text_comment'], $_POST['idProd_comment'] );
		header("Location: $BASE_URL" . 'pages/products/product.php?idProd=' . $_POST['idProd_comment']);
	}

    $smarty->assign('votes', $votes);
    $smarty->assign('voted', $voted);
	$smarty->assign('Result', $pp);
	$smarty->assign('fav', $fav_bool);
	$smarty->assign('p', $info);
	$smarty->assign('a_bought', $a_b);
	$smarty->assign('tipo', $tipo);
	$smarty->display('products/single_product_page.tpl');
?>