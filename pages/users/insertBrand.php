<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');  
	
	if(!empty($_POST['name'])){
		insertBrand($_POST['name']);
		header('Location: '.$BASE_URL. 'pages/users/Homepage.php');
	}
	
	$smarty->display('users/insertBrand.tpl');
?>