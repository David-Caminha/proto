<?php
  session_set_cookie_params(3600, '/~lbaw1463'); //FIXME
  session_start();

  error_reporting(E_ERROR | E_WARNING); // E_NOTICE by default

  $BASE_DIR = '/opt/lbaw/lbaw1463/public_html/proto/'; //FIXME
  $BASE_URL = '/~lbaw1463/proto/'; //FIXME

  $conn = new PDO('pgsql:host=vdbm;dbname=lbaw1463', 'lbaw1463', 'lL715xu0'); //FIXME
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $conn->exec('SET SCHEMA \'lbaw1463\''); //FIXME
  include_once($BASE_DIR . 'lib/smarty/Smarty.class.php');
  
  $smarty = new Smarty;
  $smarty->template_dir = $BASE_DIR . 'templates/';
  $smarty->compile_dir = $BASE_DIR . 'templates_c/';
  $smarty->assign('BASE_URL', $BASE_URL);
  
  $smarty->assign('ERROR_MESSAGES', $_SESSION['error_messages']);  
  $smarty->assign('FIELD_ERRORS', $_SESSION['field_errors']);
  $smarty->assign('SUCCESS_MESSAGES', $_SESSION['success_messages']);
  $smarty->assign('FORM_VALUES', $_SESSION['form_values']);
  $smarty->assign('USERNAME', $_SESSION['username']);
  $smarty->assign('OWNER', $_SESSION['owner']);
  $smarty->assign('FORNECEDOR', $_SESSION['fornecedor']);
  $smarty->assign('NITEMS', $_SESSION['nitems']);
  $smarty->assign('NNPROD', $_SESSION['nnprod']);
  $smarty->assign('NPRODUTOS', $_SESSION['nprodutos']);
  
  unset($_SESSION['success_messages']);
  unset($_SESSION['error_messages']);  
  unset($_SESSION['field_errors']);
  unset($_SESSION['form_values']);
?>