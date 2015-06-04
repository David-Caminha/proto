{include file='common/header.tpl'}

{if $FORNECEDOR}
	<div id="fornecedor_wrapper">
		<table class="table table-striped">
			<tr>
				<td>Produto</td>
				<td>Vendas</td>
				<td>Stock</td>
			</tr>
			{foreach $produto as $p}
				<tr>
					<td>{$p.pnome}</td>
					<td>{$p.vendas}</td>
					<td>{$p.stock}</td>
					<td>
						<form action="{$BASE_URL}pages/products/Homepage.php" method="get">
							<input type="hidden" name="addStock" value="{$p.id}" />
							<input type="text" name="qtd_stock" placeholder="0" value="0" />
							<button>Adicionar Stock</button>
						</form>
					</td>
					<td><a href="?editProd={$p.id}"><button>Editar Produto</button></a></td>
					<td><a href="?kill={$p.id}"><button>Descontinuar</button></a></td>
				</tr>
			{/foreach}
		</table>
		<a href="{$BASE_URL}pages/users/insertProduct.php"><button>Inserir novo produto</button></a>
	</div>
{else}
	{include file='common/no_permission.tpl'}
{/if}

{include file='common/footer.tpl'}