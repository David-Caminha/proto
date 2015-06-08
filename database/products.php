<?php
    function hasVoted($username, $idProd) {
        global $conn;
        $stmt = $conn->prepare("
            SELECT idUser
            FROM classificacao 
            WHERE idUser = (SELECT id FROM utilizador WHERE username = ?)
            AND idProduto = ?");
        $stmt->execute(array($username, $idProd));
        $checker = $stmt->fetchAll();
        if(empty($checker))
            return false;
        else
            return true;
    }

    function vote($username, $idProduct, $value) {
		global $conn;
		$stmt = $conn->prepare("
			INSERT INTO classificacao (idUser, idProduto, valor) VALUES ((SELECT id FROM utilizador WHERE username = ?), ?, ?)
		");
		$stmt->execute(array($username, $idProduct, $value));
    }

    function getVotes($idProduct) {
        global $conn;
        $stmt = $conn->prepare("
            SELECT AVG(valor) as value
            FROM classificacao 
            WHERE idProduto = ?");
        $stmt->execute(array($idProduct));
        return $stmt->fetchAll();
    }

    function removeComment($id) {
        global $conn;
        $stmt = $conn->prepare("
            DELETE FROM comentario
            WHERE id = ?");
        $stmt->execute(array($id));
    }

    function getRecentementeVendidos() {
        global $conn;
        $stmt = $conn->prepare("
            SELECT Produto.nome, Produto.preco, Produto.caminhoImagem, Produto.id 
            FROM Produto, carrinhoCompras, itemEncomenda 
            WHERE carrinhoCompras.id = itemEncomenda.idCarrinho
            AND Produto.id = itemEncomenda.idProduto AND
			carrinhoCompras.estado = TRUE
            ORDER by carrinhoCompras.id DESC 
            LIMIT 4");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getMaisVendidos() {
        global $conn;
        $stmt = $conn->prepare("
            SELECT Produto.id, Produto.nome, Produto.preco, Produto.caminhoImagem, SUM(itemEncomenda.quantidade) as quantidade
            FROM Produto, itemEncomenda, carrinhoCompras
            WHERE Produto.id = itemEncomenda.idProduto AND
			carrinhoCompras.id = itemEncomenda.idCarrinho AND
			carrinhoCompras.estado = TRUE
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
			SELECT * FROM carrinhoCompras WHERE idUser = (SELECT id FROM utilizador WHERE username = ?) AND estado = FALSE
			");
		$stmtVER->execute(array($u_username));
		$exists = $stmtVER->fetchALL();

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
			SELECT comentario.texto, utilizador.username, comentario.id
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
			SELECT produto.id, produto.nome, produto.descricao, produto.preco, fornecedor.nome AS f_nome, produto.caminhoImagem, produto.fichaTecnica, produto.idMarca, produto.tipo
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
			SELECT produto.nome, produto.preco, produto.id, SUM(itemEncomenda.quantidade) as quantidade, produto.caminhoimagem
			FROM produto, utilizador, itemEncomenda, carrinhoCompras
			WHERE utilizador.id IN (
			SELECT carrinhoCompras.idUser 
			FROM itemEncomenda, carrinhoCompras
			WHERE itemEncomenda.idCarrinho = carrinhoCompras.id AND
			itemEncomenda.idProduto = ?) AND
			itemEncomenda.idCarrinho = carrinhoCompras.id AND
			carrinhoCompras.estado = TRUE AND
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
		return true;
	}
	
	function getFavourites($u_name) {
		global $conn;
		$stmt = $conn->prepare("
			SELECT produto.id, produto.nome 
			FROM produto, favorito, utilizador 
			WHERE favorito.idUser = utilizador.id AND
			favorito.idProduto = produto.id AND
			utilizador.username = ?
		");
		$stmt->execute(array($u_name));
		return $stmt->fetchALL();
	}
	
	function removeFav($u_name, $p_id) {
		global $conn;
		$item = checkFav($p_id, $u_name);
		
		if(!empty($item)) {
			$stmt = $conn->prepare("
				DELETE FROM favorito WHERE favorito.idProduto = ? AND favorito.idUser = (SELECT id FROM utilizador WHERE username = ?)
			");
			
			$stmt->execute(array($p_id, $u_name));
			return true;
		}
		return false;
	}
	
	function checkFav($p_id, $u_name) {
		global $conn;
		$stmt = $conn->prepare("
			SELECT * 
			FROM favorito 
			WHERE favorito.idProduto = ? 
			AND favorito.idUser = (SELECT id FROM utilizador WHERE username = ?)
			");
		$stmt->execute(array($p_id, $u_name));
		return $stmt->fetchALL();
	}
	
	function addFav($p_id, $u_name) {
		global $conn;
		$item = checkFav($p_id, $u_name);
		
		if(empty($item)) {
			$stmt = $conn->prepare("
				INSERT INTO favorito (idUser, idProduto) VALUES ((SELECT id FROM utilizador WHERE username = ?),?)
			");
			$stmt->execute(array($u_name, $p_id));
			return true;
		}
		return false;
	}
	
	function getProductsSupplier($f_name) {
		global $conn;
		$stmt = $conn->prepare("
			SELECT produto.id, produto.nome AS pnome, produto.stock, 0 as vendas
			FROM produto, fornecedor
			WHERE fornecedor.id = produto.idFornecedor AND
			produto.aceite = TRUE AND
			produto.removido = FALSE AND
			fornecedor.id = (SELECT id FROM fornecedor WHERE fornecedor.nome = ?)
			GROUP BY produto.id 
		");
		$stmt->execute(array($f_name));
		return $stmt->fetchALL();
	}
	
	function getSupplierProductsBought($f_name) {
		global $conn;
		$stmt = $conn->prepare("
			SELECT produto.nome, SUM(itemEncomenda.quantidade) AS valor 
			FROM produto, fornecedor, itemEncomenda, carrinhoCompras
			WHERE itemEncomenda.idProduto = produto.id AND
			produto.idFornecedor = fornecedor.id AND
			itemEncomenda.idCarrinho = carrinhoCompras.id AND
			carrinhoCompras.estado = TRUE AND
			produto.aceite = TRUE AND
			produto.removido = FALSE AND
			fornecedor.id = (SELECT id FROM fornecedor WHERE nome = ?)
			GROUP BY produto.id
		");
		$stmt->execute(array($f_name));
		return $stmt->fetchALL();
	}
	
	function updatePath($id, $path) {
		global $conn;
		$stmt = $conn->prepare("
			UPDATE produto 
			SET caminhoimagem = ? 
			WHERE id = ?
			");
		$stmt->execute(array($path, $id));
		$stmt->fetch();
    }
	
	function addStock($p_id, $p_stock, $f_name) {
		global $conn;
		$checker = $conn->prepare("
			SELECT * FROM produto WHERE produto.id = ? AND produto.idFornecedor = (SELECT id FROM fornecedor WHERE nome = ?)
		");
		$checker->execute(array($p_id, $f_name));
		$items = $checker->fetchALL();
		
		if(!empty($items)) {
			$stmt = $conn->prepare("
				UPDATE produto 
				SET stock = (stock + ?)
				WHERE id = ?
			");
			$stmt->execute(array($p_stock, $p_id));
			return true;
		}
		return false;
	}
	
	function newProduct($f_name, $p_nome, $p_price, $p_description, $p_stock, $p_techdetails, $p_brand, $p_tipo, $p_imageurl) {
		global $conn;
		$stmt = $conn->prepare("
			INSERT INTO produto (idFornecedor, nome, preco, descricao, stock, fichaTecnica, idMarca, tipo, caminhoImagem) VALUES 
			((SELECT id FROM fornecedor WHERE nome = ?), ?, ?, ?, ?, ?, (SELECT id FROM marca WHERE nome = ?), ?, ?)
		");
		$stmt->execute(array($f_name, $p_nome, $p_price, $p_description, $p_stock, $p_techdetails, $p_brand, $p_tipo, $p_imageurl));
		return true;
	}
	
	function getBrands() {
		global $conn;
		$stmt = $conn->prepare("
			SELECT id, nome FROM marca
		");
		$stmt->execute();
		return $stmt->fetchALL();
	}
	
	function editProduct($f_name, $p_nome, $p_price, $p_description, $p_techdetails, $p_brand, $p_tipo, $p_id) {
		global $conn;
		$stmtVerify = $conn->prepare("
			SELECT * FROM produto WHERE produto.id = ? AND produto.idFornecedor = (SELECT id FROM fornecedor WHERE nome = ?)
		");
		$stmtVerify->execute(array($p_id, $f_name));
		$checker = $stmtVerify->fetchALL();
		
		if(!empty($checker)) {
			$stmt = $conn->prepare("
				UPDATE produto 
				SET nome = ?, preco = ?, descricao = ?, fichaTecnica = ?, idMarca = (SELECT id FROM marca WHERE nome = ?), tipo = ?
				WHERE produto.id = ?
			");
			$stmt->execute(array($p_nome, $p_price, $p_description, $p_techdetails, $p_brand, $p_tipo, $p_id));
			return true;
		} 
		return false;
	}
	
	function killProduct($p_id, $f_name) {
		global $conn;
		$stmtVerify = $conn->prepare("
			SELECT * FROM produto WHERE produto.id = ? AND produto.idFornecedor = (SELECT id FROM fornecedor WHERE nome = ?)
		");
		$stmtVerify->execute(array($p_id, $f_name));
		$checker = $stmtVerify->fetchALL();
		
		if(!empty($checker)) {
			$stmt = $conn->prepare("
				UPDATE produto SET removido = TRUE WHERE produto.id = ?
			");
			$stmt->execute(array($p_id));
			return true;
		}
		return false;
	}
	
	function getLastId() {
		global $conn;
		$stmt = $conn->prepare("
			SELECT id FROM produto 
			ORDER BY id DESC
			LIMIT 1
		");
		$stmt->execute();
		return $stmt->fetchALL();
	}