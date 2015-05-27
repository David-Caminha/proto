<?php
    function getRecentementeVendidos() {
        global $conn;
        $stmt = $conn->prepare("
            SELECT Produto.nome, Produto.preco, Produto.caminhoImagem, Produto.id 
            FROM Produto, carrinhoCompras, itemEncomenda 
            WHERE carrinhoCompras.id = itemEncomenda.idCarrinho
            AND Produto.id = itemEncomenda.idProduto 
            ORDER by carrinhoCompras.id DESC 
            LIMIT 4");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getMaisVendidos() {
        global $conn;
        $stmt = $conn->prepare("
            SELECT Produto.id, Produto.nome, Produto.preco, Produto.caminhoImagem, SUM(itemEncomenda.quantidade) as quantidade
            FROM Produto, itemEncomenda 
            WHERE Produto.id = itemEncomenda.idProduto 
            GROUP by Produto.id
            ORDER by Quantidade DESC 
            LIMIT 4");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getSearchresult($value) {
        global $conn;
        $stmt = $conn->prepare("
            SELECT Produto.id, Produto.nome, Produto.preco, Produto.caminhoImagem 
            FROM Produto
            WHERE UPPER(nome) LIKE UPPER(?)
            OR UPPER(descricao) LIKE UPPER(?)
            LIMIT 8");
        $stmt->execute(array('%'.$value.'%', '%'.$value.'%'));
        return $stmt->fetchAll();
    }

	//adicionei daqui para baixo
	
	function addItem($qtd, $p_id, $u_username) {
		global $conn;
		
		$stmtVER = $conn->prepare("
			SELECT * FROM carrinhoCompras WHERE idUser = (SELECT id FROM utilizador WHERE username = ?)
			");
		$stmtVER->execute(array($u_username));
		$exists = $stmtVER->fetchALL();
		//se n?o existir nenhum carrinho para esse utilizador, cria-o
		if(empty($exists)) {
			$stmtInsert = $conn->prepare("
				INSERT INTO carrinhoCompras (idUser) VALUES ((SELECT id FROM utilizador WHERE username = ?))
				");
			$stmtInsert->execute(array($u_username));
			
			$stmt1 = $conn->prepare("
				INSERT INTO itemEncomenda (quantidade, idCarrinho, idProduto) VALUES (?, (SELECT id FROM carrinhoCompras WHERE idUser = (SELECT id FROM utilizador WHERE username = ?) AND estado = FALSE), ?)
			");
			$stmt1->execute(array($qtd, $u_username, $p_id));
			echo "<script type='text/javascript'>alert('O item foi adicionado ao seu Carrinho de Compras com sucesso!');</script>";
			return true;
		}
		else
		{
			//verifica se existe algum itemEncomenda nesse carrinho para o mesmo produto.
			$stmtVerify = $conn->prepare(" 
				SELECT * FROM itemEncomenda WHERE itemEncomenda.idCarrinho = (SELECT id FROM carrinhoCompras WHERE idUser = (SELECT id FROM utilizador WHERE username = ?) AND estado = FALSE) AND itemEncomenda.idProduto = ? 
				");
			$stmtVerify->execute(array($u_username, $p_id));
			$item = $stmtVerify->fetchALL();
			
			if(empty($item)) {
				$stmt = $conn->prepare("
					INSERT INTO itemEncomenda (quantidade, idCarrinho, idProduto) VALUES (?, (SELECT id FROM carrinhoCompras WHERE idUser = (SELECT id FROM utilizador WHERE username = ?) AND estado = FALSE), ?)
				");
				$stmt->execute(array($qtd, $u_username, $p_id));
				echo "<script type='text/javascript'>alert('O item foi adicionado ao seu Carrinho de Compras com sucesso!');</script>";
				return true;
			}
			echo "<script type='text/javascript'>alert('J? adicionou esse item ao seu carrinho!');</script>";
		
		}
		return false;
	}