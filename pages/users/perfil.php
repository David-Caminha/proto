<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');

    $type = getType();
    if($type == 2)
        header('Location: '.$BASE_URL. 'pages/users/pagDono.php');
    else
        header("Location: $BASE_URL");
?>