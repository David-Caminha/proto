{include file='common/header.tpl'}
<link rel="stylesheet" href="{$BASE_URL}css/Style_carrinho.css"/>
<section id="">
	<h2>Carrinho de Compras</h2>
	<table class="table table-striped">
		<tr>
			<td>Produto</td>
			<td>Quantidade</td>
			<td>Total</td>
		</tr>
		{foreach $Result as $itemEncomenda}
		<tr>
			<td>{$itemEncomenda.nome}</td>
			<td>{$itemEncomenda.quantidade}</td>
			<td>{$itemEncomenda.total}</td>
			<td><button type="button">Remover</button></td>
		</tr>
		{/foreach}
	</table>
	<button>Finalizar Compra</button>
	
</section>
{include file='common/footer.tpl'}