<?php
    function getRecentementeVendidos() {
        global $conn;
        $stmt = $conn->prepare("
            SELECT Produto.nome, Produto.preco, Produto.caminhoImagem 
            FROM Produto, Carrinho_de_Compras, Encomenda_Item 
            WHERE Carrinho_de_Compras.id = Encomenda_Item.idCarrinho
            AND Produto.id = Encomenda_Item.idProduto 
            ORDER by Carrinho_de_Compras.id DESC 
            LIMIT 4");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    function getMaisVendidos() {
        global $conn;
        $stmt = $conn->prepare("
            SELECT Produto.nome, Produto.preco, Produto.caminhoImagem, SUM(encomenda_item.quantidade) as quantidade
            FROM Produto, Encomenda_Item 
            WHERE Produto.id = Encomenda_Item.idProduto 
            GROUP by Produto.id
            ORDER by Quantidade DESC 
            LIMIT 4");
        $stmt->execute();
        return $stmt->fetchAll();
    }
?>