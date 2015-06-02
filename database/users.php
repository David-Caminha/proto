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

    function isSupplierLoginCorrect($username, $password) {
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
        return $stmt->fetchALL();
    }

    function getAdmins() {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                            FROM utilizador
                            WHERE tipo = 1");
        $stmt->execute();
        return $stmt->fetchALL();
    }

    function getTipo($username) {
        global $conn;
        $stmt = $conn->prepare("SELECT tipo 
                            FROM utilizador 
                            WHERE username = ?");
        $stmt->execute(array($username));
        $stmt->bindColumn(1, $type);
        $stmt->fetch();
        return $type;
    }

	function getNumberOfItems($u_name) {
		global $conn;
		$stmt = $conn->prepare("
			SELECT COUNT(itemEncomenda.idProduto) AS qtd 
			FROM itemEncomenda, carrinhoCompras
			WHERE carrinhoCompras.estado = FALSE AND
			itemEncomenda.idCarrinho = carrinhoCompras.id AND
			carrinhoCompras.idUser = (SELECT id FROM utilizador WHERE utilizador.username = ?)
		");
		$stmt->execute(array($u_name));
		return $stmt->fetchALL();
		
	}
	
	function getUserInfo($u_name) {
		global $conn;
		$stmt = $conn->prepare("
			SELECT utilizador.username, utilizador.nome, utilizador.password, utilizador.email, utilizador.telemovel, 
			utilizador.dataNascimento, morada.rua, morada.CP2, cidade.CP1, cidade.nome as nome_cidade, cidade.nomePais
			FROM utilizador, morada, cidade
			WHERE utilizador.id = morada.idUser AND
			morada.idCidade = cidade.id AND
			utilizador.username = ?
			GROUP BY utilizador.id
		");
		$stmt->execute(array($u_name));
		return $stmt->fetchALL();
	}
