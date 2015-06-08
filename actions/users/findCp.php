<?php 
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');  
    $city = $_GET['city'];

    $cidades = cpsPertencentes($city);
    $smarty->assign('cidades', $cidades);
    $output = $smarty->fetch('users/postal.tpl');
    echo $output;
?>