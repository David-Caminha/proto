<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');

    $searchResult = getSearchResult($_GET['pesquisa']);

    foreach ($searchResult as $key => $product)
    {
        unset($photo);
        if(file_exists($BASE_DIR.'images/produtos/'.$product['id'].'.png'))
            $photo = 'images/produtos/'.$product['id'].'.png';
        if(file_exists($BASE_DIR.'images/produtos/'.$product['id'].'.jpg'))
          $photo = 'images/produtos/'.$product['id'].'.jpg';
        if (!$photo) $photo = $BASE_DIR.'images/produtos/default.png';
        $recentProducts[$key]['photo'] = $photo;
    }
	//acrescentei este codigo
	if (!empty($_GET['idP'])) {
	  addItem(1,$_GET['idP'], 1); //o primeiro 1 sera substituido pela quantidade e o segundo 1 sera substituido pelo id do utilizador com sessão aberta
  }
	
    $smarty->assign('searchResult', $searchResult);
    $smarty->display('products/search.tpl');
?>