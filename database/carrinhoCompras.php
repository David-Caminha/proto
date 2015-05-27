<?php
function searchItems() {
        global $conn;
        $stmt = $conn->prepare("            
			SELECT itemEncomenda.idcarrinho, itemEncomenda.idproduto, itemEncomenda.quantidade, produto.nome, (itemEncomenda.quantidade*produto.preco) as total
			FROM itemEncomenda, produto
			WHERE produto.id = itemEncomenda.idProduto AND itemEncomenda.idCarrinho = (SELECT id FROM carrinhoCompras WHERE idUser = 1 AND estado = FALSE)");
        $stmt->execute();
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