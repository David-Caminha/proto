<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
	
	$p_id = $_GET['idProd'];
	$info = populate_product_info($p_id);
	$brands = getBrands();
	
	if($_POST['name'] && $_POST['price'] && $_POST['description'] && $_POST['technic_details'] && $_POST['brand'] && $_POST['tipo'])
	{
		$checker=editProduct($_SESSION['fornecedor'], $_POST['name'], $_POST['price'], $_POST['description'], $_POST['technic_details'], $_POST['brand'], $_POST['tipo'], $_POST['idProduct']);
		if($checker){
			header("Location: $BASE_URL" . 'pages/users/editProduct.php?idProd=' . $_POST['idProduct']);
		} else {
			echo "Não tem permissão para editar esse item";
		}
	}
	$smarty->assign('p', $info[0]);
	$smarty->assign('brands', $brands);

	
	$smarty->display('users/editProduct.tpl');
?>