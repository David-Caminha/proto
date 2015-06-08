{include file='common/header.tpl'}

{if $FORNECEDOR}
            <section id="linkagem" class="col-xs-12 col-md-12" >
        </section>
           <br>

	<div id="fornecedor_wrapper">
		<table class="table table-striped">
			<tr>
				<td>Produto</td>
				<td>Vendas</td>
				<td>Stock</td>
                <td></td>
                <td></td>
                <td></td>
			</tr>
			{foreach $produto as $p}
				<tr>
					<td>{$p.pnome}</td>
					<td>{$p.vendas}</td>
					<td>{$p.stock}</td>
					<td>
						<form class="form-inline" action="{$BASE_URL}pages/products/Homepage.php" method="get">
                             <div class="form-group">
							<input type="hidden" name="addStock" value="{$p.id}"  class="form-control"/>
							<input type="text" name="qtd_stock" placeholder="0" value="0" class="form-control"/>
                                  </div>
							<button class=" btn btn-default" >Adicionar Stock</button>
						</form>
					</td>
                    <td><a  class=" btn btn-default" href="?editProd={$p.id}">Editar Produto</a></td>
                    <td><a  class=" btn btn-default" href="?kill={$p.id}">Descontinuar</a></td>
				</tr>
			{/foreach}
		</table>
        <a  class=" btn btn-default" href="{$BASE_URL}pages/users/insertProduct.php">Inserir novo produto</a>
        <a  class=" btn btn-default" href="{$BASE_URL}pages/users/insertBrand.php">Inserir nova marca</a>
	</div>
{else}
	{include file='common/no_permission.tpl'}
{/if}

{include file='common/footer.tpl'}