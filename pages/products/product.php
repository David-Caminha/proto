<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
	$pp = populate_product_comment($_GET['idProd']);
	$info = populate_product_info($_GET['idProd']);
	$a_b = also_bought($_GET['idProd']);
	
	if (!empty($_GET['qtd_receiver'])) {
	  addItem($_GET['qtd_receiver'], $_GET['prd_receiver'], $_SESSION['username']);
	  if($result){$_SESSION['nitems']+=1;}
	  header("Location: $BASE_URL" . 'pages/products/product.php?idProd=' . $_GET['prd_receiver']);
	}
	
	if (!empty($_POST['text_comment'])) {
		insertComment($_SESSION['username'], $_POST['text_comment'], $_POST['idProd_comment'] );
		header("Location: $BASE_URL" . 'pages/products/product.php?idProd=' . $_POST['idProd_comment']);
	}
	
	$smarty->assign('Result', $pp);
	$smarty->assign('p', $info);
	$smarty->assign('a_bought', $a_b);
	$smarty->display('products/single_product_page.tpl');
?>