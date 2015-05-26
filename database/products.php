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
            WHERE UPPER(nome) LIKE upper(?)
            OR UPPER(descricao) LIKE upper(?)
            LIMIT 8");
        $stmt->execute(array('%'.$value.'%', '%'.$value.'%'));
        return $stmt->fetchAll();
    }

	//adicionei daqui para baixo
	
	function addItem($qtd, $p_id, $u_id) {
		global $conn;
		//verifica se existe algum itemEncomenda nesse carrinho para o mesmo produto.
		$stmtVerify = $conn->prepare(" 
			SELECT * FROM itemEncomenda WHERE itemEncomenda.idCarrinho = (SELECT id FROM carrinhoCompras WHERE idUser = ? AND estado = FALSE) AND itemEncomenda.idProduto = ? 
			");
		$stmtVerify->execute(array($u_id, $p_id));
		$item = $stmtVerify->fetchALL();
		
		if(empty($item)) {
			$stmt = $conn->prepare("
				INSERT INTO itemEncomenda (quantidade, idCarrinho, idProduto) VALUES (?, (SELECT id FROM carrinhoCompras WHERE idUser = ? AND estado = FALSE), ?)
			");
			$stmt->execute(array($qtd, $u_id, $p_id));
			echo "<script type='text/javascript'>alert('O item foi adicionado ao seu Carrinho de Compras com sucesso!');</script>";
			return true;
		}
		echo "<script type='text/javascript'>alert('Já adicionou esse item ao seu carrinho!');</script>";
		return false;
	}