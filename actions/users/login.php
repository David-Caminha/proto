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
	
    if (isUserLoginCorrect($username, $password))
    {
        $n_items = getNumberOfItems($_POST['username']);
		if(getTipo($username)==2){
			$_SESSION['owner']= TRUE;
			$n_n_prod = getNumberOfNewProducts();
			$_SESSION['nnprod'] = $n_n_prod[0]['qtd'];
		}
		$_SESSION['username'] = $username;
		$_SESSION['nitems'] = $n_items[0]['qtd'];
        $_SESSION['success_messages'][] = 'Login successful'; 
		
    }
    else if(isSupplierLoginCorrect($username, $password))
    {
		$n_prod = getNumberOfProducts($username);
        $_SESSION['fornecedor'] = $username;
		$_SESSION['nprodutos'] = $n_prod[0]['qtd'];
        $_SESSION['success_messages'][] = 'Login successful'; 
    }
    else
    {
        $_SESSION['error_messages'][] = 'Login failed';
    }
	
	
    header("Location: $BASE_URL");
?>
