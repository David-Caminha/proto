{include file='common/header.tpl'}
<link rel="stylesheet" href="{$BASE_URL}css/Style_carrinho.css"/>
<section id="">
	<h2>Carrinho de Compras</h2>
	<table class="table table-striped">
		<tr>
			<td><b>Produto</b></td>
			<td><b>Quantidade</b></td>
			<td><b>Total</b></td>
			<td><b>idCarrinho</b></td>
			<td><b>idProduto</b></td>
		</tr>
		{foreach $Result as $itemEncomenda}
		<tr>
			<td>{$itemEncomenda.nome}</td>
			<td>{$itemEncomenda.quantidade}</td>
			<td>{$itemEncomenda.total}</td>
			<td>{$itemEncomenda.idCarrinho}</td>
			<td>{$itemEncomenda.idProduto}</td>
			<td><a href="?idCarrinho={$itemEncomenda.idCarrinho}&idProduto={$itemEncomenda.idProduto}"><button type="button" >Remover</button></a></td> 
		</tr>
		{/foreach}
	</table>
	<button type="button">Finalizar Compra</button>
	
</section>
{include file='common/footer.tpl'}