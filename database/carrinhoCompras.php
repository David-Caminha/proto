<?php
	function searchItems($usernameU) {
        global $conn;
        $stmt = $conn->prepare("            
			SELECT itemEncomenda.idcarrinho, itemEncomenda.idproduto, itemEncomenda.quantidade, produto.nome, (itemEncomenda.quantidade*produto.preco) as total
			FROM itemEncomenda, produto
			WHERE produto.id = itemEncomenda.idProduto AND itemEncomenda.idCarrinho = (SELECT id FROM carrinhoCompras WHERE idUser = (SELECT id FROM utilizador WHERE username = ?) AND estado = FALSE)");
        $stmt->execute(array($usernameU));
        return $stmt->fetchAll();
    }

	function removeItem($idC, $idP, $usernameU) {
		global $conn;
		
		$stmtVerify = $conn->prepare("
			SELECT * FROM itemEncomenda WHERE itemEncomenda.idCarrinho = ? AND itemEncomenda.idProduto = ? AND ? = (SELECT username FROM utilizador WHERE id = (SELECT idUser FROM carrinhoCompras WHERE id =?))
			");
		$stmtVerify->execute(array($idC, $idP, $usernameU, $idC));
		$item = $stmtVerify->fetchALL();
		
		if(!empty($item)) {
			$stmtRemove = $conn->prepare("
			DELETE FROM itemEncomenda WHERE itemEncomenda.idCarrinho = ? AND itemEncomenda.idProduto = ? AND ? = (SELECT username FROM utilizador WHERE id = (SELECT idUser FROM carrinhoCompras WHERE id =?))
			");
			$stmtRemove->execute(array($idC, $idP, $usernameU, $idC));
			
			return true;
		}
		
		return false;
	}
	
	function alterQuantity($new_q, $u_name, $p_id) {
		global $conn;
		$stmt = $conn->prepare("
			UPDATE itemEncomenda 
			SET quantidade = ? 
			WHERE itemEncomenda.idCarrinho = (SELECT id FROM carrinhoCompras WHERE estado=FALSE AND 
			carrinhoCompras.idUser = (SELECT id FROM utilizador WHERE username = ?)) AND
			itemEncomenda.idProduto = ?
		");
		$stmt->execute(array($new_q, $u_name, $p_id));
		return true;
		
	}
	
	function checkout($u_name) {
		global $conn;
		$stmtTotal = $conn->prepare("
			SELECT carrinhoCompras.total 
			FROM carrinhoCompras 
			WHERE carrinhoCompras.estado = FALSE AND
			carrinhoCompras.idUser = (SELECT id FROM utilizador WHERE username = ?)
		");
		$stmtTotal->execute(array($u_name));
		$total = $stmtTotal->fetchALL();
		if($total[0]['total'] != 0)
		{
		
			$stmtInfo = $conn->prepare("
				SELECT itemEncomenda.idProduto, itemEncomenda.quantidade
				FROM itemEncomenda, carrinhoCompras 
				WHERE itemEncomenda.idCarrinho = carrinhoCompras.id AND
				carrinhoCompras.estado = FALSE AND
				carrinhoCompras.idUser = (SELECT id FROM utilizador WHERE username = ?) 
			");
			$stmtInfo->execute(array($u_name));
			$Info = $stmtInfo->fetchALL();
			foreach($Info as $p) {
				$stmtStock = $conn->prepare("
				UPDATE produto SET stock = (stock - ?) WHERE produto.id = ?
				");
				$stmtStock->execute(array($p->quantidade, $p->idProduto));
			}
			$stmt = $conn->prepare("
				UPDATE carrinhoCompras SET estado = TRUE WHERE idUser = (SELECT id FROM utilizador WHERE username = ?)
			");
			$stmt->execute(array($u_name));
			$stmtPayout = $conn->prepare("
				INSERT INTO pagamento (datapagamento, iduser) VALUES ( CURRENT_DATE , (SELECT id FROM utilizador WHERE username = ?))
			");
			$stmtPayout->execute(array($u_name));
			return true;
		}
		return false;
	}