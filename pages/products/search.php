<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');

    $searchResult = getSearchResult($_GET['pesquisa'], $_GET['method_receiver']);

    foreach ($searchResult as $key => $product)
    {
        unset($photo);
        if(file_exists($BASE_DIR.'images/produtos/'.$product['id'].'.png') && $product['caminhoimagem'] != ('images/produtos/'.$product['id'].'.png'))
        {
            $photo = 'images/produtos/'.$product['id'].'.png';
            updatePath($product['id'], $photo);
            $searchResult = getSearchResult($_GET['pesquisa'], $_GET['method_receiver']);
        }
        elseif(file_exists($BASE_DIR.'images/produtos/'.$product['id'].'.jpg') && $product['caminhoimagem'] != ('images/produtos/'.$product['id'].'.jpg'))
        {
            $photo = 'images/produtos/'.$product['id'].'.jpg';
            updatePath($product['id'], $photo);
            $searchResult = getSearchResult($_GET['pesquisa'], $_GET['method_receiver']);
        }
        elseif($product['caminhoimagem'] != 'images/produtos/default.png')
        {
            $photo = 'images/produtos/default.png';
            updatePath($product['id'], $photo);
            $searchResult = getSearchResult($_GET['pesquisa'], $_GET['method_receiver']);
        }
    }
	if (!empty($_GET['idP'])) {
	  $result=addItem(1,$_GET['idP'], $_SESSION['username']); 
	  if($result){$_SESSION['nitems']+=1;}
	}
	if (!empty($_GET['idProd'])) {
		header("Location: $BASE_URL" . 'pages/products/product.php?idProd=' . $_GET['idProd']);
	}
    $smarty->assign('searchResult', $searchResult);
    $smarty->display('products/search.tpl');
?>