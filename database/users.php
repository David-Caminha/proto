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
		
		$stmtVerify = $conn->prepare("
			SELECT * 
			FROM utilizador
			WHERE username= ?
		");
		$stmtVerify->execute(array($username));
		$checker = $stmtVerify->fetchALL();
		
		if(empty($checker)) {
			$stmt = $conn->prepare("
				INSERT INTO utilizador (username, password, datanascimento, nome, email, telemovel)
				VALUES (?, ?, ?, ?, ?, ?)");
			$stmt->execute(array($username, crypt($password), $birthDate, $realname, $email, $phone));
			return true;
		}
		return false;
    }

    function createSupplier($username, $password, $email, $contactName, $contactPhone) {
        global $conn;
		$stmtVerify = $conn->prepare("
			SELECT * 
			FROM fornecedor
			WHERE nome = ?
		");
		$stmtVerify->execute(array($username));
		$checker = $stmtVerify->fetchALL();
		
		if(empty($checker)) {
			$stmt = $conn->prepare("
				INSERT INTO fornecedor (nome, email, telemovel, responsavel, password)
				VALUES (?, ?, ?, ?, ?)");
			$stmt->execute(array($username, $email, $contactPhone, $contactName, crypt($password) ));
			return true;
		}
		return false;
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
                            WHERE nome = ? AND password = ?");
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
			SELECT utilizador.username, utilizador.nome, utilizador.email, utilizador.telemovel, 
			utilizador.dataNascimento, morada.rua, morada.CP2, cidade.CP1, cidade.nome as nome_cidade, cidade.nomePais
			FROM utilizador, morada, cidade
			WHERE utilizador.id = morada.idUser AND
			morada.idCidade = cidade.id AND
			utilizador.username = ?
			
		");
		$stmt->execute(array($u_name));
		return $stmt->fetchALL();
	}

	function updateInfoUser($u_nome, $u_email, $u_telemovel, $u_date, $m_rua, $m_cp2, $c_nome, $u_name) {
		global $conn;
		$stmt = $conn->prepare("
			UPDATE utilizador SET nome = ?, email = ?, telemovel = ?, dataNascimento = ?
			WHERE id = (SELECT id FROM utilizador WHERE username = ?)
		");
		$stmt->execute(array($u_nome, $u_email, $u_telemovel, $u_date, $u_name));
		
		$stmt2 = $conn->prepare("
			UPDATE morada SET rua = ?, CP2 = ?, idCidade = (SELECT id FROM cidade WHERE cidade.nome = ?)
			WHERE idUser = (SELECT id FROM utilizador WHERE username = ?)
		");
		$stmt2->execute(array($m_rua, $m_cp2, $c_nome, $u_name));
		
		return true;
	}
	
	function updateUserPassword($old_p, $new_p, $u_name) {
		global $conn;
		$checker = isUserLoginCorrect($u_name, $old_p);
		
		if($checker) {
			$stmt = $conn->prepare("
				UPDATE utilizador SET password = ? WHERE  username = ?
			");
			$stmt->execute(array(crypt($new_p),$u_name));
			return true;
		}
		return false;
	}