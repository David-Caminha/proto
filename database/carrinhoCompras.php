<?php
function searchItems() {
        global $conn;
        $stmt = $conn->prepare("            
			SELECT itemEncomenda.id, itemEncomenda.quantidade, produto.nome, (itemEncomenda.quantidade*produto.preco) as total
			FROM itemEncomenda, produto
			WHERE produto.id = itemEncomenda.idProduto AND itemEncomenda.idCarrinho = (SELECT id FROM carrinhoCompras WHERE idUser = 1 AND estado = FALSE)");
        $stmt->execute();
        return $stmt->fetchAll();
    }

	function removeItem($value, $id) {
		global $conn;
		
		$stmtVerify = $conn->prepare("
			SELECT id FROM itemEncomenda WHERE itemEncomenda.id = (?) AND itemEncomenda.idUser = ?
			");
		$stmtVerify->execute(array($value, $id));
		$item = $stmtVerify->fetch();
		
		if(!empty($item)) {
			$stmtRemove = $conn->prepare("
			DELETE FROM itemEncomenda WHERE itemEncomenda.id = (?) AND itemEncomenda.idUser = ?
			");
			$stmtRemove->execute(array($value, $id));
			
			return true;
		}
		
		return false;
	}