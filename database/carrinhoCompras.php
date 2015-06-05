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
			SET itemEncomenda.quantidade = ? 
			WHERE itemEncomenda.idUser = (SELECT id FROM utilizador WHERE username = ?) AND
			itemEncomenda.idProduto = ?
		");
		$stmt->execute(array($new_q, $u_name, $p_id));
		return true;
		
	}