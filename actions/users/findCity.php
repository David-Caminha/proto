<?php 
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');  
    $country = $_GET['cidade'];

    $cidades = cidadesPertencentes($country);
    $smarty->assign('cidades', $cidades);
    $output = $smarty->fetch('cities.tpl');
    echo $output;
?>