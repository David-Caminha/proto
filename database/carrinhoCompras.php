<?php
function searchItems() {
        global $conn;
        $stmt = $conn->prepare("            
			SELECT itemEncomenda.quantidade, produto.nome, (itemEncomenda.quantidade*produto.preco) as total
			FROM itemEncomenda, produto
			WHERE produto.id = itemEncomenda.idProduto AND itemEncomenda.idCarrinho = (SELECT id FROM carrinhoCompras WHERE idUser = 1 AND estado = FALSE;");
        $stmt->execute();
        return $stmt->fetchAll();
    }
