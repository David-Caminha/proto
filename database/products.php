<?php
    function getRecentementeVendidos() {
        global $conn;
        $stmt = $conn->prepare("
            SELECT Produto.nome, Produto.preco, Produto.caminhoImagem 
            FROM Produto, carrinhoCompras, encomendaItem 
            WHERE carrinhoCompras.id = encomendaItem.idCarrinho
            AND Produto.id = encomendaItem.idProduto 
            ORDER by carrinhoCompras.id DESC 
            LIMIT 4");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getMaisVendidos() {
        global $conn;
        $stmt = $conn->prepare("
            SELECT Produto.nome, Produto.preco, Produto.caminhoImagem, SUM(encomenda_item.quantidade) as quantidade
            FROM Produto, encomendaItem 
            WHERE Produto.id = encomendaItem.idProduto 
            GROUP by Produto.id
            ORDER by Quantidade DESC 
            LIMIT 4");
        $stmt->execute();
        return $stmt->fetchAll();
    }
?>