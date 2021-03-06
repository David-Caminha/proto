<?php
    function banirUser($idUser, $admin) {
        $tipo = getTipo($admin);
        if($tipo == 1 || $tipo == 2)
        {    
            global $conn;
			$stmt = $conn->prepare("
				UPDATE utilizador
                SET tipo = 3
                WHERE utilizador.id = ?
			");
			$stmt->execute(array($idUser));
            return true;
        }
        else
            return false;
    }

    function reporUser($idUser, $admin) {
        $tipo = getTipo($admin);
        if($tipo == 1 || $tipo == 2)
        {
            global $conn;
			$stmt = $conn->prepare("
				UPDATE utilizador
                SET tipo = 0
                WHERE utilizador.id = ?
			");
			$stmt->execute(array($idUser));
            return true;
        }
        else
            return false;
    }

    function getPaises() {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                            FROM pais");
        $stmt->execute();
        return $stmt->fetchALL();
    }

    function cidadesPertencentes($country) {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                            FROM cidade 
                            WHERE nomepais = ?");
        $stmt->execute(array($country));
        return $stmt->fetchALL();
    }

    function cpsPertencentes($city) {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                            FROM cidade 
                            WHERE nome = ?");
        $stmt->execute(array($city));
        return $stmt->fetchALL();
    }

    function usernameExists($username) {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                            FROM utilizador 
                            WHERE username = ?");
        $stmt->execute(array($username));
        return $stmt->fetch() == true;
    }

    function createUser($username, $password, $email, $birthDate, $realname, $phone, $address, $cp1, $cp2) {
        global $conn;
		
		$stmtVerify = $conn->prepare("
			SELECT * 
			FROM utilizador
			WHERE username= ?
		");
		$stmtVerify->execute(array($username));
		$checker = $stmtVerify->fetchALL();
		
		if(empty($checker)) {
			$stmtUser = $conn->prepare("
				INSERT INTO utilizador (username, password, datanascimento, nome, email, telemovel)
				VALUES (?, ?, ?, ?, ?, ?)
                RETURNING id");
			$stmtUser->execute(array($username, crypt($password), $birthDate, $realname, $email, $phone));
            $result = $stmtUser->fetch(PDO::FETCH_ASSOC);
			$stmtAddr = $conn->prepare("
				INSERT INTO morada (rua, cp2, idUser, idCidade)
				VALUES (?, ?, ?, ?)");
			$stmtAddr->execute(array($address, $cp2, $result['id'], $cp1));
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
                            WHERE username = ?
							AND tipo <> 3");
        $stmt->execute(array($username));
        $stmt->bindColumn(1, $pass);
        if($stmt->fetch())
            return ($pass == crypt($password, $pass));
        else
            return false;
    }

    function isSupplierLoginCorrect($username, $password) {
        global $conn;
        $stmt = $conn->prepare("SELECT password 
                            FROM fornecedor 
                            WHERE nome = ?");
        $stmt->execute(array($username));
        $stmt->bindColumn(1, $pass);
        if($stmt->fetch())
            return ($pass == crypt($password, $pass));
        else
            return false;
    }

    function getFornecedores() {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                            FROM fornecedor WHERE removido = FALSE
							ORDER BY aceite");
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
	
	function getUtilizadores() {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                            FROM utilizador
                            WHERE tipo = 0
                            ORDER BY username ASC");
        $stmt->execute();
        return $stmt->fetchALL();
    }
	
	function getUtilizadoresBanidos() {
        global $conn;
        $stmt = $conn->prepare("SELECT * 
                            FROM utilizador
                            WHERE tipo = 3
                            ORDER BY username ASC");
        $stmt->execute();
        return $stmt->fetchALL();
    }
	
	function promoverUtilizador($u_id, $owner) {
		global $conn;
		if($owner) {
			$stmt = $conn->prepare("
				UPDATE utilizador SET tipo = 1 WHERE utilizador.id = ?
			");
			$stmt->execute(array($u_id));
			return true;
		}
		return false;
	}
	
	function despromoverAdmin($a_id, $owner) {
		global $conn;
		if($owner) {
			$stmt = $conn->prepare("
				UPDATE utilizador SET tipo = 0 WHERE utilizador.id = ?
			");
			$stmt->execute(array($a_id));
			return true;
		}
		return false;
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
			SELECT utilizador.username, utilizador.nome, utilizador.email, utilizador.telemovel, utilizador.dataNascimento, utilizador.tipo, morada.rua, morada.CP2, cidade.CP1, cidade.nome as nome_cidade, cidade.nomePais
			FROM utilizador, morada, cidade
			WHERE utilizador.id = morada.idUser AND
			morada.idCidade = cidade.id AND
			utilizador.username = ?
		");
		$stmt->execute(array($u_name));
		return $stmt->fetchALL();
	}
	
	function getSupplierInfo($f_name) {
		global $conn;
		$stmt = $conn->prepare("
			SELECT * FROM fornecedor WHERE fornecedor.nome = ?
			
		");
		$stmt->execute(array($f_name));
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
	
	function updateSupplierInfo($f_email, $f_telemovel, $f_responsavel, $f_name) {
		global $conn;
		$stmt = $conn->prepare("
			UPDATE fornecedor SET email = ?, telemovel = ?, responsavel = ?
			WHERE id = (SELECT id FROM fornecedor WHERE nome = ?)
		");
		$stmt->execute(array($f_email, $f_telemovel, $f_responsavel, $f_name));
		
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
	
	function updateSupplierPassword($old_p, $new_p, $f_name) {
		global $conn;
		$checker = isSupplierLoginCorrect($f_name, $old_p);
		
		if($checker) {
			$stmt = $conn->prepare("
				UPDATE fornecedor SET password = ? WHERE  nome = ?
			");
			$stmt->execute(array(crypt($new_p),$f_name));
			return true;
		}
		return false;
	}
	
	function getNumberOfProducts($f_nome) {
			global $conn;
			$stmt = $conn->prepare("
				SELECT COUNT(produto.id) AS qtd
				FROM produto, fornecedor
				WHERE produto.idFornecedor = fornecedor.id AND
				produto.aceite = TRUE AND
				produto.removido = FALSE AND
				fornecedor.nome = ?
			");
			$stmt->execute(array($f_nome));
			return $stmt->fetchALL();
	}
	
	function getNumberOfNewProducts(){
		global $conn;
		$stmt = $conn->prepare("
			SELECT COUNT(produto.id) AS qtd
			FROM produto
			WHERE aceite = FALSE AND
			removido = FALSE
		");
		$stmt->execute();
		return $stmt->fetchALL();
	}
	
	function getNewProducts(){
		global $conn;
		$stmt = $conn->prepare("
			SELECT produto.id, produto.nome, produto.preco, fornecedor.nome AS fornecedor, marca.nome AS marca, produto.tipo 
			FROM produto, fornecedor, marca
			WHERE produto.idFornecedor = fornecedor.id AND
			marca.id = produto.idMarca AND
			produto.aceite = FALSE AND
			produto.removido = FALSE
		");
		$stmt->execute();
		return $stmt->fetchALL();
	}
	
	function aceitarFornecedor($f_id, $owner) {
		global $conn;
		if($owner) {
			$stmt = $conn->prepare("
				UPDATE fornecedor SET aceite = TRUE WHERE fornecedor.id = ?
			");
			$stmt->execute(array($f_id));
			return true;
			}
		return false;
	}
	
	function recusarFornecedor($f_id, $owner) {
		global $conn;
		if($owner) {
			$stmt = $conn->prepare("
				UPDATE fornecedor SET removido = TRUE WHERE fornecedor.id = ?
			");
			$stmt->execute(array($f_id));
			
			$stmtUpdate = $conn->prepare("
				UPDATE produto SET removido = FALSE WHERE produto.idFornecedor = ?
			");
			$stmtUpdate->execute(array($f_id));
			return true;
		}
		return false;
	}
	
	function aprovarProd($p_id, $owner){
		global $conn;
		if($owner) {
			$stmt = $conn->prepare("
				UPDATE produto SET aceite = TRUE WHERE produto.id = ?
			");
			$stmt->execute(array($p_id));
			$stmtGet = $conn->prepare("
				SELECT tipo FROM produto WHERE produto.id = ?
			");
			$stmtGet->execute(array($p_id));
			$tipo = $stmtGet->fetchALL();
			if($tipo[0]['tipo'] == 'laptop') {
				$stmtInsert = $conn->prepare("
					INSERT INTO laptop (idProduto) VALUES (?)
				");
				$stmtInsert->execute(array($p_id));
			} elseif($tipo[0]['tipo'] == 'desktop') {
				$stmtInsert = $conn->prepare("
					INSERT INTO desktop (idProduto) VALUES (?)
				");
				$stmtInsert->execute(array($p_id));
			} elseif($tipo[0]['tipo'] == 'periferico') {
				$stmtInsert = $conn->prepare("
					INSERT INTO periferico (idProduto) VALUES (?)
				");
				$stmtInsert->execute(array($p_id));
			} elseif($tipo[0]['tipo'] == 'cabo') {
				$stmtInsert = $conn->prepare("
					INSERT INTO cabo (idProduto) VALUES (?)
				");
				$stmtInsert->execute(array($p_id));
			}
			return true;
			}
		return false;
	}
	
	function rejeitarProd($p_id, $owner){
		global $conn;
		if($owner) {
			$stmt = $conn->prepare("
				UPDATE produto SET removido = TRUE WHERE produto.id = ?
			");
			$stmt->execute(array($p_id));
			return true;
		}
		return false;
	}
	
	function insertBrand($b_name){
		global $conn;
		$stmt = $conn->prepare("
			INSERT INTO marca (nome) VALUES (?)
		");
		$stmt->execute(array($b_name));
		return true;
	}
	
	function killShopCart($u_name){
		global $conn;
		$stmtIE = $conn->prepare("
			DELETE FROM itemEncomenda WHERE idCarrinho = (SELECT id FROM carrinhoCompras WHERE estado = FALSE AND idUser = (SELECT id FROM utilizador WHERE username = ?))
		");
		$stmtIE->execute(array($u_name));
		$stmtCart = $conn->prepare("
			DELETE FROM carrinhoCompras WHERE idUser = (SELECT id FROM utilizador WHERE username = ?) AND estado = FALSE
		");
		$stmtCart->execute(array($u_name));
		return true;
	}