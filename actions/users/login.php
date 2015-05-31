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
	$n_items = getNumberOfItems($_POST['username']);
	echo $NITEMS;
		echo $_SESSION['nitems'];
		echo $n_items[0]->qtd;
		
    if (isUserLoginCorrect($username, $password))
    {
        echo $NITEMS;
		echo $_SESSION['nitems'];
		echo $n_items[0]->qtd;
		$_SESSION['username'] = $username;
		echo $NITEMS;
		echo $_SESSION['nitems'];
		echo $n_items[0]->qtd;
		$_SESSION['nitems'] = $n_items[0]->qtd;
		echo $NITEMS;
		echo $_SESSION['nitems'];
		echo $n_items[0]->qtd;
        $_SESSION['success_messages'][] = 'Login successful'; 
		echo $NITEMS;
		echo $_SESSION['nitems'];
		echo $n_items[0]->qtd;
		
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
	
	
    // header("Location: $BASE_URL");
?>
