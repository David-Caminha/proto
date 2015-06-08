<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');
	
	if($_SESSION['username']) {
		$info = getUserInfo($_SESSION['username']);
		
		if($_POST['nome'] && $_POST['email'] && $_POST['telemovel'] && $_POST['data_nascimento'] && $_POST['rua'] && $_POST['CP2'] && $_POST['cidade'] ) {
			updateInfoUser($_POST['nome'], $_POST['email'], $_POST['telemovel'], $_POST['data_nascimento'], $_POST['rua'], $_POST['CP2'], $_POST['cidade'], $_SESSION['username']);
			header('Location: '.$BASE_URL. 'pages/users/perfil.php');
		}
		if($_POST['password']==$_POST['confirm_password'] && $_POST['password']!='' && $_POST['password']!='' && $_POST['password'] && $_POST['confirm_password']) {
			updateUserPassword($_POST['old_password'], $_POST['password'], $_SESSION['username']);
			header('Location: '.$BASE_URL. 'pages/users/perfil.php');
		}
        
		$paises = getPaises();
        $smarty->assign('paises', $paises);
		$smarty->assign('info', $info);
		$smarty->display('users/perfil.tpl');
	} 
	elseif($_SESSION['fornecedor']) {
		$info = getSupplierInfo($_SESSION['fornecedor']);
		if($_POST['email'] && $_POST['telemovel'] && $_POST['responsavel'] ) {
			updateSupplierInfo($_POST['email'], $_POST['telemovel'], $_POST['responsavel'], $_SESSION['fornecedor']);
			header('Location: '.$BASE_URL. 'pages/users/perfil.php');
}
		if($_POST['password']==$_POST['confirm_password'] && $_POST['password']!='' && $_POST['password']!='' && $_POST['password'] && $_POST['confirm_password']) {
			updateSupplierPassword($_POST['old_password'], $_POST['password'], $_SESSION['fornecedor']);
			header('Location: '.$BASE_URL. 'pages/users/perfil.php');
		}
		$smarty->assign('info', $info);
		$smarty->display('users/perfil_frn.tpl');
	}
	
?>