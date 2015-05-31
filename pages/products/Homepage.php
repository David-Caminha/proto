<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    
    $recentementeVendidos = getRecentementeVendidos();
    $maisVendidos = getMaisVendidos();

    foreach ($recentementeVendidos as  $product)
    {
        if(isset($photo))
            unset($photo);
        if(file_exists($BASE_DIR.'images/produtos/'.$product['caminhoimagem'].'.png'))
            $photo = 'images/produtos/'.$product['caminhoimagem'].'.png';
        else if(file_exists($BASE_DIR.'images/produtos/'.$product['caminhoimagem'].'.jpg'))
          $photo = 'images/produtos/'.$product['caminhoimagem'].'.jpg';
        else
            $photo = 'images/produtos/default.png';
        $product['photo'] = $photo;
    }
    foreach ($maisVendidos as $product)
    {
        if(isset($photo))
            unset($photo);
        if(file_exists($BASE_DIR.'images/produtos/'.$product['caminhoimagem'].'.png'))
            $photo = 'images/produtos/'.$product['caminhoimagem'].'.png';
        else if(file_exists($BASE_DIR.'images/produtos/'.$product['caminhoimagem'].'.jpg'))
          $photo = 'images/produtos/'.$product['caminhoimagem'].'.jpg';
        else
            $photo = 'images/assets/Logo.png';
        $product['caminhoimagem'] = $photo;
    }
	
	if (!empty($_GET['idP'])) {
	  addItem(1,$_GET['idP'], $_SESSION['username']); //o primeiro 1 sera substituido pela quantidade e o segundo 1 sera substituido pelo id do utilizador com sessão aberta
	}
  	if (!empty($_GET['idProd'])) {
		$_SESSION['produto']=$_GET['idProd'];
		header("Location: $BASE_URL" . 'pages/products/product.php');
	}


    $smarty->assign('recentementeVendidos', $recentementeVendidos);
    $smarty->assign('maisVendidos', $maisVendidos);
    $smarty->display('products/home.tpl');
?>