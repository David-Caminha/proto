<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');

    $paises = getPaises();

    $smarty->assign('paises', $paises);
    $smarty->display('users/register.tpl');
?>
