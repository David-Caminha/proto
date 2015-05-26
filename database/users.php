<?php
    function usernameExists($username) {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                            FROM utilizador 
                            WHERE username = ?");
        $stmt->execute(array($username));
        return $stmt->fetch() == true;
    }

    function createUser($username, $password, $email, $birthDate, $realname, $phone, $address) {
        global $conn;
        $stmt = $conn->prepare("
            INSERT INTO utilizador 
            VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT), $email, $birthDate, $realname, $phone, $address));
    }

    function createSuplier($username, $password, $email, $contactName, $contactPhone) {
        global $conn;
        $stmt = $conn->prepare("
            INSERT INTO utilizador 
            VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT), $email, $contactName, $contactPhone));
    }

    function isUserLoginCorrect($username, $password) {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                            FROM utilizador 
                            WHERE username = ? AND password = ?");
        $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT)));
        return $stmt->fetch() == true;
    }

    function isSuplierLoginCorrect($username, $password) {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                            FROM fornecedor 
                            WHERE username = ? AND password = ?");
        $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT)));
        return $stmt->fetch() == true;
    }

    function getFornecedores() {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                            FROM fornecedor");
        $stmt->execute();
        return $stmt->fetch();
    }

    function getAdmins() {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                            FROM utilizador
                            WHERE tipo = admin");
        $stmt->execute();
        return $stmt->fetch();
    }
?>
