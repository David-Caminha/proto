<?php
function searchItems($value) {
        global $conn;
        $stmt = $conn->prepare("            
			SELECT itemEncomenda.quantidade, produto.nome, (itemEncomenda.quantidade*produto.preco) as total
			FROM itemEncomenda, produto
			WHERE produto.id = itemEncomenda.idProduto AND itemEncomenda.idCarrinho = (?);")
        $stmt->execute('%'.$value);
        return $stmt->fetchAll();
    }
?>