<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');  

//mudar condiçao do if
  if (!$_POST['username'] || !$_POST['realname'] || !$_POST['password'] || $_POST['birthdate'] || $_POST['email'] || $_POST['phone']) {
    $_SESSION['error_messages'][] = 'All fields are mandatory';
    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/register.php');
    exit;
  }

  $realname = strip_tags($_POST['realname']);
  $username = strip_tags($_POST['username']);
  $password = $_POST['password'];
  $birthDate = $_POST['birthdate'];
  $email = strip_tags($_POST['email']);;
  $phone = strip_tags($_POST['phone']);;

  try {
    createUser($username, $password, $birthDate, $realname, $email, $phone);
  } catch (PDOException $e) {
    if (strpos($e->getMessage(), 'users_pkey') !== false) {
      $_SESSION['error_messages'][] = 'Duplicate username';
      $_SESSION['field_errors']['username'] = 'Username already exists';
    }
    else $_SESSION['error_messages'][] = 'Error creating user';

    $_SESSION['form_values'] = $_POST;
    header("Location: $BASE_URL" . 'pages/users/register.php');
    exit;
  }
  $_SESSION['success_messages'][] = 'User registered successfully';  
  header("Location: $BASE_URL");
?>
