<?php
function searchItems() {
        global $conn;
        $stmt = $conn->prepare("            
			SELECT itemEncomenda.idCarrinho, itemEncomenda.idProduto, itemEncomenda.quantidade, produto.nome, (itemEncomenda.quantidade*produto.preco) as total
			FROM itemEncomenda, produto
			WHERE produto.id = itemEncomenda.idProduto AND itemEncomenda.idCarrinho = (SELECT id FROM carrinhoCompras WHERE idUser = 1 AND estado = FALSE)");
        $stmt->execute();
        return $stmt->fetchAll();
    }

	function removeItem($idC, $idP, $idU) {
		global $conn;
		
		$stmtVerify = $conn->prepare("
			SELECT * FROM itemEncomenda WHERE itemEncomenda.idCarrinho = ? AND itemEncomenda.idProduto = ? AND itemEncomenda.idUser = ?
			");
		$stmtVerify->execute(array($idC, $idP, $idU));
		$item = $stmtVerify->fetch();
		
		if(!empty($item)) {
			$stmtRemove = $conn->prepare("
			DELETE FROM itemEncomenda WHERE itemEncomenda.idCarrinho = ? AND itemEncomenda.idProduto = ? AND itemEncomenda.idUser = ?
			");
			$stmtRemove->execute(array($idC, $idP, $idU));
			
			return true;
		}
		
		return false;
	}