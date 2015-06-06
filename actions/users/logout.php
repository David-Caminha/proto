<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');
  
  if($_SESSION['username']){
	  if(!$_SESSION['owner']) {
		killShopCart($_SESSION['username']);
	  }
  }
  session_destroy();
  
  header('Location: ' . $BASE_URL);
?>
