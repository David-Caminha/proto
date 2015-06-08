<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');

    $users = getUtilizadores();
    $banned = getUtilizadoresBanidos();

    $smarty->assign('users', $users);
    $smarty->assign('banned', $banned);
	$smarty->display('users/gerirUsers.tpl');
?>