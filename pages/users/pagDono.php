<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  $fornecedores = getFornecedores();
  $admins = getAdmins();

  $smarty->assign('fornecedores', $fornecedores);
  $smarty->assign('admins', $admins);
  
  $smarty->display('users/dono.tpl');
?>
