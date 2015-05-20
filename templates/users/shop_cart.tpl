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
		{foreach $itemEncomenda as $itemEncomenda}
		<tr>
			<td>{$itemEncomenda.}</td>
			<td>{}</td>
			<td>{}</td>
		</tr>
		{/foreach}
	</table>
	
</section>
{include file='common/footer.tpl'}