<?php
    function createUser($username, $password, $birthDate, $realname, $email, $phone) {
        global $conn;
        $stmt = $conn->prepare("
            INSERT INTO utilizador 
            VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute(array($username, password_hash($password, PASSWORD_DEFAULT), $birthDate, $realname, $email, $phone));
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
