<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');

    $type = getTipo($_SESSION['username']);
    if($type == 2) {
        header('Location: '.$BASE_URL. 'pages/users/pagDono.php');
    }
	$info = getUserInfo($_SESSION['username']);
	
	$smarty->assign('user', $info);
	$smarty->display('users/perfil.tpl');
?>