<?php 
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');  
    $city = $_GET['cidade'];

    $cidades = cidadesPertencentes($city);
    $smarty->assign('cidades', $cidades);
    $output = $smarty->fetch('users/cities.tpl');
    echo $output;
?>