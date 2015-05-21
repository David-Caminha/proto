<?php
    function getRecentementeVendidos() {
        global $conn;
        $stmt = $conn->prepare("
            SELECT Produto.nome, Produto.preco, Produto.caminhoImagem 
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
            SELECT Produto.nome, Produto.preco, Produto.caminhoImagem, SUM(itemEncomenda.quantidade) as quantidade
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
            WHERE UPPER(nome) LIKE upper(?)
            OR UPPER(descricao) LIKE upper(?)
            LIMIT 8");
        $stmt->execute(array('%'.$value.'%', '%'.$value.'%'));
        return $stmt->fetchAll();
    }

	//adicionei daqui para baixo
	
	function addItem($p_id, $u_id) {
		global $conn;
		$stmt = $conn->prepare("
			INSERT INTO itemEncomenda (quantidade, idCarrinho, idProduto) VALUES (1, (SELECT id FROM carrinhoCompras WHERE idUser = ? AND estado = FALSE), ?)
		");
		$stmt->execute(array($p_id, $u_id)
		return true;
	}