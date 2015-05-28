{include file='common/header.tpl'}
{if$USERNAME  }
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
		{$valorfinal = 0}
		{foreach $Result as $itemEncomenda}
		<tr>
			<td>{$itemEncomenda.nome}</td>
			<td>{$itemEncomenda.quantidade}</td>
			<td>{$itemEncomenda.total}</td>
			<td><a href="?idC={$itemEncomenda.idcarrinho}&idP={$itemEncomenda.idproduto}"><button type="button" >Remover</button></a></td> 
		</tr>
		{$valorfinal = $valorfinal + $itemEncomenda.total}
		{/foreach}
		<tr>
			<td><b>Valor Final:</b> {$valorfinal}</td>
		</tr>
	</table>
	<a href="#"><button type="button">Finalizar Compra</button></a>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="4W77NEDS3XSF2">
		<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>
</section>

{else}
	{include file='common/no_permission.tpl'}
{/if}
{include file='common/footer.tpl'}