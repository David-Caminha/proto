<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  $fornecedores = getFornecedores();
  $admins = getAdmins();
  $utilizadores = getUtilizadores();
  $type = getTipo($_SESSION['username']);
  if($type == 2) {
	  if(!empty($_GET['aceitar'])){
		  aceitarFornecedor($_GET['aceitar'], $_SESSION['owner']);
		  header('Location: '.$BASE_URL. 'pages/users/pagDono.php');
	  }
	  if(!empty($_GET['recusar'])){
		  recusarFornecedor($_GET['recusar'], $_SESSION['owner']);
		  header('Location: '.$BASE_URL. 'pages/users/pagDono.php');

	  }
	  if(!empty($_GET['remover'])){
		  recusarFornecedor($_GET['remover'], $_SESSION['owner']); 
		  header('Location: '.$BASE_URL. 'pages/users/pagDono.php');
	  }
	  if(!empty($_GET['promover'])){
		  promoverUtilizador($_GET['promover'], $_SESSION['owner']);
		  header('Location: '.$BASE_URL. 'pages/users/pagDono.php');
	  }
	  if(!empty($_GET['despromover'])){
		  despromoverAdmin($_GET['despromover'], $_SESSION['owner']);
		  header('Location: '.$BASE_URL. 'pages/users/pagDono.php');
	  }
	  $smarty->assign('fornecedores', $fornecedores);
	  $smarty->assign('admins', $admins);
	  $smarty->assign('utilizadores', $utilizadores);
	  
	  $smarty->display('users/dono.tpl');
  } else {
		header('Location: '.$BASE_URL. 'pages/users/Homepage.php');
  }
?>
