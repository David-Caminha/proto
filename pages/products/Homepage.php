<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/products.php');
    
    $recentementeVendidos = getRecentementeVendidos();
    $maisVendidos = getMaisVendidos();

    foreach ($recentementeVendidos as $product)
    {
        if(isset($photo))
            unset($photo);
        if(file_exists($BASE_DIR.'images/produtos/'.$product['caminhoImagem'].'.png'))
            $photo = 'images/produtos/'.$product['caminhoimagem'].'.png';
        else if(file_exists($BASE_DIR.'images/produtos/'.$product['caminhoImagem'].'.jpg'))
          $photo = 'images/produtos/'.$product['caminhoImagem'].'.jpg';
        else
            $photo = 'images/produtos/default.png';
        $product['photo'] = $photo;
    }
    foreach ($maisVendidos as $product)
    {
        if(isset($photo))
            unset($photo);
        if(file_exists($BASE_DIR.'images/produtos/'.$product['caminhoImagem'].'.png'))
            $photo = 'images/produtos/'.$product['caminhoImagem'].'.png';
        else if(file_exists($BASE_DIR.'images/produtos/'.$product['caminhoImagem'].'.jpg'))
          $photo = 'images/produtos/'.$product['caminhoImagem'].'.jpg';
        else
            $photo = 'images/assets/Logo.png';
        $product['caminhoImagem'] = $photo;
    }

    $smarty->assign('recentementeVendidos', $recentementeVendidos);
    $smarty->assign('maisVendidos', $maisVendidos);
    $smarty->display('products/home.tpl');
?>