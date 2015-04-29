<?php
    function createUser($username, $password, $birthDate, $realname, $email, $phone) {
        global $conn;
        $stmt = $conn->prepare("
            INSERT INTO utilizador 
            VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute(array($username, sha1($password), $birthDate, $realname, $email, $phone));
    }

    function isLoginCorrect($username, $password) {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                            FROM users 
                            WHERE username = ? AND password = ?");
        $stmt->execute(array($username, sha1($password)));
        return $stmt->fetch() == true;
    }
?>
