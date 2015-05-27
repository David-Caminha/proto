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
            INSERT INTO utilizador (username, password, datanascimento, nome, email, telemovel)
            VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute(array($username, crypt($password), $birthDate, $realname, $email, $phone));
    }

    function createSuplier($username, $password, $email, $contactName, $contactPhone) {
        global $conn;
        $stmt = $conn->prepare("
            INSERT INTO fornecedor 
            VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array($username, crypt($password), $email, $contactName, $contactPhone));
    }

    function isUserLoginCorrect($username, $password) {
        global $conn;
        $stmt = $conn->prepare("SELECT password 
                            FROM utilizador 
                            WHERE username = ?");
        $stmt->execute(array($username));
        $stmt->bindColumn(1, $pass);
        if($stmt->fetch())
            return ($pass == crypt($password, $pass));
        else
            return false;
    }

    function isSuplierLoginCorrect($username, $password) {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                            FROM fornecedor 
                            WHERE username = ? AND password = ?");
        $stmt->execute(array($username, crypt($password)));
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

    function getType() {
    }
?>
