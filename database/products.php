<?php
//nao esquecer de adicionar condicao estado = true
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

    function getSearchresult($value, $filter) {
        
		if($filter == 'asc_price') {
			$asc = asc_price_search($value);
			return $asc;
		} elseif ($filter == 'desc_price') {
			$desc = desc_price_search($value);
			return $desc;
		} elseif ($filter == 'best_rate') {
			$rate = rate_search($value);
			return $rate;
		} elseif ($filter == 'recent') {
			$rec = recent_search($value);
			return $rec;
		} else {
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
    }
	
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
			$stmtInsert->fetchALL();
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
			echo "<script type='text/javascript'>alert('Ja adicionou esse item ao seu carrinho!');</script>";
		
		}
		return false;
	}
	
	function asc_price_search($value) {
		global $conn;
		$stmt = $conn->prepare("
			SELECT Produto.id, Produto.nome, Produto.preco, Produto.caminhoImagem 
			FROM Produto
			WHERE UPPER(Produto.nome) LIKE UPPER(?)
			OR UPPER(Produto.descricao) LIKE UPPER(?)
			ORDER BY Produto.preco ASC
			LIMIT 8
		");
		$stmt->execute(array('%'.$value.'%', '%'.$value.'%'));
		return $stmt->fetchALL();
	}
	
	function desc_price_search($value) {
		global $conn;
		$stmt = $conn->prepare("
			SELECT Produto.id, Produto.nome, Produto.preco, Produto.caminhoImagem 
			FROM Produto
			WHERE UPPER(Produto.nome) LIKE UPPER(?)
			OR UPPER(Produto.descricao) LIKE UPPER(?)
			ORDER BY Produto.preco DESC
			LIMIT 8
		");
		$stmt->execute(array('%'.$value.'%', '%'.$value.'%'));
		return $stmt->fetchALL();
	}
	
	function rate_search() {
		global $conn;
		$stmt = $conn->prepare("
			SELECT Produto.id, Produto.nome, Produto.preco, Produto.caminhoImagem, AVG(classificacao.valor) AS rate
			FROM Produto, classificacao
			WHERE Produto.id = classificacao.idProduto
			AND(UPPER(Produto.nome) LIKE UPPER(?)
			OR UPPER(Produto.descricao) LIKE UPPER(?))
			GROUP BY Produto.id
			ORDER BY rate DESC
			LIMIT 8
		");
		$stmt->execute(array('%'.$value.'%', '%'.$value.'%'));
		return $stmt->fetchALL();
	}
	
	function recent_search() {
		global $conn;
		$stmt = $conn->prepare("
			SELECT Produto.id, Produto.nome, Produto.preco, Produto.caminhoImagem 
			FROM Produto
			WHERE UPPER(Produto.nome) LIKE UPPER(?)
			OR UPPER(Produto.descricao) LIKE UPPER(?)
			ORDER BY Produto.id DESC
			LIMIT 8
		");
		$stmt->execute(array('%'.$value.'%', '%'.$value.'%'));
		return $stmt->fetchALL();
	}

	function populate_product_comment($p_id) {
		global $conn;
		$stmt = $conn->prepare("
			SELECT produto.nome, produto.descricao, produto.preco, comentario.texto, utilizador.username
			FROM comentario, utilizador, produto
			WHERE comentario.idUser = utilizador.id AND
			comentario.idProduto = ? AND
			produto.id = ?
		");
		$stmt->execute(array($p_id, $p_id));
		return $stmt->fetchALL();
	}
	
	function populate_product_info($p_id) {
		global $conn;
		$stmt = $conn->prepare("
			SELECT produto.id, produto.nome, produto.descricao, produto.preco, fornecedor.nome AS f_nome
			FROM produto, fornecedor
			WHERE fornecedor.id = produto.idFornecedor AND
			produto.id = ? 
		");
		$stmt->execute(array($p_id));
		return $stmt->fetchALL();
	}
	
	function also_bought($p_id) {
		global $conn;
		$stmt = $conn->prepare("
			SELECT produto.nome, produto.preco, SUM(itemEncomenda.quantidade) as quantidade
			FROM produto, utilizador, itemEncomenda, carrinhoCompras
			WHERE utilizador.id IN (
			SELECT carrinhoCompras.idUser 
			FROM itemEncomenda, carrinhoCompras
			WHERE itemEncomenda.idCarrinho = carrinhoCompras.id AND
			itemEncomenda.idProduto = ?) AND
			itemEncomenda.idCarrinho = carrinhoCompras.id AND
			itemEncomenda.idProduto <> ? AND
			itemEncomenda.idProduto = produto.id
			GROUP BY produto.id
			ORDER BY quantidade DESC
			LIMIT 4
		");
		$stmt->execute(array($p_id,$p_id));
		return $stmt->fetchALL();
	}
	
	function insertComment($u_name, $comment, $p_id) {
		global $conn;
		$stmt = $conn->prepare("
			INSERT INTO comentario (idUser, idProduto, texto) VALUES ((SELECT id FROM utilizador WHERE username = ?), ?, ?)
		");
		$stmt->execute(array($u_name, $p_id, $comment));
		echo "<script type='text/javascript'>alert('O seu comentário foi inserido com sucesso!');</script>"
		return true;
	}