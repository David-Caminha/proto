<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');  
	
	if(!empty($_POST['name'])){
		insertBrand($_POST['name']);
	}
	
	$smarty->display('pages/users/insertBrand.tpl');
?>