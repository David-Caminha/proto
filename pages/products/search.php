<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');

    $searchResult = getSearchResult($value);

    foreach ($recentProducts as $key => $product)
    {
        unset($photo);
        if(file_exists($BASE_DIR.'images/produtos/'.$product['id'].'.png'))
            $photo = 'images/produtos/'.$product['id'].'.png';
        if(file_exists($BASE_DIR.'images/produtos/'.$product['id'].'.jpg'))
          $photo = 'images/produtos/'.$product['id'].'.jpg';
        if (!$photo) $photo = 'images/produtos/default.png';
        $recentProducts[$key]['photo'] = $photo;
    }

    $smarty->assign('searchResult', $searchResult);
    $smarty->display('products/search.tpl');
?>