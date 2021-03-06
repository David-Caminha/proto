<?php
    include_once('../../config/init.php');
    include_once($BASE_DIR .'database/users.php');

    if ($_POST['choiceRadio'] == "user" && (!$_POST['username'] || !$_POST['email'] || !$_POST['password'] || !$_POST['confirmarPassword'] || !$_POST['dataNascimento'] || !$_POST['nome'] || !$_POST['contacto'] || !$_POST['morada'] || !$_POST['cp1'] || !$_POST['cp2'] || !$_POST['cidade'])) 
    {
        $_SESSION['error_messages'][] = 'All fields are mandatory.';
        $_SESSION['form_values'] = $_POST;
        header("Location: $BASE_URL" . 'pages/users/register.php');
        exit;
    }
    else if ($_POST['choiceRadio'] == "fornecedor" && (!$_POST['username'] || !$_POST['email'] || !$_POST['password'] || !$_POST['confirmarPassword'] || !$_POST['nomeResponsavel'] || !$_POST['contactoResponsavel'])) 
    {
        $_SESSION['error_messages'][] = 'All fields are mandatory.';
        $_SESSION['form_values'] = $_POST;
        header("Location: $BASE_URL" . 'pages/users/register.php');
        exit;
    }

    if(usernameExists($_POST['username']))
    {
        $_SESSION['error_messages'][] = 'Username already exists.';
        $_SESSION['form_values'] = $_POST;
        header("Location: $BASE_URL" . 'pages/users/register.php');
        exit;
    }

    if($_POST['password'] != $_POST['confirmarPassword'])
    {
        $_SESSION['error_messages'][] = 'The passwords do not match.';
        $_SESSION['form_values'] = $_POST;
        header("Location: $BASE_URL" . 'pages/users/register.php');
        exit;
    }

    if(!isset($_POST['termos']))
    {
        $_SESSION['error_messages'][] = 'Please accept the terms and conditions before continuing';
        $_SESSION['form_values'] = $_POST;
        header("Location: $BASE_URL" . 'pages/users/register.php');
        exit;
    }

    $username = strip_tags($_POST['username']);
    $email = strip_tags($_POST['email']);
    $password = $_POST['password'];
    
    if($_POST['choiceRadio'] == "user")
    {
        $birthDate = $_POST['dataNascimento'];
        $realname = strip_tags($_POST['nome']);
        $phone = strip_tags($_POST['contacto']);
        $address = strip_tags($_POST['morada']);
        $cp1 = strip_tags($_POST['cp1']);
        $cp2 = strip_tags($_POST['cp2']);
    }
    else
    {
        $contactName = strip_tags($_POST['nomeResponsavel']);
        $contactPhone = strip_tags($_POST['contactoResponsavel']);
    }

    try {
        if($_POST['choiceRadio'] == "user")
            createUser($username, $password, $email, $birthDate, $realname, $phone, $address, $cp1, $cp2);
        else if($_POST['choiceRadio'] == "fornecedor")
            createSupplier($username, $password, $email, $contactName, $contactPhone);
        else
        {
            $_SESSION['error_messages'][] = 'Please select one.';
            $_SESSION['form_values'] = $_POST;
            header("Location: $BASE_URL" . 'pages/users/register.php');
            exit;
        }
    } catch (PDOException $e) {
        $_SESSION['error_messages'][] = $e->getMessage();
        $_SESSION['form_values'] = $_POST;
        header("Location: $BASE_URL" . 'pages/users/register.php');
        exit;
    }
    $_SESSION['success_messages'][] = 'User registered successfully';
    header("Location: $BASE_URL");
?>
