<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    
	if($_SESSION['fornecedor']) {
		
		$supplier_p = getProductsSupplier($_SESSION['fornecedor']);
		$supplier_p_bought = getSupplierProductsBought($_SESSION['fornecedor']);
		if(!empty($supplier_p_bought)&&!empty($supplier_p)) {
		foreach ($supplier_p_bought as $sb) {
			foreach ($supplier_p as &$p) {
			if($p['pnome'] == $sb['nome']) {
				$p['vendas'] = $sb['valor'];
				break;
			}
		}
		}
		}
		
		if(!empty($_GET['addStock'])) {
			if(is_numeric($_GET['qtd_stock'])&&$_GET['qtd_stock']>=0) {
				addStock($_GET['addStock'],$_GET['qtd_stock'],$_SESSION['fornecedor']);
				header("Location: $BASE_URL" . 'pages/products/Homepage.php');
			}
			else
			{
				echo "<script type='text/javascript'>alert('Por favor insira um valor numérico.');</script>";
			}
		}
		
		if(!empty($_GET['editProd'])) {
			header("Location: $BASE_URL" . 'pages/users/editProduct.php?idProd=' . $_GET['editProd']);
		}
		
		if(!empty($_GET['kill'])) {
			killProduct($_GET['kill'], $_SESSION['fornecedor']);
			header("Location: $BASE_URL" . 'pages/products/Homepage.php');
		}
		
		$smarty->assign('produto', $supplier_p);
		$smarty->display('users/fornecedor.tpl');
	}
	else {
		$recentementeVendidos = getRecentementeVendidos();
		$maisVendidos = getMaisVendidos();

		foreach ($recentementeVendidos as $product)
		{
            unset($photo);
            if(file_exists($BASE_DIR.'images/produtos/'.$product['id'].'.png'))
            {
                if($product['caminhoimagem'] != 'images/produtos/'.$product['id'].'.png')
                {
                    $photo = 'images/produtos/'.$product['id'].'.png';
                    updatePath($product['id'], $photo);
                    $recentementeVendidos = getRecentementeVendidos();
                }
                else
                    continue;
            }
			else if(file_exists($BASE_DIR.'images/produtos/'.$product['id'].'.jpg'))
            {
                if($product['caminhoimagem'] != 'images/produtos/'.$product['id'].'.jpg')
                {
                    $photo = 'images/produtos/'.$product['id'].'.jpg';
                    updatePath($product['id'], $photo);
                    $recentementeVendidos = getRecentementeVendidos();
                }
                else
                    continue;
            }
			else if($product['caminhoimagem'] != 'images/produtos/default.png')
            {
				$photo = 'images/produtos/default.png';
                updatePath($product['id'], $photo);
                $recentementeVendidos = getRecentementeVendidos();
            }
		}
		foreach ($maisVendidos as $product)
		{
            unset($photo);
            if(file_exists($BASE_DIR.'images/produtos/'.$product['id'].'.png'))
            {
                if($product['caminhoimagem'] != 'images/produtos/'.$product['id'].'.png')
                {
                    $photo = 'images/produtos/'.$product['id'].'.png';
                    updatePath($product['id'], $photo);
                    $maisVendidos = getMaisVendidos();
                }
                else
                    continue;
            }
			else if(file_exists($BASE_DIR.'images/produtos/'.$product['id'].'.jpg'))
            {
                if($product['caminhoimagem'] != 'images/produtos/'.$product['id'].'.jpg')
                {
                    $photo = 'images/produtos/'.$product['id'].'.jpg';
                    updatePath($product['id'], $photo);
                    $maisVendidos = getMaisVendidos();
                }
                else
                    continue;
            }
			else if($product['caminhoimagem'] != 'images/produtos/default.png')
            {
				$photo = 'images/produtos/default.png';
                updatePath($product['id'], $photo);
                $maisVendidos = getMaisVendidos();
            }
		}
	
		if (!empty($_GET['idP'])) {
		  $result=addItem(1,$_GET['idP'], $_SESSION['username']); //o primeiro 1 sera substituido pela quantidade e o segundo 1 sera substituido pelo id do utilizador com sessão aberta
		  if($result){$_SESSION['nitems']+=1;}
		  header('Location: '.$BASE_URL. 'pages/products/Homepage.php');
		}
		
		if (!empty($_GET['idProd'])) {
			header("Location: $BASE_URL" . 'pages/products/product.php?idProd=' . $_GET['idProd']);
		}
		$smarty->assign('recentementeVendidos', $recentementeVendidos);
		$smarty->assign('maisVendidos', $maisVendidos);
		$smarty->display('products/home.tpl');
	}
?>