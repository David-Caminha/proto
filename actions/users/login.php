<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');  

    if (!$_POST['username'] || !$_POST['password'])
    {
        $_SESSION['error_messages'][] = 'Invalid login';
        $_SESSION['form_values'] = $_POST;
        header("Location: $BASE_URL" . 'pages/users/register.php');
        exit;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
	$ni = getNumberOfItems($_POST['username']);
  
    if (isUserLoginCorrect($username, $password))
    {
        $_SESSION['username'] = $username;
		$_SESSION['n_items'] = $n_i;
        $_SESSION['success_messages'][] = 'Login successful';  
    }
    else if(isSupplierLoginCorrect($username, $password))
    {
        $_SESSION['username'] = $username;
        $_SESSION['success_messages'][] = 'Login successful'; 
    }
    else
    {
        $_SESSION['error_messages'][] = 'Login failed';
    }
    header("Location: $BASE_URL");
?>
