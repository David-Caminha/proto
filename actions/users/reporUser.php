<?php 
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');

    if(reporUser($_GET['repor'], $_SESSION['username']))
        header("Location: $BASE_URL" . 'pages/users/gerirUsers.php');
    else
        $smarty->display('common/no_permission.tpl');
?>