{include file='common/header.tpl'}
{if $USERNAME  }
<link rel="stylesheet" href="{$BASE_URL}css/Style_carrinho.css"/>
<section id="">
	<h2>Carrinho de Compras</h2>
	<br />
	<h3>Items</h3>
	<table class="table table-striped">
		<tr>
			<th>Produto</th>
			<th>Quantidade</th>
			<th>Total</th>
			<th></th>
			<th></th>
		</tr>
		{$valorfinal = 0}
		{foreach $Result as $itemEncomenda}
		<tr>
			<td><a href="?idProd={$itemEncomenda.idproduto}">{$itemEncomenda.nome}</a></td>
			<td>{$itemEncomenda.quantidade}</td>
			<td>{$itemEncomenda.total}</td>
			<td>
				<form action="{$BASE_URL}pages/products/Homepage.php" method="get">
					<input type="hidden" name="idProduct" value="{$itemEncomenda.idproduto}" />
					<input value="{$itemEncomenda.quantidade}" type="number" name="qtd" />
					<button>Alterar Quantidade</button>
				</form>	
			</td>
			<td><a href="?idC={$itemEncomenda.idcarrinho}&idP={$itemEncomenda.idproduto}"><button type="button" >Remover</button></a></td> 
		</tr>
		{$valorfinal = $valorfinal + $itemEncomenda.total}
		{/foreach}
		<tr>
			<td><b>Valor Final:</b> {$valorfinal}</td>
		</tr>
	</table>
	<a href="#"><button type="button">Finalizar Compra</button></a>

</section>

{else}
	{include file='common/no_permission.tpl'}
{/if}
{include file='common/footer.tpl'}