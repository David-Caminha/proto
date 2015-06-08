{include file='common/header.tpl'}
{if $USERNAME  }
<link rel="stylesheet" href="{$BASE_URL}css/Style_carrinho.css"/>
  <section id="linkagem" class="col-xs-12 col-md-12" >
                <a  href="{$BASE_URL}">HOME</a>
                 > 
                <a href="#">SHOP CART</a>
            </section>
<section id="">
    
	<h2>Shopping cart</h2>
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
				<form class="form-inline" action="{$BASE_URL}pages/users/shop_cart.php" method="get">
                      <div class="form-group">
					<input type="hidden" name="idProduct" value="{$itemEncomenda.idproduto} class="form-control"" />
					<input value="{$itemEncomenda.quantidade}" type="number" name="qtd class="form-control"" />
                               </div>
					<button class="btn btn-default" >Alterar Quantidade</button>
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
	<a href="{$BASE_URL}pages/users/checkout.php"><button type="button">Finalizar Compra</button></a>

</section>

{else}
	{include file='common/no_permission.tpl'}
{/if}
{include file='common/footer.tpl'}