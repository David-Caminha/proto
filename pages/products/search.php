<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
	
	$filtro = <echo>"<script type='text/javascript'>document.getElementById('filter').value;</script>";
    $searchResult = getSearchResult($_GET['pesquisa'], $filtro);

    foreach ($searchResult as $key => $product)
    {
        unset($photo);
        if(file_exists($BASE_DIR.'images/produtos/'.$product['id'].'.png'))
            $photo = 'images/produtos/'.$product['id'].'.png';
        if(file_exists($BASE_DIR.'images/produtos/'.$product['id'].'.jpg'))
          $photo = 'images/produtos/'.$product['id'].'.jpg';
        if (!$photo) $photo = 'images/produtos/default.png';
        $recentProducts[$key]['photo'] = $photo;
    }
	//acrescentei este codigo
	if (!empty($_GET['idP'])) {
	  addItem(1,$_GET['idP'], $_SESSION['username']); //o primeiro 1 sera substituido pela quantidade
  }
	
    $smarty->assign('searchResult', $searchResult);
    $smarty->display('products/search.tpl');
?>