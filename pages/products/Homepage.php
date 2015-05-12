<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    
    $recentementeVendidos = getRecentementeVendidos();
    $maisVendidos = getMaisVendidos();

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
    foreach ($mostSold as $key => $product)
    {
        unset($photo);
        if(file_exists($BASE_DIR.'images/produtos/'.$product['id'].'.png'))
            $photo = 'images/produtos/'.$product['id'].'.png';
        if(file_exists($BASE_DIR.'images/produtos/'.$product['id'].'.jpg'))
          $photo = 'images/produtos/'.$product['id'].'.jpg';
        if (!$photo) $photo = 'images/produtos/default.png';
        $mostSold[$key]['photo'] = $photo;
    }

    $smarty->assign('recentementeVendidos', $recentementeVendidos);
    $smarty->assign('maisVendidos', $maisVendidos);
    $smarty->display('products/home.tpl');
?>