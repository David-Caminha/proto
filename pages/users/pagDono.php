<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  $fornecedores = getFornecedores();
  $admins = getAdmins();
  
  if(!empty($_GET['aceitar'])){
	  aceitarFornecedor($_GET['aceitar']);
  }
  if(!empty($_GET['recusar'])){
	  recusarFornecedor($_GET['recusar']);
  }
  if(!empty($_GET['remover'])){
	  recusarFornecedor($_GET['remover']); 
  }
  $smarty->assign('fornecedores', $fornecedores);
  $smarty->assign('admins', $admins);
  
  $smarty->display('users/dono.tpl');
?>
