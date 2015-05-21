{include file='common/header.tpl'}
<link rel="stylesheet" href="{$BASE_URL}css/Style_carrinho.css"/>
<section id="">
	<h2>Carrinho de Compras</h2>
	<br />
	<h3>Items</h3>
	<table class="table table-striped">
		<tr>
			<td><b>Produto</b></td>
			<td><b>Quantidade</b></td>
			<td><b>Total</b></td>
		</tr>
		{foreach $Result as $itemEncomenda}
		<tr>
			<td>{$itemEncomenda.nome}</td>
			<td>{$itemEncomenda.quantidade}</td>
			<td>{$itemEncomenda.total}</td>
			<td><a href="?idC={$itemEncomenda.idcarrinho}&idP={$itemEncomenda.idproduto}"><button type="button" >Remover</button></a></td> 
		</tr>
		{/foreach}
	</table>
	<a href="#"><button type="button">Finalizar Compra</button></a>
	
</section>
{include file='common/footer.tpl'}